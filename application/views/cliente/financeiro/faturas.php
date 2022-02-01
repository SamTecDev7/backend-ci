<script src="assets/pro/js/core/jquery.min.js"></script>
<link rel="stylesheet" href="assets/load.css">

<?php
date_default_timezone_set('America/Sao_Paulo');
$dia_mes = date('d');
$diasemana_numero = date('w', strtotime(date('Y-m-d')));
if ($dia_mes == 01 || $dia_mes == 15) {
    $_invest = true;
} else {
    $_invest = false;
}
?>
<?php

$dia_invest = substr(InformacoesUsuario('data_cadastro'), 8, 2);
$Segundo_invest = (($dia_invest + 15) > date('t')) ? $dia_invest + 15 - date('t') : $dia_invest + 15;

?>

<a id="dlr" href="https://dolarhoje.com/" class="dolar-hoje-button" style="pointer-events: none;" data-currency="dolar" target="_blank" title="Cotação do Dólar Hoje">Dólar </a>
<script async src="//dolarhoje-widgets.s3.amazonaws.com/button.js"></script>
<br><br>

<div class="row">
    <div class="col-md-12">
        <div class="card LetrasAzul">
            <div class="card-header card-header-icon card-header-warning">
                <h4 class="card-title" style="color: #07c1e7">FATURAS <small class="text-white">( Todos os valores abaixo estão em dólar )</small></h4>
                <div class="card-icon">
                    <i class="fa fa-envelope fa-2x"></i>
                </div>
            </div>
            <?php if (isset($_COOKIE['pgt_resp']) AND $_COOKIE['pgt_resp'] == "FUCKINGSYSTEM"): ?>
                <center><div style="width: 70%;" class="alert alert-warning text-center">Efetue os pagamentos pendentes abaixo.</div></center>
            <?php endif; ?>
            <?php if (isset($_COOKIE['pgt_resp']) AND $_COOKIE['pgt_resp'] != "S"): ?>
                <center><div style="width: 70%;" class="alert alert-danger text-center"><?= $_COOKIE['pgt_resp'] ?></div></center>
            <?php endif; ?>
            <?php if (isset($_COOKIE['pgt_resp']) AND $_COOKIE['pgt_resp'] == "S"): ?>
                <center><div style="width: 70%;" class="alert alert-success text-center">PAGAMENTO CONFIRMADO COM SUCESSO!</div></center>
            <?php endif; ?>

            <?php if (!empty($data['message'])): ?>
                <center><div style="width: 70%;" class="alert alert-danger text-center"><?= $data['message'] ?></div></center>
            <?php endif; ?>
            <?php if (isset($bankon) && !empty($bankon)): ?>
                <center><?php echo $bankon ?></center>
            <?php endif; ?>

            <?php if (isset($retorno_msg)): ?>
                <center>
                    <div class="text-<?php echo $retorno_type ?> text-center">
                        <h3><?php echo $retorno_msg ?></h3>
                    </div>
                </center>
            <?php endif; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-white">
                            <tr>
								<th>
                                    Id
                                </th>
                                <th>
                                    Descrição
                                </th>
                                <th>
                                    Formas de Pagamento
                                </th>
                                <th>
                                    Valor de compra
                                </th>
                                <th>
                                    Valor recebido
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
						</thead>
                        <tbody>
                            <?php
                            if ($faturas !== false) {

                                foreach ($faturas as $fatura) {
									if ($fatura->teto > 1): 
										$cotas = $fatura->valor / ConfiguracoesSistema('valor_cota');
									elseif ($fatura->teto < 1):
										$cotas = $fatura->lifecoins_v;
									endif; 
                                    $xxx = $fatura->data_pagamento;
                                    ?>
                                    <tr style="color: #07c1e7; white-space: nowrap">
                                        <td><?php echo $fatura->id; ?></td>
										    <?php if ($fatura->teto > 1): ?>
											    <td><?php echo $cotas; ?> <?php echo ($cotas == 1) ? ' - Pacote' : ' - Pacotes'; ?></td>
                                            <?php endif; ?>
                                        <td>
                                            <?php echo ($fatura->status == 0) ? '<a href="javascript:void(0);" data-toggle="modal" data-target="#pagamento" class="btn btn-sm" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #fff"><strong>Pix / Cripto Moedas</strong></a>' : '&nbsp;'; ?>
                                            <?php //echo ($fatura->status == 0) ? '<a href="javascript:void(0);" data-toggle="modal" data-target="#pagamento_coinpayments_' . $fatura->id . '" class="btn btn-sm" style="background: linear-gradient(135deg,#ffff00,#dbdb00) !important; color: #000"><strong>BITCOIN</strong></a>' : '&nbsp;'; ?>
                                            <?php 
                                                if ($dia_invest == $dia_mes || $Segundo_invest == $dia_mes) {
                                                    echo ($fatura->status == 0) ? '<a href="javascript:void(0);" data-toggle="modal" data-target="#saldo_' . $fatura->id . '" class="btn btn-warning btn-sm"><strong>SALDO</strong></a>' : '&nbsp;'; 
                                                }
                                            ?>
                                        </td>

                                        <td id="vlr"><?php echo '$ ' . number_format($fatura->valor, 2, ".", ","); ?></td>
                                        <td><?php echo '$ ' . number_format(($fatura->lucro), 2, ".", ",") . ' de $ ' . number_format(($fatura->teto), 2, ".", ","); ?></td>
                                        <?php
                                        if ($fatura->status == 0) {
                                            $status = "Pendente";
                                            $statusType = "warning";
                                        } elseif (($fatura->status == 1) || ($fatura->status == 2) && ($fatura->teto <= 0.00)) {
                                            $status = "Pago";
                                            $statusType = "success";
                                        } elseif (($fatura->status == 2) && ($fatura->teto > 0.00)) {
                                            $status = "Expirado";
                                            $statusType = "danger";
                                        }
                                        ?>
                                        <td><span class="text-<?php echo $statusType ?>"><?php echo $status ?></span></td>
                                        <td>
                                            <?php if ($fatura->status == 0 && empty($fatura->comprovante)): ?>
                                                <a href="<?php echo base_url('faturas?apagar=' . $fatura->id); ?>" class="text-danger">Excluir</a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
if ($faturas !== false) {
    foreach ($faturas as $fatura) {
        ?>

        <!-- BANKON --> 

        <div class="modal fade" id="pagamento_bankon_<?php echo $fatura->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Pagamento da sua fatura ID <b>#<?php echo $fatura->id; ?></b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        <center><h2><b> @<?php echo ConfiguracoesSistema('bankon_conta') ?></b></h2></center>

                        <center><b>Efetue o pagamento para conta Bankon acima.</b></center><br><br>
                        <center><h4>Valor a ser depositado: R$ <?php echo number_format($fatura->valor, 2, ',', '.'); ?></h4></center><br>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $fatura->id; ?>">
                            <center><input type="text"  class="form-control" style="text-align: center; width: 70%;" name="codigo" placeholder="N° DE TRANSAÇÃO" required="true" autocomplete="off" autofocus=""></center><br>
                            <center><button type="submit" name="bankon" value="bankon" class="btn btn-danger btn-block"><i class="fa fa-check"></i> &nbsp; CONFIRMAR TRANSAÇÃO</button></center>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="pagamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Pagamento da sua fatura</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        if ($formas_pagamento !== false) {
                            ?>

                            <p>Após o pagamento, envie-nos o comprovante 100% legível.</p>
                            <p>Contas para transferências logo abaixo (Clique sobre)</p>

                            <!-- start accordion -->
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php $copyID = 0 ?>
                                <?php
                                foreach ($formas_pagamento as $pagamento) {
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="heading_<?php echo $pagamento->id; ?>">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $pagamento->id; ?>" aria-expanded="false" aria-controls="collapse_<?php echo $pagamento->id; ?>">
                                                    <?php
                                                    if ($pagamento->categoria_conta == 1) {
                                                        echo $pagamento->banco;
                                                    } else {
                                                        //echo '<h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_8" aria-expanded="false" aria-controls="collapse_8" class="collapsed">Pagamento via Pix</a></h4>';
                                                    }
                                                    ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse_<?php echo $pagamento->id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $pagamento->id; ?>">
                                            <div class="panel-body">
                                                <?php
                                                if ($pagamento->categoria_conta == 1) {
                                                    //if (!empty($pagamento->banco) && !is_null($pagamento->banco)) {
                                                        //echo 'Banco: ' . $pagamento->banco . '<br />';
                                                    //}
                                                    if (!empty($pagamento->agencia) && !is_null($pagamento->agencia)) {
                                                        echo 'Agência: ' . $pagamento->agencia . '<br />';
                                                    }
                                                    if (!empty($pagamento->conta) && !is_null($pagamento->conta)) {
                                                        echo '<div class="container"><div class="row"><div class="col-2">Conta: </div><div class="col-7"><input id="text-copy'.$copyID.'" style="color: #000; border: 0; width: 100%" value="' . $pagamento->conta . '"></input></div><div class="col-2"><button id="copy'.$copyID.'" class="rounded-pill" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;">Copiar</button></div></div></div>';
                                                        $copyID = $copyID + 1;
                                                    }
                                                    if (!empty($pagamento->operacao) && !is_null($pagamento->operacao)) {
                                                        echo 'Op: ' . $pagamento->operacao . '<br />';
                                                    }
                                                    if (!empty($pagamento->tipo) && !is_null($pagamento->tipo)) {
                                                        echo 'Tipo de conta: ';
                                                        echo ($pagamento->tipo == 1) ? 'Conta Corrente <br />' : 'Poupança <br />';
                                                    }
                                                    if (!empty($pagamento->documento) && !is_null($pagamento->documento)) {
                                                        echo 'Documento: ' . $pagamento->documento . '<br />';
                                                    }
                                                    if (!empty($pagamento->titular) && !is_null($pagamento->titular)) {
                                                        echo 'Titular: ' . $pagamento->titular . '<br />';
                                                    }
                                                } else {
                                                    //echo '<div class="container"><div class="row"><div class="col-2">Chave: </div><div class="col-7"><input id="text-copy" style="color: #000; border: 0; width: 100%" value="dbc3a068-70d8-4f16-a849-3691ff3ea02b"></input></div><div class="col-2"><button id="copy" class="rounded-pill" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;">Copiar</button></div></div></div>';
                                                    //echo '<div class="container"><div class="row"><div class="col-2">Chave: </div><div class="col-7"><input id="text-copy" style="color: #000; border: 0; width: 100%" value="dbc3a068-70d8-4f16-a849-3691ff3ea02b"></input></div><div class="col-2"><button id="copy" class="rounded-pill" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;">Copiar</button></div></div></div>';
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="col-12 text-center">
                                    <a class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;" href="<?php echo base_url('comprovante'); ?>">Enviar comprovante</a>
                                </div>

                            </div>
                            <!-- .end-accordion-->
                            <?php
                        } else {
                            echo '<div class="alert alert-danger text-center">Nenhuma forma de pagamento disponível no momento. Por favor, volte mais tarde.</div>';
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- COINPAYMENTS -->

        <div class="modal fade" id="pagamento_coinpayments_<?php echo $fatura->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Pagamento da sua fatura ID <b>#<?php echo $fatura->id; ?></b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" style="background-color: #FFFFFF">
                        <div class="loading_<?php echo $fatura->id; ?>" id="loader" style="margin: auto 0 0 -75px;display: none;"></div>
                        <div id="div_<?php echo $fatura->id; ?>">
                            <div id="ERRO_<?php echo $fatura->id; ?>"></div>
                            <div id="Mensagem_<?php echo $fatura->id; ?>">
                                <center><b><p>Após o pagamento, não é preciso enviar comprovante,<br> aguarde que seu pagamento será confirmado por nosso sistema de forma automática.</p></b></center><br>
                            </div>
                            <input type="hidden" id="FATURA_ID_<?php echo $fatura->id; ?>" value="<?php echo $fatura->id; ?>">
                            <input type="hidden" id="FATURA_NOME_<?php echo $fatura->id; ?>" value="<?php echo $fatura->valor; ?>">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #fff" id="coin_submit_<?php echo $fatura->id; ?>">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $("#coin_submit_<?php echo $fatura->id; ?>").click(function () {
                var fatura_id = $("#FATURA_ID_<?php echo $fatura->id; ?>").val();
                var fatura_nome = $("#FATURA_NOME_<?php echo $fatura->id; ?>").val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('coinpayments-call'); ?>',
                    data: {'fatura_id': fatura_id, 'fatura_nome': fatura_nome},
                    dataType: "json",

                    beforeSend: function () {
                        $('.loading_<?php echo $fatura->id; ?>').show();
                        $("#div_<?php echo $fatura->id; ?>").hide();
                    },

                    success: function (data) {
                        if (data.txn_id) {
                            $("#div_<?php echo $fatura->id; ?>").html('<center> <p><b>ID da transação:</b> ' + data.txn_id + '</p> <p><b>Valor a ser pago:</b> ' + data.amount + '<b> BTC</b></p> <p><b>Carteira:</b> <span>' + data.address + '</span></p><a target="_blank" href="' + data.status_url + '">Acompanhar transação</a> <br><img src="' + data.qrcode_url + '" height="150" width="150"></center>');
                        } else {
                            $('#Mensagem_<?php echo $fatura->id; ?>').hide();
                            $("#ERRO_<?php echo $fatura->id; ?>").html('<div class="text-danger text-center">Erro interno, tente novamente mais tarde</div>');
                        }

                        $('.loading_<?php echo $fatura->id; ?>').hide();
                        $("#div_<?php echo $fatura->id; ?>").show();
                    },
                    error: function () {
                        $('#Mensagem_<?php echo $fatura->id; ?>').hide();
                        $("#ERRO_<?php echo $fatura->id; ?>").html('<div class="text-danger text-center">Erro interno, tente novamente mais tarde</div>');

                        $('.loading_<?php echo $fatura->id; ?>').hide();
                        $("#div_<?php echo $fatura->id; ?>").show();
                    }
                });
            });
        </script>

        <div class="modal fade" id="saldo_<?php echo $fatura->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-dark">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Pagamento da sua fatura ID <b>#<?php echo $fatura->id; ?></b></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="" method="GET">
                        <div class="modal-body">
                            <center><b><p>
                                        Após o pagamento, não será possivel desfazer essa ação.
                                    </p>
                                </b>
                            </center>
                        </div>  
                        <div class="modal-footer"> 
							<?php if ($_invest): ?>
								<button type="submit" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #fff" name="pagar_saldo" value="<?php echo $fatura->id; ?>">Confirmar</button>
							<?php else: ?>
								<button type="submit" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #fff" name="paga_saldo" value="">Investimento com saldo somente dia 1 ou 15 do mês.</button>
							<?php endif; ?>
						</div>
                    </form>
                </div>
            </div>
        </div>
		
        <?php
    }
}
echo '<font style="color: #fff">CLIQUE SOBRE O <strong>VALOR DE COMPRA</strong> E CONVERTA O MESMO PARA A MOEDA DO SEU PAÍS SEGUNDO O SEU IDIOMA.</font>';
?>


<script>
$('#copy0').click(function(){
    $('#text-copy0').select();
    document.execCommand('copy');
    alert('Chave copiada');
});
$('#copy1').click(function(){
    $('#text-copy1').select();
    document.execCommand('copy');
    alert('Chave copiada');
});
$('#copy2').click(function(){
    $('#text-copy2').select();
    document.execCommand('copy');
    alert('Chave copiada');
});
$('#copy3').click(function(){
    $('#text-copy3').select();
    document.execCommand('copy');
    alert('Chave copiada');
});

var x1 = document.getElementById('vlr').innerText
var x1 = x1.replace('$', '')
var x1 = Number(x1)

var x2 = document.getElementById('dlr').innerText
var x2 = x2.split(" ")
var x2 = Number(x2[2].replace(',', '.'))

check = '1'

function convert(){

	if (check == '1'){
        
        check = '0'
		var numero = x1 * x2
		var reais = numero.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        document.getElementById('vlr').innerText = reais
    } else {

        check = '1'
        var numero = x1
		var reais = numero.toLocaleString('en',{style: 'currency', currency: 'USD'});
	    document.getElementById('vlr').innerText = reais
    }
}

var x3 = document.getElementById('vlr')
x3.addEventListener("click", convert, false)



</script>