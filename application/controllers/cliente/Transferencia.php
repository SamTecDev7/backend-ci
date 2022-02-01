<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transferencia extends CI_Controller {

    public function __construct() {
        parent::__construct();
        is_logged();
        $this->load->library('session');
        $this->userid = InformacoesUsuario('id');

        if (InformacoesUsuario('dfa') != NULL && !$this->session->userdata('authy')) {
            $this->authy();
        }
    }

    public function authy() {
        $data = array();

        if ($this->input->post('submit_token')) {

            $this->form_validation->set_rules('token', 'Token', 'min_length[7]|max_length[7]|required', array('required' => '<div class="text-danger text-center">%s inválido</div>'));

            if ($this->form_validation->run() !== FALSE) {

                if (Authy(InformacoesUsuario('dfa'), $this->input->post('token'))) {

                    $this->session->set_userdata('authy', true);

                    redirect('transferencia');
                    exit();
                } else {
                    $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
                }
            } else {

                $data['message'] = '<div class="text-danger text-center">Token inválido</div>';
            }
        }
        $this->load->view('cliente/2fa', $data);
    }

    public function index() {
        if ($this->session->userdata('authy') || InformacoesUsuario('dfa') == NULL) {
            if (!empty($_POST)) {
                $this->POST();
            } else {
                $dados['active'] = 'financeiro';
                $dados['jsLoader'] = array(
                    'external' => 'https://cdn.jsdelivr.net/npm/sweetalert2@8',
                    'assets/pages/cliente/transferencia.js?2');

                $this->db->where("id_usuario = {$this->userid} OR id_usuario_destino = {$this->userid}");
                $this->db->order_by('id', 'DESC');
                $this->db->limit(10);
                $dados['transfencias'] = $this->db->get('transferencia')->result();

                $this->template->load('cliente/templates/template', 'cliente/financeiro/transferencia', $dados);
            }
        }
    }

    function POST() {
        if (!empty($_POST)) {

            function Retornar($msg, $type) {
                $retorno = array(
                    'msg' => $msg,
                    'type' => $type,
                );
                echo json_encode($retorno);
                die();
            }

            if (empty($this->input->post('valor'))) {
                Retornar("Forneça um valor para transferência", 'danger');
            }

            if (empty($this->input->post('conta'))) {
                Retornar("Forneça uma conta para transferência", 'danger');
            }

            $valor = str_replace(',', '.', str_replace('.', '', $this->input->post('valor')));
            $taxa = $valor / 100 * 4;
            $conta = $this->input->post('conta');
            $totalPagamento = ($valor + $taxa);

            $this->db->where('login', $conta);
            $loginDestino = $this->db->get('usuarios');

            if ($loginDestino->num_rows() > 0 && !empty($conta) && $conta !== InformacoesUsuario("login", $this->userid)) {
                $conta = $loginDestino->row()->id;
            } else {
                Retornar("Forneça um destinatário válido", 'danger');
            }

            if ($valor < 10.00) {
                Retornar("O Valor não pode ser menor que R$ 10,00", 'danger');
            }

            if ($totalPagamento > InformacoesUsuario("saldo", $this->userid)) {
                Retornar("Você não tem saldo suficiente para essa transferência", 'danger');
            }


            //ORIGEM
            $novo_saldo = InformacoesUsuario("saldo", $this->userid) - $totalPagamento;

            $this->db->where('id', $this->userid);
            $this->db->update('usuarios', array("saldo" => $novo_saldo));

            $transferencia = array(
                'id_usuario' => $this->userid,
                'id_usuario_destino' => $conta,
                'valor' => $valor,
                'data' => date("Y-m-d H:i:s"),
            );

            $this->db->insert('transferencia', $transferencia);

            GravaExtrato($this->userid, 0, $taxa, "Taxa de transferência", 2);
            GravaExtrato($this->userid, 0, $valor, "Transferência para " . InformacoesUsuario("login", $conta), 2);

            //DESTINARIO
            $novo_saldo_destino = InformacoesUsuario("saldo", $conta) + $valor;
            $this->db->where('id', $conta);
            $this->db->update('usuarios', array("saldo" => $novo_saldo_destino));

            GravaExtrato(InformacoesUsuario('id', $conta), 0, $valor, "Transferência de " . InformacoesUsuario('login', $this->userid), 1);
            EnviaNotificacao($this->userid, "Você recebeu uma transferência no valor de R$ " . number_format($valor, 2, ",", "."));

            //FINAL
            $retorno = array(
                'msg' => "Transferência de R$ " . number_format($valor, 2, ",", ".") . " efetuada com sucesso!",
                'type' => 'success',
                'saldo' => number_format(InformacoesUsuario("saldo", $this->userid), 2, ",", "."),
            );
            echo json_encode($retorno);
            die();
        }
    }

}
