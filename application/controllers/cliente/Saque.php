<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saque extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged();

        $this->load->model('cliente/saquemodel', 'SaqueModel');
        $this->load->helper('bancos');
        
        if (InformacoesUsuario('dfa') != NULL && !$this->session->userdata('authy')) {
            $this->authy();
        }
    }
    
    public function authy(){
        $data = array();

        if($this->input->post('submit_token')){

              $this->form_validation->set_rules('token', 'Token', 'min_length[9]|max_length[9]|required', array('required' => '<div class="text-danger text-center">%s inválido</div>'));

              if ($this->form_validation->run() !== FALSE) {
                  
                if (Authy(InformacoesUsuario('dfa'), $this->input->post('token'))) {
                    
                    $this->session->set_userdata('authy', true);
                    
                    redirect('saque');
                    exit();
                }else{
                    $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
                }
              }else{

                $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
            }
        }
        $this->load->view('cliente/authy', $data);
    }

    public function index(){
    if ($this->session->userdata('authy') || InformacoesUsuario('dfa') == NULL) {
            $data['active'] = 'financeiro';

            $data['jsLoader'] = array(
                                      'external'=>'https://cdn.jsdelivr.net/npm/sweetalert2@8',
                                      'assets/pages/cliente/saque.js?11'
                                      );

            $data['contas_bancaria'] = $this->SaqueModel->MinhasContas(1);
            $data['contas_bitcoin'] = $this->SaqueModel->MinhasContas(2);
            $data['contas_mibank'] = $this->SaqueModel->MinhasContas(3);
            $data['saque'] = $this->SaqueModel->SaqueLiberado();
            $data['dias_saques'] = $this->SaqueModel->DiasSaques();
            $data['saquerendimento'] = $this->SaqueModel->PermitirSaqueRendimento();

            $this->template->load('cliente/templates/template', 'cliente/financeiro/saque', $data);
        }
    }
}