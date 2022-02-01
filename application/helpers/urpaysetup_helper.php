<?php 
/*///////////////////////////////////////////////////////////////////////
// FBXWEB - HOST & DEVELOPMENT                                         //
// Sistema de Integração (URPAY) - Desenvolvido por Fábio Britto       //
// WORKANA - Profile: https://www.workana.com/freelancer/fbxweb        //
// email: fabio237@hotmail.com / (11) 97157-0571                       //
// https://www.fbxweb.com.br                                           //
// cnpj: 14.194.140/0001-52                                            //
// última atualização: 12/06/2019 - 08:50:39                           //
*////////////////////////////////////////////////////////////////////////

function encrypt($chave){
    $crypt = urlencode(base64_encode(json_encode($chave)));
    return $crypt;
}

function decrypt($chave){
    $decrypt = json_decode(base64_decode(urldecode($chave)));
    return $decrypt;
}

function getCURL($url, $user, $token){
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url.$user,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: ".$token.""
     ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return json_decode($err);
    } else {
        $checkUser = json_decode($response);
        return $checkUser;
    }

}

function postCURL($url, $field, $tokenTrans){
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => $url, //"{{api_url}}/v1/user-api/finance/new-transfer",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => false,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $field, //"{\n\t\"to_user_id\": \"5bc78ba0825cc700bb1bb551\",\n\t\"value\": 10000\n}",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Authorization: ".$tokenTrans.""
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return json_decode($err);
    } else {
        $postCheck = json_decode($response);
        return $postCheck;
    }

}



function checkUrpaySetup($user, $apicomum){
    $url = "https://api.urpay.com.br/v1/user-api/";
    $checkUser = getCURL($url, $user, $apicomum);
    if($checkUser->messageCode > 0){
        return $checkUser->message->message;
    } else {
        return TRUE;
    }
}

function uperTrans($user, $tokenComum, $tokenTrans, $valor){
    $urlCheckUser = "https://api.urpay.com.br/v1/user-api/";
    $checkUser = getCURL($urlCheckUser, $user, $tokenComum);
    if($checkUser->messageCode > 0 ){
        if($checkUser->messageCode == 4){
            $messageError = "<strong>ATENÇÃO:</strong><br>Seu ID URPAY é Inválido!<br> MENSAGEM DE ERRO: ".$checkUser->message->message."";
        }
        return json_encode(array('controller' => 3, 'alerta_form' => isset($messageError) ? $messageError : 'Não foi possível realizar essa transação'));
      
    } else {
        $urlTrans = "https://api.urpay.com.br/v1/user-api/finance/new-transfer";
        $userID = $checkUser->user->_id;
        $field = "{\n\t\"to_user_id\": \"".$userID."\",\n\t\"value\": ".$valor."\n}";
        $postTrans = postCURL($urlTrans, $field, $tokenTrans);
        return $postTrans;
        /*if($postTrans->messageCode > 0 ){
            $messageError = "<strong>ATENÇÃO:</strong><br> MENSAGEM DE ERRO: ".$postTrans->message->message."";
            return json_encode(array('controller' => 3, 'alerta_form' => isset($messageError) ? $messageError : 'Não foi possível realizar essa transação'));
        } else {
            return TRUE;
        }*/
    }
}

function checkeAPI($url) {  
    $h = @get_headers($url);
    $status = array();
    preg_match('/HTTP\/.* ([0-9]+) .*/', $h[0] , $status);
    return (@$status[1] == 200);
}

function urlAPIUrpay(){
    $url = "https://api.urpay.com.br/";
    return checkeAPI($url);
}

function saudacaoUser(){
    $time = date("H");
    $timezone = date("America/Sao_Paulo");
    if ($time < "12") {
        return "Bom dia";
    } 

    if ($time >= "12" && $time < "17") {
        return "Boa tarde";
    }

    if ($time >= "17" && $time < "19") {
        return "Boa noite";
    }

    if ($time >= "00") {
        return "Boa Noite";
    }
}

