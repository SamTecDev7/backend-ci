<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linear extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged();

        $this->load->model('cliente/pendentesmodel', 'PendentesModel');
    }

    public function index(){

        $data['active'] = 'rede';

        $data['linear'] = $this->PendentesModel->Linear();

        $this->template->load('cliente/templates/template', 'cliente/rede/linear', $data);
    }
}