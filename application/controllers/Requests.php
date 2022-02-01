<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cliente/faturasmodel', 'FaturasModel');
        $this->load->model('cliente/saquemodel', 'SaqueModel');
        $this->load->model('cliente/requestsmodel', 'RequestsModel');
    }

    public function change_binary_key(){

      $key = $this->input->post('key');

      echo $this->UsuarioModel->AlterarChaveBinaria($key);
    }

    public function search_invoice(){

      $invoice = $this->input->post('id_fatura');

      echo $this->FaturasModel->ValorFatura($invoice);
    }

    public function invoce_pay(){

      $invoice = $this->input->post('id_fatura');
      $payment = $this->input->post('forma_pagamento');

      echo $this->FaturasModel->PagarFatura($invoice, $payment);
    }

    public function add_bank_account(){

      $banco = $this->input->post('codigo_banco');
      $agencia_numero = $this->input->post('agencia_numero');
      $agencia_digito = $this->input->post('agencia_digito');
      $conta_numero = $this->input->post('conta_numero');
      $conta_digito = $this->input->post('conta_digito');
      $tipo_conta = $this->input->post('tipo_conta');
      $operacao = $this->input->post('operacao');
      $titular = $this->input->post('titular');
      $documento = $this->input->post('documento');

      echo $this->SaqueModel->CadastrarContaBancaria($banco, $agencia_numero, $agencia_digito, $conta_numero, $conta_digito, $tipo_conta, $operacao, $titular, $documento);
    }

    public function delete_account_user(){

      $id_conta = $this->input->post('id_conta');

      echo $this->SaqueModel->ExcluirContaUsuario($id_conta);
    }

    public function add_carteira_bitcoin(){

      $carteira = $this->input->post('carteira_bitcoin');

      echo $this->SaqueModel->CadastrarCarteiraBitcoin($carteira);
    }

    public function add_mibank(){

      $mibank = $this->input->post('mibank');

      echo $this->SaqueModel->CadastrarMibank($mibank);
    }

    public function withdraw(){

      $tipo_chave = $this->input->post('tipo_chave');
      $metodo = $this->input->post('metodo');
      $valor_saque = $this->input->post('valor_saque');
      $conta = $this->input->post('conta');

      echo $this->SaqueModel->FazerRetirada($metodo, $valor_saque, $tipo_chave, $conta);
    }

    public function refresh_notification($admin = 0){

      echo $this->RequestsModel->AtualizaNotificacoes($admin);
    }

    public function pay_withdraw(){

      $id_saque = $this->input->post('id_saque');

      echo $this->SaqueModel->PagaSaque($id_saque);
    }

    public function reverse_withdraw(){

      $id_saque = $this->input->post('id_saque');

      echo $this->SaqueModel->EstornarSaque($id_saque);

    }

    public function send_contact_form(){

      $this->RequestsModel->EnviarContato();
    }
    
    public function login_usuario(){
      $login = $this->input->post('login');
      echo $this->RequestsModel->login_usuario($login);
    }
}