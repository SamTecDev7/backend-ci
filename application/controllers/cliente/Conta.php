<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cliente/contamodel', 'ContaModel');
    }

    public function logout(){

      $this->ContaModel->Deslogar();
    }

    public function login(){

        $data = array();

        if($this->input->post('submit')){

          $this->form_validation->set_rules('login', 'Login', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('senha', 'Senha', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe sua %s.</div>'));
          
          if ($this->form_validation->run() !== FALSE) {

            $data['message'] = $this->ContaModel->FazerLogin();

          }else{

            $data['message'] = validation_errors();
          }
        }

        $this->load->view('cliente/login', $data);
    }
    
    public function authy(){
        if ($this->session->userdata('authy')) {
            $data = array();

            if($this->input->post('submit_token')){

              $this->form_validation->set_rules('token', 'Token', 'trim|min_length[7]|max_length[7]|required', array('required' => '<div class="text-danger text-center">%s inválido</div>'));

              if ($this->form_validation->run() !== FALSE) {
                if (Authy($this->session->userdata('authy'), $this->input->post('token'))) {
                    
                    $this->session->set_userdata('uid', $this->session->userdata('id_login'));
                    
                    $this->session->unset_userdata('authy');
                    $this->session->unset_userdata('id_login');

                    redirect('dashboard');
                    exit;
                }else{
                    $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
                }
              }else{

                $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
              }
            }
            $this->load->view('cliente/2fa', $data);
        }else{
            redirect('login');
        }
    }
    

    public function cadastrar($patrocinador = false){

        if($this->input->post('submit')){

          $this->form_validation->set_rules('patrocinador', 'Patrocinador', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe um %s.</div>'));
          $this->form_validation->set_rules('nome', 'Nome', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('cpf', 'CPF', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('celular', 'Celular', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('login', 'Login', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('senha', 'Senha', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          
          if ($this->form_validation->run() !== FALSE) {

            $data['message'] = $this->ContaModel->Cadastrar();

          }else{

            $data['message'] = validation_errors();
          }
        }

        $data['patrocinador'] = $patrocinador;

        $this->load->view('cliente/cadastrar', $data);
    }

    public function recuperar_senha($codigo = false){

        $data['codigo'] = $codigo;

        if($this->input->post('email')){

          $data['message'] = $this->ContaModel->EnviarEmailRecuperacao($this->input->post('email'));
        
        }

        if($this->input->post('codigo')){

          $data['message'] = $this->ContaModel->RedirecionaLink($this->input->post('codigo'));
        }

        $this->load->view('cliente/recuperar', $data);
    }
}