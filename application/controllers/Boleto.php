<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boleto extends CI_Controller {
    
    protected $userid;

    public function __construct(){
        parent::__construct();
        is_logged();
        
        $this->userid = InformacoesUsuario('id');
        
        $this->load->helper('mibank');
    }

    public function gerar($id_fatura = false){
        
        if(!empty(InformacoesUsuario('cep')) && !empty(InformacoesUsuario('endereco')) && !empty(InformacoesUsuario('bairro')) && !empty(InformacoesUsuario('cidade')) && !empty(InformacoesUsuario('estado')) && !empty(InformacoesUsuario('cpf')) && !empty(InformacoesUsuario('nome')) && !empty(InformacoesUsuario('email'))){
        

            if(!$id_fatura){
                
                echo 'Você precisa informar o ID da Fatura na URL.';
                exit;
            }
            
            $this->db->where('id_fatura', $id_fatura);
            $this->db->where('id_usuario', $this->userid);
            $this->db->where('codigo_boleto IS NOT NULL', null, false);
            $query = $this->db->get('boletos');
        
            
            if($query->num_rows() > 0){
                
                $row = $query->row();
                
                header("Content-type:application/pdf");
                
                ExibirBoleto($row->codigo_boleto);
                
            }else{
                
                $this->db->select('p.valor, f.*');
                $this->db->from('faturas AS f');
                $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
                $this->db->where('f.id', $id_fatura);
                $this->db->where('f.id_usuario', $this->userid);
                $queryInvestimentos = $this->db->get();
                
                
                if($queryInvestimentos->num_rows() > 0){
                    
                    do{
                        $controle = rand(1000000, 9999999);
                        
                        $this->db->where('id_controle', $controle);
                        $query = $this->db->get('boletos');
                        
                    }while($query->num_rows() > 0);
                    
                    
                    
                    $rowInvestimento = $queryInvestimentos->row();
                    
                    $valor = $rowInvestimento->valor;
                    
                    
                    $codigo_boleto = GerarBoleto($id_fatura, $valor, $controle);
    
                    
                    
                    if($codigo_boleto['status'] !== false){
                        
                        header("Content-type:application/pdf");
                        
                        $this->db->insert('boletos', array('id_usuario'=>$this->userid, 'id_fatura'=>$id_fatura, 'id_controle'=>$controle, 'codigo_boleto'=>$codigo_boleto['boleto'], 'status'=>0));
                        
                        ExibirBoleto($codigo_boleto['boleto']);
                        
                    }else{
                        
                        echo 'Erro ao Gerar o boleto, por favor, verifique se o seu endereço completo foi preenchido nas configurações e também se o CPF é válido e cadastrado na base nacional.: '.$codigo_boleto['error'];
                    }
                }else{
                    
                    echo 'A fatura não existe ou não é sua. Entre em contato com o suporte técnico.';
                }
            }
        }else{
            
             echo '<div class="">Desculpe, mas você não pode emitir boleto sem antes preencher seu cadastro completo nas suas configurações. Para preencher <a href="'.base_url('configuracoes').'">Clique aqui</a>.</div>';  
        }
    }
}