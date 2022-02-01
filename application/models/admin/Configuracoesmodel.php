<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoesmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function DiasSaques(){

        $this->db->order_by('dia_pagamento', 'ASC');
        $pagamentos = $this->db->get('configuracao_pagamento_saque');

        if($pagamentos->num_rows() > 0){

            return $pagamentos->result();
        }

        return false;
    }

    public function AtualizarConfiguracoesSite(){

        $dados = array();

        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'png|jpg|jpeg|gif';
        $config['encrypt_name'] = true;

        $nome_site = $this->input->post('nome_site');
        $tema_admin = $this->input->post('tema_admin');
        $tema_cliente = $this->input->post('tema_cliente');
        $AuthyApi = $this->input->post('AuthyApi');

        
        $maximo_cpfs = $this->input->post('maximo_cpfs');
        $login_patrocinador = $this->input->post('login_patrocinador');
        $bankon_token = $this->input->post('bankon_token');
        $bankon_conta = $this->input->post('bankon_conta');
        $coinpayments_public = $this->input->post('coinpayments_public');
        $coinpayments_private = $this->input->post('coinpayments_private');
        $coinpayments_secret = $this->input->post('coinpayments_secret');

        if(!empty($_FILES['logo']['tmp_name'])){

            $this->upload->initialize($config);

            if($this->upload->do_upload('logo')){

                $retorno = $this->upload->data();

                $dados['logo'] = $retorno['file_name'];

            }else{

                return '<div class="alert alert-danger text-center">Erro ao fazer upload do Logo: '.$this->upload->display_errors().'</div>';
            }
        }

        if(!empty($_FILES['favicon']['tmp_name'])){

            if($this->upload->do_upload('favicon')){

                $retorno = $this->upload->data();

                $dados['favicon'] = $retorno['file_name'];

            }else{

                return '<div class="alert alert-danger text-center">Erro ao fazer upload do Favicon: '.$this->upload->display_errors().'</div>';
            }
        }

        $dados['nome_site'] = $nome_site;
        $dados['maximo_cpfs'] = $maximo_cpfs;
        $dados['login_patrocinador'] = $login_patrocinador;
        $dados['AuthyApi'] = $AuthyApi;
        $dados['bankon_token'] = $bankon_token;
        $dados['bankon_conta'] = $bankon_conta;
        $dados['coinpayments_public'] = $coinpayments_public;
        $dados['coinpayments_private'] = $coinpayments_private;
        $dados['coinpayments_secret'] = $coinpayments_secret;

        $dados['tema_admin'] = $tema_admin;
        $dados['tema_cliente'] = $tema_cliente;
        
        $update = $this->db->update('configuracao', $dados);

        if($update){

            return '<div class="alert alert-success text-center">Configurações do site alteradas com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao alterar as configurações do site. Tente novamente.</div>';
    }

    public function AtualizarConfiguracoesEmail(){

        $email = $this->input->post('email_remetente');
        $smtp = $this->input->post('smtp');
        $smtp_host = $this->input->post('smtp_host');
        $smtp_user = $this->input->post('smtp_user');
        $smtp_pass = $this->input->post('smtp_pass');
        $smtp_port = $this->input->post('smtp_port');
        $smtp_encrypt = $this->input->post('smtp_encrypt');

        $dados = array(
                       'email_remetente'=>$email,
                       'smtp_enabled'=>$smtp,
                       'smtp_host'=>$smtp_host,
                       'smtp_user'=>$smtp_user,
                       'smtp_pass'=>$smtp_pass,
                       'smtp_port'=>$smtp_port,
                       'smtp_encrypt'=>$smtp_encrypt
                       );

        $update = $this->db->update('configuracao', $dados);

        if($update){

            return '<div class="alert alert-success text-center">Configurações de email atualizadas com sucesso.</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar as configurações de email.</div>';
    }

    public function AtualizarConfiguracoesFinanceiras(){
        $valor_minimo_saque = $this->input->post('valor_minimo_saque');
		$porcentagem = $this->input->post('PGporcentagem');
		if ($valor_minimo_saque <> 0) {
			// $indicacao_direta = $this->input->post('indicacao_direta');
			$taxa_saque = $this->input->post('taxa_saque');

			$dias = $this->input->post('dias');
			$inicio = $this->input->post('inicio');
			$termino = $this->input->post('termino');

			if(!empty($dias)){
				foreach($dias as $key=>$dia){

					if(empty($inicio[$key]) || empty($termino[$key])){
					  
					  return '<div class="alert alert-danger text-center">Preencha todos os horáiros para continuar.</div>';  
					}
				}
			}

			$dadosConfiguracoes = array(
										'valor_minimo_saque'=>$valor_minimo_saque,
										'taxa_saque'=>$taxa_saque
										);

			$updateConfig = $this->db->update('configuracao', $dadosConfiguracoes);

			if($updateConfig){

				$this->db->where('id != ', 0);
				$this->db->delete('configuracao_pagamento_saque');

				if(!empty($dias)){
					foreach($dias as $key=>$dia){

						$dados = array(
									   'dia_pagamento'=>$dia,
									   'horario_inicio'=>$inicio[$key],
									   'horario_termino'=>$termino[$key]
									   );

						$this->db->insert('configuracao_pagamento_saque', $dados);
					}
				}

				return '<div class="alert alert-success text-center">Dados atualizados com sucesso!</div>';
			}
		} else {
			$dadoporcentagem = array(
								 'porcentagem_dia'=>$porcentagem);
			$this->db->update('faturas', $dadoporcentagem);
			
            if($dadoporcentagem){

			    return '<div class="alert alert-success text-center">Porcentagem atualizada com sucesso!</div>';
            
            }
        }

        return '<div class="alert alert-danger text-center">Erro ao atualizar dados. Por favor, tente novamente.</div>';
    }
}
?>