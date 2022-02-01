<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('admin/contamodel', 'ContaModel');
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

        $this->load->view('admin/login', $data);
    }
}