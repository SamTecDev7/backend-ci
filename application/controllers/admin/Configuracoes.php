<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {

  public function __construct(){
      parent::__construct();
      CheckUserIsAdmin();
      $this->load->model('admin/configuracoesmodel', 'ConfiguracoesModel');
      $this->load->library('upload');
  }

  public function site(){

    $data = array();

    if($this->input->post('submit')){

      $data['message'] = $this->ConfiguracoesModel->AtualizarConfiguracoesSite();
    }

    $this->template->load('admin/templates/template', 'admin/configuracoes/site', $data);
  }

  public function email(){

    $data['jsLoader'] = array(
                              'assets/pages/admin/configuracoes.js'
                              );

    if($this->input->post('submit')){

      $data['message'] = $this->ConfiguracoesModel->AtualizarConfiguracoesEmail();
    }

    $this->template->load('admin/templates/template', 'admin/configuracoes/email', $data);
  }

  public function financeira(){

    $data['jsLoader'] = array(
                              'assets/plugins/maskedinput/jquery.maskedinput.min.js',
                              'assets/pages/admin/configuracoes.js'
                              );

    if($this->input->post('submit')){

      $data['message'] = $this->ConfiguracoesModel->AtualizarConfiguracoesFinanceiras();
    }

    $data['dias_saque'] = $this->ConfiguracoesModel->DiasSaques();

    $this->template->load('admin/templates/template', 'admin/configuracoes/financeiras', $data);
  }
}