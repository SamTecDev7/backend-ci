<?php

global $bancos;

$bancos = array(
    array(
        'code' => "104",
        'name' => "Caixa Econômica Federal"
    ),
    array(
        'code' => "260",
        'name' => "Nubank"
    ),
    array(
        'code' => "237",
        'name' => "Bradesco"
    ),
    array(
        'code' => "001",
        'name' => "Banco do Brasil"
    ),
    array(
        'code' => "341",
        'name' => "Itau"
    ),
    array(
        'code' => "033",
        'name' => "Banco Santander"
    ),
    array(
        'code' => "290",
        'name' => "Pagbank"
    ),
    array(
        'code' => "212",
        'name' => "Banco Original"
    ),
    array(
        'code' => "748",
        'name' => "Sicredi"
    ),
    array(
        'code' => "756",
        'name' => "Sicoob"
    ),
    array(
        'code' => "735",
        'name' => "Banco Neon"
    ),
    array(
        'code' => "004",
        'name' => "Banco do Nordeste"
    ),
    array(
        'code' => "003",
        'name' => "Banco da Amazônia"
    ),
    array(
        'code' => "021",
        'name' => "Banestes"
    ),
    array(
        'code' => "025",
        'name' => "Banco Alfa"
    ),
    array(
        'code' => "027",
        'name' => "Besc"
    ),
    array(
        'code' => "041",
        'name' => "Banrisul"
    ),
    array(
        'code' => "070",
        'name' => "Banco de Brasília – BRB"
    ),
    array(
        'code' => "074",
        'name' => "Banco J. Safra"
    ),
    array(
        'code' => "077",
        'name' => "Banco Inter"
    ),
    array(
        'code' => "230",
        'name' => "Unicard"
    ),
    array(
        'code' => "246",
        'name' => "Banco ABC Brasil"
    ),
    array(
        'code' => "318",
        'name' => "Banco BMG"
    ),
    array(
        'code' => "409",
        'name' => "Unibanco"
    ),
    array(
        'code' => "422",
        'name' => "Banco Safra"
    ),
    array(
        'code' => "453",
        'name' => "Banco Rural"
    ),
    array(
        'code' => "611",
        'name' => "Banco Paulista"
    ),
    array(
        'code' => "637",
        'name' => "Banco Sofisa"
    ),
    array(
        'code' => "655",
        'name' => "Banco Votorantim"
    ),
);

function Bancos(){

global $bancos;

return $bancos;

}

function BancoPorID($id){

global $bancos;

   foreach($bancos as $banco){

        if($banco['code'] == $id){

            return $banco['name'];
        }
   }
}
?>