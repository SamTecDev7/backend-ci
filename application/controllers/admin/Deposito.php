<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposito extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/depositomodel', 'DepositoModel');
        $this->load->helper('bancos');
    }

    public function index(){

        $data['jsLoader'] = array(
                                    'assets/bower_components/datatables.net/js/jquery.dataTables.min.js',
                                    'assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js',
                                    'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
                                    'assets/bower_components/datatables-colvis/js/dataTables.colVis.js',
                                    'assets/bower_components/datatables-responsive/js/dataTables.responsive.js',
                                    'assets/bower_components/datatables-scroller/js/dataTables.scroller.js',
                                    'assets/pages/admin/deposito.js'
                                  );

        $data['contas'] = $this->DepositoModel->TodasContas();

        $this->template->load('admin/templates/template', 'admin/deposito/contas', $data);
    }

    public function adicionar(){

        $data['jsLoader'] = array(
                                    'assets/pages/admin/deposito.js'
                                  );

        if($this->input->post('submit')){

            $data['message'] = $this->DepositoModel->NovaConta();
        }

        $this->template->load('admin/templates/template', 'admin/deposito/novo', $data);
    }

    public function editar($id){

        $data['jsLoader'] = array(
                                    'assets/pages/admin/deposito.js'
                                  );

        if($this->input->post('submit')){

            $data['message'] = $this->DepositoModel->EditarConta($id);
        }

        $data['conta'] = $this->DepositoModel->InformacoesConta($id);

        $this->template->load('admin/templates/template', 'admin/deposito/editar', $data);
    }

    public function excluir($id){

        $this->DepositoModel->ExcluirConta($id);
    }
}