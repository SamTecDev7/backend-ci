<?php
function ConfiguracoesSistema($coluna){

    $_this =& get_instance();

    $configuracoes = $_this->db->get('configuracao');

    if($configuracoes->num_rows() > 0){

        return $configuracoes->row()->$coluna;
    }

    return false;
}

function PorcentagemDoDia($colunaF){

    $_this =& get_instance();

    $configuracoes = $_this->db->get('faturas');

    if($configuracoes->num_rows() > 0){

        return $configuracoes->row()->$colunaF;
    }else{

        return 'Não há faturas no sistema';
    }

    return false;
}

function Authy($secret, $token) {
    $totp = new \OTPHP\TOTP(ConfiguracoesSistema('nome_site'), $secret);
    
    if ($totp->now() == preg_replace("/[^0-9]/", "", $token)) {
        return true;
    }
}

function formatarValor($valor) {
    return number_format((float) filter_var($valor, FILTER_SANITIZE_NUMBER_INT) / 100, 2, '.', '');
}

?>