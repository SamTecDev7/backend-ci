<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged();

        $this->userid = InformacoesUsuario('id');

        $this->load->model('cliente/redemodel', 'RedeModel');
        $this->load->model('cliente/dashboardmodel', 'DashboardModel');
    }

    public function index() {

        $data['active'] = 'dashboard';

        $data['jsLoader'] = array(
            'vendor/needim/noty/lib/noty.min.js',
            'assets/plugins/clipboard-js/js/clipboard.min.js',
            'assets/plugins/countdown/jquery.countdown.js',
            'assets/pages/cliente/dashboard.js',
            'assets/cliente/js/scripts/pages/dashboard-analytics.min.js'
        );

        $this->load->model('cliente/pontosmodel', 'PontosModel');
        $this->load->model('cliente/pendentesmodel', 'PendentesModel');

        $data['rede'] = $this->RedeModel->QuantidadeTodaRede();

        $data['pontos'] = $this->PontosModel->PontosBinario();

        $data['total_investido'] = $this->db->query("SELECT COALESCE(SUM(valor), 0) as total FROM faturas WHERE id_usuario = '$this->userid' AND status = '1'")->row()->total;

        //$data['total_lucro'] = $this->db->query("SELECT COALESCE(SUM(lucro), 0) as total FROM faturas WHERE id_usuario = '$this->userid' AND status = '1'")->row()->total;

        $data['total_teto'] = $this->db->query("SELECT COALESCE(SUM(teto), 0) as total FROM faturas WHERE id_usuario = '$this->userid' AND status = '1'")->row()->total;

        $data['Total_conta'] = $this->db->query("SELECT (`saldo` + `saldo_rede`) as 'valor' FROM `usuarios` WHERE `id` = '$this->userid'")->row()->valor;

        $data['indicadospendentes'] = $this->db->query("SELECT COUNT(id) AS total FROM rede WHERE id_patrocinador_direto = '$this->userid' AND plano_ativo = '0'")->row()->total;

        $data['indicadosativos'] = $this->db->query("SELECT COUNT(id) AS total FROM rede WHERE id_patrocinador_direto = '$this->userid' AND plano_ativo = '1'")->row()->total;

        //$data['totalsaques'] = $this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM saques WHERE id_usuario = '$this->userid' AND status = '1'")->row()->valor;

        $data['clientes'] = $this->db->query("SELECT COUNT(id) AS total FROM usuarios")->row()->total;

        $data['Saldo_rede'] = $this->db->query("SELECT saldo_rede AS valor FROM usuarios WHERE id = $this->userid")->row()->valor;


        $this->template->load('cliente/templates/template', 'cliente/backoffice/backoffice', $data);
    }

    public function authy_config() {
        if (InformacoesUsuario('dfa') != NULL) {
            redirect('configuracoes');
            die();
        }

        if ($this->session->userdata('authy-confirmado') && $this->session->userdata('_authy')) {
            $this->DashboardModel->AtivarAuthy();
            redirect('configuracoes');
            die();
        }

        $data = array();

        if ($this->input->get('submit')) {
            $this->authy($this->session->userdata('_authy'), 'configuracoes/2fa');
        } else {
            $codigo = trim(ParagonIE\ConstantTime\Base32::encodeUpper(random_bytes(15)), '=');
            $totp = new \OTPHP\TOTP(ConfiguracoesSistema('nome_site'), $codigo);

            $img = $totp->getQrCodeUri(
                    'http://api.qrserver.com/v1/create-qr-code/?color=black&bgcolor=white&data=[DATA]&qzone=2&margin=0&size=300x300&ecc=H', '[DATA]'
            );

            $this->session->set_userdata('_authy', $codigo);

            $data['codigo'] = $codigo;
            $data['qrcode'] = $img;

            $this->load->view('cliente/backoffice/2fa', $data);
        }
    }

    public function authy_desativar() {
        $data = array();

        if (InformacoesUsuario('dfa') != NULL && !$this->session->userdata('authy')) {
            $this->authy(NULL, 'configuracoes/2fa/desativar');
        } else {
            if ($this->session->userdata('authy') || InformacoesUsuario('dfa') != NULL) {

                if ($this->input->post('desativar')) {
                    $data['message'] = $this->DashboardModel->DesativarAuthy();
                }
                $this->load->view('cliente/backoffice/2fa_desativar', $data);
            }
        }
    }

    public function novo_codigo() {
        $this->session->unset_userdata('_authy');
        redirect('configuracoes/2fa');
    }

    public function juros() {
        $data['jsLoader'] = array(
            'assets/pages/cliente/juros.js',
        );

        if ($this->input->post('submit')) {
            $data['message'] = $this->DashboardModel->jurosComposto();
        }

        $this->template->load('cliente/templates/template', 'cliente/financeiro/juros', $data);
    }

    public function configuracoes() {
        if (InformacoesUsuario('dfa') != NULL && !$this->session->userdata('authy')) {
            $this->authy();
        }

        if ($this->session->userdata('authy') || InformacoesUsuario('dfa') == NULL) {
            $data['jsLoader'] = array(
                'assets/plugins/maskedinput/jquery.maskedinput.min.js',
                'assets/pages/cliente/configuracoes.js'
            );

            if ($this->input->post('submit')) {

                $data['message'] = $this->DashboardModel->AlterarDadosCadastrais();
            }

            $this->template->load('cliente/templates/template', 'cliente/backoffice/configuracoes', $data);
        }
    }

    public function authy($secret = null, $redirect = null) {
        $data = array();

        if ($this->input->post('submit_token')) {

            $this->form_validation->set_rules('token', 'Token', 'min_length[7]|max_length[7]|required', array('required' => '<div class="text-danger text-center">%s inválido</div>'));

            if ($this->form_validation->run() !== FALSE) {

                if ($secret == null) {
                    $secret = InformacoesUsuario('dfa');
                }

                if (Authy($secret, $this->input->post('token'))) {

                    $this->session->set_userdata('authy-confirmado', true);
                    $this->session->set_userdata('authy', true);

                    if ($redirect == null) {
                        redirect('configuracoes');
                    } else {
                        redirect($redirect);
                    }

                    exit();
                } else {
                    $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
                    $data['replay'] = '<div class="text-info text-center"><a href="' . base_url() . 'configuracoes/2fa/novo_codigo">Novo Código</a></div>';
                }
            } else {

                $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
                $data['replay'] = '<div class="text-info text-center"><a href="' . base_url() . 'configuracoes/2fa/novo_codigo">Novo Código</a></div>';
            }
        }
        $this->load->view('cliente/2fa', $data);
    }

}
