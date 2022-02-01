<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configurpay extends CI_Controller {
    public function __construct(){
        parent::__construct();
        is_logged();
        $this->load->model('cliente/configurpaymodel', 'UrpayDatabase');
        $this->load->helper('urpaysetup');
        $this->userid = InformacoesUsuario('id');
        
        if (InformacoesUsuario('dfa') != NULL && !$this->session->userdata('authy')) {
            $this->authy();
        }
    }

    public function authy(){
        $data = array();

        if($this->input->post('submit_token')){

              $this->form_validation->set_rules('token', 'Token', 'min_length[9]|max_length[9]|required', array('required' => '<div class="text-danger text-center">%s inválido</div>'));

              if ($this->form_validation->run() !== FALSE) {
                  
                if (Authy(InformacoesUsuario('dfa'), $this->input->post('token'))) {
                    
                    $this->session->set_userdata('authy', true);
                    
                    redirect('saque-automatico-urpay');
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

            $dados['active'] = 'financeiro';
            $dados['jsLoader'] = array(
                'external'=> 'https://kit.fontawesome.com/a84e8a395e.js',
                'external'=>'https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js',
                'assets/urpay/config-cliente.js',
            );

            $fields = array();
            $getSavedCrypt = array();
            $contaUrpay = $this->UrpayDatabase->getChaveClienteUrpay();

            if($contaUrpay){
                $getSavedCrypt = decrypt($contaUrpay[0]->urpay_user_chave);


            }

            $field = array(
                'urpay_user_id' => isset($contaUrpay[0]->urpay_user_id) ? $contaUrpay[0]->urpay_user_id : '',
                'classform' => isset($contaUrpay[0]->urpay_user_id) ? 'view' : 'blocked',
                'urpay_cliente_id' => isset($getSavedCrypt->urpay_cliente_id) ? $getSavedCrypt->urpay_cliente_id : '',
                'urpay_user_chave' => isset($getSavedCrypt->urpay_user_chave) ? $getSavedCrypt->urpay_user_chave : '',
                'urpay_user_cpf' => isset($getSavedCrypt->urpay_user_cpf) ? $getSavedCrypt->urpay_user_cpf : ''
        );

            if(isset($contaUrpay[0]->urpay_user_created)){
                $contaCriacao = $contaUrpay[0]->urpay_user_created;
                $field['urpay_user_created'] = date("d/m/Y - H:i:s", strtotime($contaCriacao));    
            } else {
                $field['urpay_user_created'] = NULL;
            }

            if(isset($contaUrpay[0]->urpay_user_updated)){
                $contaUpdated = $contaUrpay[0]->urpay_user_updated;
                $field['urpay_user_updated'] = date("d/m/Y - H:i:s", strtotime($contaUpdated));    
            } else {
                $field['urpay_user_updated'] = NULL;
            }

            $dados['setup'] = $field;
            if(urlAPIUrpay()){
                $this->load->model('cliente/saquemodel', 'SaqueModel');
                $dados['saquerendimento'] = $this->SaqueModel->PermitirSaqueRendimento();
                $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_online', $dados);
            }
            else {
                $this->template->load('cliente/templates/template', 'cliente/financeiro/saqueurpay_erro_api', $dados);
            }
        }
    }

    public function cadastrar(){
        $this->form_validation->set_rules('urpay_user_chave', 'Insira sua Conta Urpay', 'required',
            array('required' => 'Atenção! Adicione sua conta URPAY')
        );

        if ($this->form_validation->run() == FALSE){  
            $dados = array(
                'titulo' => '<p>OCORREU UM ERRO!</p>',
                'msg'=> '<p>'.validation_errors().'</p>'
            );
            $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_resposta', $dados);
            } else {
            $insertSetup = $this->UrpayDatabase->salvarAction();
            if($insertSetup){
                $dados = array(
                    'titulo' => 'PARABÉNS! Sua solicitação foi concluída...', 
                    'msg' => 'CONTA CADASTRADA COM SUCESSO'
                    
                );
                $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_sucesso', $dados);

             } else {
                $dados = array(
                    'titulo' => '<p>OCORREU UM ERRO!</p>',
                    'msg'=> '<p> Não foi possivel realizar sua solicitação</p>'
                );
                $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_resposta', $dados);
               }
        }
    }

    public function saque(){

        $this->form_validation->set_rules('valor_saque', 'Valor Saque', 'required|callback_checkvalor',
            array('required' => 'Atenção! Você precisa informar o valor que deseja resgatar para sua conta URPAY')
        );

        $this->form_validation->set_rules('saque_conta', 'Tipo de Conta', 'required|callback_checkconta',
            array('required' => 'Atenção! Você deve selecionar alguma opção entre Rendimento e Indicação.')
        );
        

        if ($this->form_validation->run() == FALSE){   
            
            $dados = array(
                'titulo' => '<p>CAMPOS OBRIGATÓRIOS</p>',
                'msg'=> '<p>'.validation_errors().'</p>'
            );
            $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_resposta', $dados);
            } else {
            $getUrpaySetup = $this->UrpayDatabase->getUrpayConfig();
            $chaveDecrypt = decrypt($getUrpaySetup[0]->urpay_setup_chave);
            $tokenUrpayComum = $chaveDecrypt->urpay_token_api_comum;
            $tokenUrpayTrans = $chaveDecrypt->urpay_token_api_trans;

            // CRIANDO VALORES PARA TRANSFERÊNCIA URPAY
            $descontoSaque = str_replace('%', '', $chaveDecrypt->urpay_valor_desconto);
            $valorSolicitado = str_replace('.', '', $this->input->post('valor_saque'));
           
            $valorDesconto = $this->UrpayDatabase->porcentagem("$valorSolicitado", "$descontoSaque");
            
            
            $differ = $valorSolicitado - $valorDesconto;
            $transfer = str_replace('.', '', str_replace(',', '', number_format($differ, 2, ",", ".")));
            
            $clienteUrpayID = $this->input->post("urpay_user_chave");
            $trans = uperTrans($clienteUrpayID, $tokenUrpayComum, $tokenUrpayTrans, $transfer);
            if($trans->messageCode == 0){
                    $reduz = $this->UrpayDatabase->debitoPlataforma($this->input->post('saque_conta'), $valorSolicitado, InformacoesUsuario('id'));
                    if ($reduz){

                        $dados = array(
                            'titulo' => 'PARABÉNS! Sua solicitação foi concluída...', 
                            'msg' => $trans->message->message
                        );
                        GravaExtrato($this->userid, $differ, 'Solicitação de saque', 2);
                        GravaExtrato($this->userid, $valorDesconto, 'Taxa do saque', 2);
                        $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_sucesso', $dados);
                    }
                } else {
                    $dados = array(
                        'titulo' => 'Ops! OCORREU UM ERRO!', 
                        'msg' => $trans->message->message
                    );
                    $this->template->load('cliente/templates/template', 'cliente/financeiro/saque_urpay_resposta', $dados);
                }
            }
        }

    public function checkvalor($valor){
        $getUrpaySetup = $this->UrpayDatabase->getUrpayConfig();
        $chaveDecrypt = decrypt($getUrpaySetup[0]->urpay_setup_chave);
        $valorMinimo = str_replace('.', '', str_replace(',', '', $chaveDecrypt->urpay_valor_mimimo));
        $valorCheck = str_replace('.', '', str_replace(',', '', $valor));

        if($valor != ''):
        if($valorCheck < $valorMinimo){
                    $this->form_validation->set_message('checkvalor', 'Atenção! O valor solicitado ('.$valor.') não pode ser menor que o valor mínimo permitido ('.$chaveDecrypt->urpay_valor_mimimo.')');
                    return FALSE;
                } else {
                    return TRUE;
            }
        endif;
    }


    public function checkconta($conta){
       
        $lavarDinheiro = number_format(InformacoesUsuario('saldo'), 2, ",", ".");
        $contaDebito = str_replace('.', '', str_replace(",", "", $lavarDinheiro));

        $valorSolicitado = str_replace('.', '', str_replace(",", "", $this->input->post('valor_saque')));
        
        if(isset($contaDebito)):
            if($valorSolicitado > $contaDebito){
                $this->form_validation->set_message('checkconta', 'Atenção! Você está solicitando um valor acima do que tem disponível em conta<br>Valor em Conta:'.$lavarDinheiro."<br>Valor Solcitado:".$this->input->post('valor_saque') );
                return  false;
            } else {
                return true;
            }
        endif;
    }

}
