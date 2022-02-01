<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Saques extends CI_Controller {

    public function __construct() {
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/saquesmodel', 'SaquesModel');
        $this->load->helper('bancos');
    }

    public function index() {

        $data['jsLoader'] = array(
            'assets/pages/admin/saques.js?1'
        );

        $data['saques'] = $this->SaquesModel->TodosSaques();

        $this->template->load('admin/templates/template', 'admin/saques/saques', $data);
    }

    public function visualizar($id) {

        $data['jsLoader'] = array(
            'external' => 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.min.js',
            'assets/pages/admin/saques.js'
        );

        $data['saque'] = $this->SaquesModel->Visualizar($id);

        $this->template->load('admin/templates/template', 'admin/saques/visualizar', $data);
    }

}
