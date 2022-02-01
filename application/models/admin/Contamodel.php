<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contamodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function Deslogar(){

        $this->session->unset_userdata('uid_admin');
        redirect('admin/844f9ad9fd4409d347446347');
        exit;
    }

    public function FazerLogin(){

        $login = $this->input->post('login');
        $senha = md5($this->input->post('senha'));

        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        $this->db->where('is_admin', 1);
        $usuario = $this->db->get('usuarios');

        if($usuario->num_rows() > 0){

            $row = $usuario->row();

            $this->session->set_userdata('uid_admin', $row->id);

            redirect('admin/dashboard');

            exit;
        }

        return '<div class="alert alert-danger text-center">Usuário ou senha inválidos!</div>';
    }
}
?>