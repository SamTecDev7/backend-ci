<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaqueCoinpayments extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged();
        $this->load->library('session');
        $this->userid = InformacoesUsuario('id');
        
        if (InformacoesUsuario('dfa') != NULL && !$this->session->userdata('authy')) {
            $this->authy();
        }
    }
    
    public function authy(){
        $data = array();

        if($this->input->post('submit_token')){

              $this->form_validation->set_rules('token', 'Token', 'min_length[7]|max_length[7]|required', array('required' => '<div class="text-danger text-center">%s inválido</div>'));

              if ($this->form_validation->run() !== FALSE) {
                  
                if (Authy(InformacoesUsuario('dfa'), $this->input->post('token'))) {
                    
                    $this->session->set_userdata('authy', true);
                    
                    redirect('saquecoinpayments');
                    exit();
                }else{
                    $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
                }
              }else{

                $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
            }
        }
        $this->load->view('cliente/authy', $data);
    }

    public function index(){
        if ($this->session->userdata('authy') || InformacoesUsuario('dfa') == NULL) {
            if (!empty($_POST)) {
                $this->API();
            }else{
                $this->load->model('cliente/saquemodel', 'SaqueModel');
                
                $dados['active'] = 'financeiro';
                $dados['usuario'] = $this->userid;
                
                $dados['saquerendimento'] = $this->SaqueModel->PermitirSaqueRendimento();
                $this->template->load('cliente/templates/template', 'cliente/financeiro/saquecoinpayments', $dados);
            }
        }
    
    }
    
    function Api() {
        if (!empty($_POST)){
            function soNumero($str) {
                return preg_replace("/[^0-9]/", "", $str);
            }
            
            
                require('.../../coinpayments/CoinpaymentsAPI.php');

                function Retornar($msg, $type) {
                    $retorno = array(
                        'msg' => $msg,
                        'type' => $type,
                    );
                    echo json_encode($retorno);
                    die();
                } 
                $valor = str_replace(',', '.', str_replace('.', '', $_POST['valor_saque']));
                $valor_descontado = $valor - ($valor/100 * ConfiguracoesSistema('taxa_saque'));
                $valor_da_taxa = $valor/100 * ConfiguracoesSistema('taxa_saque');
                $saque_conta = $_POST['saque_conta'];
                $conta = $_POST['conta'];
                                
                
                if (empty($conta)) {
                    Retornar('Forneça um endereço válido', 'danger'); 
                }
                

                if ($valor <  ConfiguracoesSistema('valor_minimo_saque')) {
                        Retornar("Valor minimo para saque é de R$ ".ConfiguracoesSistema('valor_minimo_saque')."", 'danger'); 
                }
                    
                if ($valor > InformacoesUsuario('saldo')) {
                        Retornar('Seu saldo de rendimento é menor que o solicitado', 'danger'); 
                }
                    
                    $retirar_de = "saldo";
                                
                $public_key = ConfiguracoesSistema('coinpayments_public');
                $private_key = ConfiguracoesSistema('coinpayments_private');
                $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');
                
                $retirada = array(
                        'amount' => $valor_descontado,
                        'currency' => "LTCT",
                        'currency2' => "BRL",
                        'address' => $conta,
                        'auto_confirm' => 1,
                );
                
                try {
                    $transaction_response = $cps_api->CreateWithdrawal($retirada);
                } catch (Exception $e) {
                   Retornar($e->getMessage(), 'danger');
                }
                if ($transaction_response['error'] == 'ok') {
                    
                    $novo_saldo = InformacoesUsuario($retirar_de) - $valor;
                    
                    $this->db->where('id', $this->userid);
                    $this->db->update('usuarios', array($retirar_de => $novo_saldo, 'coinpayments' => $conta));
                    
                    GravaExtrato($this->userid, $valor_descontado, 'Saque CoinPayments', 2);
                    GravaExtrato($this->userid, $valor_da_taxa, 'Taxa do saque', 2);
                    GravaExtrato($this->userid, $conta, 'carteira', 2);
                    
                    $retorno = array(
                        'msg' => 'Saque realizado com sucesso, confira sua conta em alguns minutos',
                        'type' => 'success',
                        'rendimento' => number_format(InformacoesUsuario('saldo'), 2, ",", "."),
                    );
                    echo json_encode($retorno);
                    die();
                    
                } else {
                    if ($transaction_response['error'] == "That is not a valid address for that coin!") {
                        $retorno = "Endereço inválido para essa moeda!";
                        
                    }elseif($transaction_response['error'] == "That amount is larger than your balance!"){
                        $retorno = "Valor solicitado não disponivel para saque";
                    
                    } elseif ($transaction_response['error'] == "Withdrawal amount must be greater than 0") {
                        $retorno = "A quantia de retirada deve ser maior que 0";
                    }else{
                        $retorno = $transaction_response['error'];
                    }
                    
                    Retornar($retorno, 'danger');
                }
        }
    }

}
