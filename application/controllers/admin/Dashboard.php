<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/notificacoesmodel', 'NotificacoesModel');
        $this->load->model('admin/dashboardmodel', 'DashboardModel');
        $this->load->model('admin/usuariosmodel', 'UsuariosModel');
        $this->load->model('admin/faturasmodel', 'FaturasModel');
        $this->load->model('admin/saquesmodel', 'SaquesModel');
    }

    public function index() {

        $data['rendimentos_hoje'] = $this->DashboardModel->TotalRendimento(true);
        $data['entradas'] = $this->DashboardModel->entradas(true);
        $data['total_usuarios'] = $this->UsuariosModel->TotalUsuarios();
        $data['planos_ativos'] = $this->FaturasModel->PlanosAtivos();
        $data['saques_pendentes'] = $this->SaquesModel->TotalSaquesPendentes();
        $data['notificacoes'] = $this->NotificacoesModel->NotificacoesAdmin(20);
        $data['total'] = $this->db->query("SELECT COALESCE(SUM(saldo), 0) as valor FROM usuarios WHERE block = '0'")->row()->valor;
		$data['total_coinsBRL'] = $this->db->query("SELECT SUM(valor) as valor FROM faturas WHERE lifecoins_v >= 1 and status > 0")->row()->valor;
		$data['total_coinsUNI'] = $this->db->query("SELECT SUM(lifecoins_v) as valor FROM faturas WHERE lifecoins_v >= 1 and status > 0")->row()->valor;

        $data['totalsaques'] = $this->db->query("SELECT COALESCE(SUM(valor), 0) as valor FROM extrato WHERE tipo = '2'")->row()->valor;

        $this->template->load('admin/templates/template', 'admin/dashboard/dashboard', $data);
    }

}
