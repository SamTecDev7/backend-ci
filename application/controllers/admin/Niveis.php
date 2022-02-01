<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niveis extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/niveismodel', 'NiveisModel');
    }

    public function index(){

        $data['jsLoader'] = array(
                                    'assets/bower_components/datatables.net/js/jquery.dataTables.min.js',
                                    'assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js',
                                    'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
                                    'assets/bower_components/datatables-colvis/js/dataTables.colVis.js',
                                    'assets/bower_components/datatables-responsive/js/dataTables.responsive.js',
                                    'assets/bower_components/datatables-scroller/js/dataTables.scroller.js',
                                    'assets/pages/admin/niveis.js'
                                  );

        $data['niveis'] = $this->NiveisModel->TodosNiveis();

        $this->template->load('admin/templates/template', 'admin/niveis/niveis', $data);
    }

    public function adicionar(){

        $data = array();

        if($this->input->post('submit')){

            $data['message'] = $this->NiveisModel->NovoNivel();
        }

        $this->template->load('admin/templates/template', 'admin/niveis/adicionar', $data);
    }

    public function editar($id){

        if($this->input->post('submit')){

            $data['message'] = $this->NiveisModel->EditarNivel($id);
        }

        $data['nivel'] = $this->NiveisModel->InformacoesNiveis($id);

        $this->template->load('admin/templates/template', 'admin/niveis/editar', $data);
    }

    public function excluir($id){

        $this->NiveisModel->ExcluirNivel($id);
    }
}