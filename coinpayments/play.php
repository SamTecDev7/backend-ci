<?php
header('Content-type: application/json');
header('Cache-Control: no-cache');

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if (!empty($_POST['valor'])){
        require('CoinpaymentsAPI.php');

        $private_key = '00657b4263DD9eC93969eA7835658fF7718bDD99d345a18f9fab9eF079a4ab0e';
        $public_key = 'a4d6aa35c559c45215ece3714dbb41f499ec9beef139a7594a673747f6a3cbdf';

        $cps_api = new CoinpaymentsAPI($private_key, $public_key, 'json');

        // Insira o valor da transação
        // Esse seria o preço do produto ou serviço que você está vendendo
        $amount = $_POST['valor'];

        // A moeda para o montante acima (preço original)
        $currency1 = 'BRL';

        $currency2 = 'LTCT';

        $buyer_name = $_POST['nome'];
        $buyer_email = $_POST['email'];


        $address = '';


        $item_name = $_POST['fatura_nome'];
        $item_number = $_POST['fatura_id'];
        $fatura_nome = $_POST['fatura_nome'];
        $fatura_id = $_POST['fatura_id'];

        $ipn_url = $_POST['ipn'];

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
}else{
        $arquivo = "log.txt";
        $fp = fopen($arquivo, "a+");
        fwrite($fp, json_encode($_POST));
        fclose($fp);
}
?>