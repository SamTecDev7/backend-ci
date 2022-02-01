<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacoes extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/notificacoesmodel', 'NotificacoesModel');
    }

    public function index(){

        $data = array();

        if($this->input->post('submit')){
            $data['message'] = $this->NotificacoesModel->EnviarNotificacoes();
        }

        $this->template->load('admin/templates/template', 'admin/notificacoes/notificacoes', $data);
    }

    public function admin(){

        $data['jsLoader'] = array(
                                  'assets/pages/admin/notificacoes.js'
                                );

        $data['notificacoes'] = $this->NotificacoesModel->NotificacoesAdmin();

        $this->template->load('admin/templates/template', 'admin/notificacoes/admin', $data);
    }

}