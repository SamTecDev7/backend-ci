<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faturas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged();

        $this->load->model('cliente/faturasmodel', 'clientes_faturas');

        $this->load->helper('bancos');
    }

    public function index(){        
        if ($this->input->get('pagar_saldo')) {
                       
            $this->clientes_faturas->PagarComSaldo($this->input->get('pagar_saldo'));
            redirect('faturas');
            die();
        }

        if ($this->input->get('apagar')) {
            $this->clientes_faturas->ApagarFatura($this->input->get('apagar'));
        }
        
         if($this->input->post('bankon')){
            
            $id = $this->input->post('id');
            $codigo = $this->input->post('codigo');
            
            if ($id && $codigo) {
                $this->load->model('cliente/bankonmodel', 'bankon');
                    $data['bankon'] = $this->bankon->ConsultarTransferencias($id, $codigo);
            }
        }
        
        $data['active'] = 'financeiro';
        
        if ($this->session->userdata('retorno_msg')) {
            $data['retorno_msg'] = $this->session->userdata('retorno_msg');
            $data['retorno_type'] = $this->session->userdata('retorno_type');
            $this->session->unset_userdata('retorno_msg');
            $this->session->unset_userdata('retorno_type');
        }
        
        $data['faturas'] = $this->clientes_faturas->MinhasFaturas();
        $data['formas_pagamento'] = $this->clientes_faturas->FormasPagamento();
        $this->template->load('cliente/templates/template', 'cliente/financeiro/faturas', $data);
    }
    
    public function comprar() {
        $data = array();
        
        if ($this->input->post('submit')) {
            $data['message'] = $this->clientes_faturas->GerarFatura();
        }
        
        $this->template->load('cliente/templates/template', 'cliente/financeiro/comprar', $data);
    }
    
}