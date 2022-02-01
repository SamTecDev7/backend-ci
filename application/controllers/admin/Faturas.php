<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faturas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/faturasmodel', 'FaturasModel');
    }

    public function liberar($id = false) {

        if ($id !== false) {

            $data['message'] = $this->FaturasModel->LiberarFatura($id, "Transferência (TED)");
        }

        $data['faturas'] = $this->FaturasModel->TodasFaturas();

        $this->template->load('admin/templates/template', 'admin/faturas/liberar', $data);
    }

    public function liberadas() {

        $data['faturas'] = $this->FaturasModel->TodasFaturas(1);

        $this->template->load('admin/templates/template', 'admin/faturas/liberadas', $data);
    }

    public function editar($id) {

        $data['jsLoader'] = array(
            'assets/pages/admin/atualizar_fatura.js'
        );

        if ($this->input->post('submit')) {

            $data['message'] = $this->FaturasModel->AtualizarFatura($id);
        }

        $data['fatura'] = $this->FaturasModel->DadosFatura($id);

        $this->template->load('admin/templates/template', 'admin/faturas/editar', $data);
    }

    public function pendentes() {

        $data['faturas'] = $this->FaturasModel->TodasFaturas(0);

        $this->template->load('admin/templates/template', 'admin/faturas/pendentes', $data);
    }

}
