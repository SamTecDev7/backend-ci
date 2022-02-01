<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestsmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    function login_usuario($login) {
        if ($login == InformacoesUsuario('login')) {
            die();
        }
        
        $this->db->select('nome');
        $this->db->where('login', $login);
        $dados = $this->db->get('usuarios');
        if($dados->num_rows() > 0){
            return json_encode($dados->row());
        }
    }
    
    public function AtualizaNotificacoes($admin){

        $this->db->where('for_admin', $admin);

        if($admin == 0){
            $this->db->where('id_usuario', $this->userid);
        }else{
            $this->db->where('id_usuario', $this->session->userdata('uid_admin'));
        }
        $atualiza = $this->db->update('notificacoes', array('visualizada'=>1));

        if($atualiza){

            return json_encode(array('status'=>1));
        }

        return json_encode(array('status'=>0));
    }

    public function EnviarContato(){

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $mensagem = $this->input->post('mensagem');

        $html  = 'Olá, você recebeu um novo formulário de contato do site. Segue abaixo os dados do formulário preenchido: <br /><br />';
        $html .= '<b>Nome:</b> '.$nome.'<br />';
        $html .= '<b>Email:</b> '.$email.'<br />';
        $html .= '<b>Mensagem:</b> '.$mensagem;

        EnviarEmail(ConfiguracoesSistema('email_remetente'), 'Novo formulário de contato', $html);

    }
}
?>