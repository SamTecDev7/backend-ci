<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Coinpayments extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('cliente/faturasmodel', 'clientes_faturas');
    }

    public function index() {
        if ($this->input->server('HTTP_HMAC')) {
            $this->IPN();
        } else {
            $this->API();
        }
    }

    public function API() {
        is_logged();

        if (!empty($this->input->post('fatura_id'))) {
            require('.../../coinpayments/CoinpaymentsAPI.php');

            $public_key = ConfiguracoesSistema('coinpayments_public');
            $private_key = ConfiguracoesSistema('coinpayments_private');

            $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');

            $this->db->select('valor');
            $this->db->where('id', $this->input->post('fatura_id'));
            $fatura = $this->db->get('faturas');

            if ($fatura->num_rows() > 0) {
                $amount = $fatura->row()->valor;
            } else {
                $erro['error'] = "Fatura invalida";
                echo json_encode($erro);
                die();
            }


            // A moeda para o montante acima (preço original)
            $currency1 = 'USD';

            $currency2 = 'BTC';

            $buyer_name = InformacoesUsuario('nome');
            $buyer_email = InformacoesUsuario('email');

            $address = '';

            $item_name = $this->input->post('fatura_nome');
            $item_number = $this->input->post('fatura_id');
            $fatura_nome = $this->input->post('fatura_nome');
            $fatura_id = $this->input->post('fatura_id');

            $ipn_url = base_url('coinpayments-call');

            try {
                $transaction_response = $cps_api->CreateComplexTransaction($amount, $currency1, $currency2, $buyer_email, $address, $buyer_name, $item_name, $item_number, $fatura_id, $fatura_nome, $ipn_url);
            } catch (Exception $e) {
                $erro['error'] = $e->getMessage();
                echo json_encode($erro);
                die();
            }
            if ($transaction_response['error'] == 'ok') {
                echo json_encode($transaction_response['result']);
            } else {
                echo json_encode($transaction_response);
                die();
            }
        }
    }

    public function IPN() {
        $secret = ConfiguracoesSistema('coinpayments_secret');

        function errorAndDie($error_msg) {
            die('IPN Error: ' . $error_msg);
        }
        
        if ($this->input->post('ipn_mode') || $this->input->post('ipn_mode') != 'hmac') {
            errorAndDie('IPN Mode is not HMAC');
        }

        if ($this->input->server('HTTP_HMAC') || empty($this->input->server('HTTP_HMAC'))) {
            errorAndDie('No HMAC signature sent.');
        }

        $request = file_get_contents('php://input');
        if ($request === FALSE || empty($request)) {
            errorAndDie('Error reading POST data');
        }

        $hmac = hash_hmac("sha512", $request, trim($secret));
        if ($hmac != $this->input->server('HTTP_HMAC')) {
            errorAndDie('HMAC signature does not match');
        }

        $fatura_id = $this->input->post('item_number');
        $status = intval($this->input->post('status'));

        $this->db->where('id', $fatura_id);
        $fatura = $this->db->get('faturas');

        if ($fatura->num_rows() == 0) {
            errorAndDie('Fatura não existe');
        }

        //SUCESSO
        if ($status >= 100 || $status == 2) {
            $this->clientes_faturas->LiberarFatura($fatura_id, "Bitcoin");
        }
    }

}
