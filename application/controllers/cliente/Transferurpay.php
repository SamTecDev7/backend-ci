<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transferurpay extends CI_Controller {
  

    function index(){
      /*$this->load->model('admin/Configurpaymodel', 'UrpayDatabase');
      $this->load->helper('urpaysetup');
      $dataUrpay = $this->UrpayDatabase->getUrpaySetup();
      $getSavedCrypt = decrypt($dataUrpay[0]->urpay_setup_chave);

      if($dataUrpay){
        $getSavedCrypt = decrypt($dataUrpay[0]->urpay_setup_chave);
        var_dump($getSavedCrypt);
      } else {
          return FALSE;   
      }*/
       
        $usuario = 'julianomkm1';
        $getUser = Transferurpay::getUserID($usuario);

        if($getUser){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.urpay.com.br/v1/user-api/finance/new-transfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",CURLOPT_POSTFIELDS =>"{\n\t\"to_user_id\": \"".$getUser."\",\n\t\"value\": 50\n}",
        
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjVjNTQ5OTY3MTU1MjVhZDRkN2M1ODlhYyIsInR5cGVMb2dpbiI6InVzZXJfdG9rZW4iLCJ0eXBlVG9rZW4iOiJ0cmFuc2ZlciIsImlhdCI6MTU1OTg3NDE1OH0.PiU4uc_lgWVuMV5ZSX2RBq9-L7ZK91B2euChyv-HtD8"
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
      } else {
        echo "Erro na tentativa de resgate do usuário:";
      }




    }


    function getUserID($user){
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.urpay.com.br/v1/user-api/".$user,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "Content-Type: application/json",
          "Authorization: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjVjNTQ5OTY3MTU1MjVhZDRkN2M1ODlhYyIsImlkS2V5IjoiJDJiJDEwJC54My80aXhNZDZxRVpJckFaLkQ5dy4vR2ZUOUFKRzZiY2ttbXpLTFl4YktqeDB2S2VUQUJDIiwidHlwZUxvZ2luIjoidXNlcl90b2tlbiIsInR5cGVMb2dpbktleSI6IiQyYiQxMCRUVE1tWC5SZ0VVUVBEOFJxbm12U3pPenRrZGZsRTk5bWdyMHdzdUttQ0NaQkpRU3BJNWdaMiIsInR5cGVUb2tlbiI6ImdlbmVyYWwiLCJ0eXBlVG9rZW5LZXkiOiIkMmIkMTAkM0pFSFVFU3h5NkNnZzJxLmcuZ3dsLmJwN285VHJNM1EuNWFPRFp2WFhKbURza2RWQS5tU20iLCJpYXQiOjE1NTExNDE1MjJ9.8_R3aM-9O-pMqynwSCqkXmjbp5_aBzuiKwuG8KPi42U"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        return false;
      } else {
        $getValue = json_decode($response, true);
        return $getValue['user']['_id'];
        
      }
    }
}