<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged();

        $this->load->model('cliente/pontosmodel', 'PontosModel');
    }

    public function index(){

        $data['active'] = 'rede';

        $data['pontos'] = $this->PontosModel->PontosBinario();

        $this->template->load('cliente/templates/template', 'cliente/rede/pontos', $data);
    }
    
    public function extrato(){

        $data['active'] = 'rede';

        $data['extratos'] = $this->PontosModel->TodosExtratos();

        $this->template->load('cliente/templates/template', 'cliente/rede/extrato', $data);
    }
}