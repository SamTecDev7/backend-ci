<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardmodel extends CI_Model {

    protected $userid;

    public function __construct() {
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function AlterarDadosCadastrais() {
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $conta_saque = $this->input->post('conta_saque');
        $conta_saque_btc = $this->input->post('conta_saque_btc');
        $conta_saque_bankon = $this->input->post('conta_saque_bankon');
        $cep = $this->input->post('cep');
        $endereco = $this->input->post('endereco');

        $celular = $this->input->post('celular');
        $complemento = $this->input->post('complemento');
        $bairro = $this->input->post('bairro');
        $cidade = $this->input->post('cidade');
        $nova_senha = $this->input->post('nova_senha');
        $authy = $this->input->post('authy');

        if (InformacoesUsuario('email') != $email) {

            $this->db->where('email', $email);
            $usuario = $this->db->get('usuarios');

            if ($usuario->num_rows() > 0) {

                return '<div class="alert alert-danger text-center">O email informado já está em uso, tente novamente.</div>';
            }
        }

        if (InformacoesUsuario('cpf') != $cpf) {

            $this->db->where('cpf', $cpf);
            $usuario = $this->db->get('usuarios');

            if ($usuario->num_rows() == 1 && ConfiguracoesSistema('maximo_cpfs') == 1) {

                return '<div class="alert alert-danger text-center">CPF já cadastrado, por favor, use outro.</div>';
            }

            if ($usuario->num_rows() >= ConfiguracoesSistema('maximo_cpfs')) {

                return '<div class="alert alert-danger text-center">Esse CPF já excedeu o número máximo de registros no sistema.</div>';
            }
        }

        $dados = array(
            'nome' => $nome,
            'email' => $email,
            'cpf' => $cpf,
            'conta_saque' => $conta_saque,
            'conta_saque_btc' => $conta_saque_btc,
            'conta_saque_bankon' => $conta_saque_bankon,
            'cep' => $cep,
            'endereco' => $endereco,
            'celular' => $celular,
            'complemento' => $complemento,
            'bairro' => $bairro,
            'cidade' => $cidade
        );

        if (!empty($nova_senha)) {
            $dados['senha'] = md5($nova_senha);
        }

        $this->db->where('id', $this->userid);
        $update = $this->db->update('usuarios', $dados);

        if ($update) {

            return '<div class="alert alert-success text-center">Dados alterados com sucesso!</div>';
        }

        return '<div class="alert alert-danger text-center">Erro ao alterar dados. Tente novamente.</div>';
    }

    public function AtivarAuthy() {
        $this->db->where('id', $this->userid);
        $this->db->where('dfa', NULL);
        $usuario = $this->db->get('usuarios');

        if ($usuario->num_rows() > 0) {
            $this->db->where('id', $this->userid);
            $this->db->update('usuarios', array('dfa' => $this->session->userdata('_authy')));

            $this->session->unset_userdata('_authy');
            $this->session->unset_userdata('authy-confirmado');
        }
    }

    public function jurosComposto() {
        $valor = (float) filter_var($this->input->post('valor'), FILTER_SANITIZE_NUMBER_INT) / 100;
        $meses = (int) filter_var($this->input->post('meses'), FILTER_SANITIZE_NUMBER_INT);

        if ($valor <= 0) {
            return '<div class="alert alert-danger text-center">O valor deve ser maior que zero</div>';
        }

        if ($valor >= 100000000.00) {
            return '<div class="alert alert-danger text-center">O valor deve ser menor ou igual a R$ 10.0000.000,00</div>';
        }

        if ($meses <= 0) {
            return '<div class="alert alert-danger text-center">A quantidade de meses deve ser maior que zero</div>';
        }

        if ($meses >= 25) {
            return '<div class="alert alert-danger text-center">A quantidade de meses deve ser menor ou igual a 24 meses</div>';
        }


        $total = $valor * pow((1 + 60 / 100), $meses);

        return '<div class="alert alert-success text-center">Você terá em ' . $meses . ' ' . (($meses == 1) ? 'mês' : 'meses') . ' o valor de R$ ' . number_format($total, 2, ',', '.') . '</div>';
    }

    public function DesativarAuthy() {
        $senha = md5($this->input->post('senha'));

        $this->db->where('id', $this->userid);
        $this->db->where('senha', $senha);
        $usuario = $this->db->get('usuarios');

        if ($usuario->num_rows() > 0) {
            $this->db->where('id', $this->userid);
            $this->db->update('usuarios', array('dfa' => NULL));

            redirect('configuracoes');
            exit();
        }

        return '<div class="text-danger text-center">Senha não confere</div>';
    }

    public function PlanoAtivo() {

        $this->db->select('f.data_pagamento');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.id_usuario', $this->userid);
        $this->db->where('f.status', 1);
        $plano = $this->db->get();

        if ($plano->num_rows() > 0) {

            $row = $plano->row();

            $vencimento = strtotime($row->data_pagamento) + (60 * 60 * 24 * ConfiguracoesSistema('quantidade_dias'));

            return date('Y-m-d H:i:s', $vencimento);
        }

        return false;
    }

}

?>