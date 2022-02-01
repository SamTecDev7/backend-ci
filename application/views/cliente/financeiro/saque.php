<?php
date_default_timezone_set('America/Sao_Paulo');
$dia_mes = date('d');
$horas_saque = date('H:i');

$dia_saque = substr(InformacoesUsuario('data_cadastro'), 8, 2);
$Segundo_saque = (($dia_saque + 15) > date('t')) ? $dia_saque + 15 - date('t') : $dia_saque + 15;

if (($horas_saque >= '09:30') && ($horas_saque <= '15:00')){
    if ($dia_mes == $dia_saque) {
        $_saque = true;
        $tipo_saldo = 'SALDO DE BÔNUS E RENDIMENTOS: ' . '<text style="color: #fff">' . number_format(InformacoesUsuario('saldo') + InformacoesUsuario('saldo_rede'), 2, ".", ",")  . ' USD</text>';
        $tipo_saque = '1e2';
    } else {
        $_saque = true;
        $tipo_saldo = 'SALDO DE BÔNUS: ' . '<text style="color: #fff">' . number_format(InformacoesUsuario('saldo_rede'), 2, ".", ",") . ' USD</text>';
        $tipo_saque = '2';
    }
} else {
    $tipo_saldo = "SAQUE FECHADO";
    $_saque = false;
}

?>

<link rel="stylesheet" href="assets/load.css">

<div id="preloader" style="display: none;">
    <div id="loader"></div>
</div>
<div class="row" style="opacity: unset;">
    <div class="col-md-12">
        <div class="card LetrasAzul">
            <div class="card-header card-header-icon card-header-success">
                <h6 class="card-title" style="color: #07c1e7"><?php echo $tipo_saldo; ?></h6>
                <div class="card-icon">
                    <i class="fa fa-money fa-2x">
                    </i>
                </div>
            </div>          
            <div class="card-body">
                <div id="msg">
                    <?php if ($_saque): ?>
                        <p>
                            <?php echo (InformacoesUsuario('conta_saque') == "" && InformacoesUsuario('conta_saque_btc') == "" && InformacoesUsuario('conta_saque_bankon') == "") ? 'Você ainda não tem carteira de saque cadastrada, porfavor, vá até as configurações em "Minha Conta" e adicione!' : '';?>
                        </p>
                    </div>

                    <div class="form-check form-check-inline form-group" style="padding-left: 1em">
                        <input class="form-check-input" type="radio" name="inlineRadio1" id="" onclick="radio1()" value="PIX">
                        <label class="form-check-label" for="inlineRadio1">Via PIX</label>
                    </div>
                    <div class="form-check form-check-inline" style="padding-left: 1em">
                        <input class="form-check-input" type="radio" name="inlineRadio2" id="" onclick="radio2()" value="BTC">
                        <label class="form-check-label" for="inlineRadio2">Via BTC</label>
                    </div>
                    <div class="form-check form-check-inline" style="padding-left: 1em">
                        <input class="form-check-input" type="radio" name="inlineRadio3" id="" onclick="radio3()" value="BankOn">
                        <label class="form-check-label" for="inlineRadio3">Via BankOn</label>
                    </div>
                    
                    <div>
                        <label class="col-sm-3 control-label" id="pxbtc">
                            <b>Chave ----</b>
                        </label>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" id="conta" name="conta" class="form-control u-rounded" value="--------------" readonly />
                            </div>
                        </div>
                        <label class="col-sm-3 control-label">
                            <b>Tipo de saque</b>
                        </label>
                        <div class="col-sm-6">
                            <div class="form-group bmd-form-group">
                                <select id="metodo" class="form-control" required>
                                    <?php if ($tipo_saque == '1e2'): ?>
                                        <option value="" selected>Selecione o tipo de saldo</option>
                                        <option value="Rendimento">Rendimento</option>
                                        <option value="Bonus">Bônus</option>
                                    <?php endif; ?>
                                    <?php if ($tipo_saque == '1'): ?>
                                        <option value="" selected>Selecione o tipo de saldo</option>
                                        <option value="Rendimento">Rendimento</option>
                                    <?php endif; ?>
                                    <?php if ($tipo_saque == '2'): ?>
                                        <option value="" selected>Selecione o tipo de saldo</option>
                                        <option value="Bonus">Bônus</option>
                                    <?php endif; ?>
                                </select>                        
                            </div>
                        </div>

                        <label class="col-sm-3 control-label">
                            <b>Quantos dólares deseja sacar?
                            </b>
                        </label>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="valor_saque" autocomplete="off" id="valor_saque" class="form-control u-rounded" value="" placeholder="10.00" required="">
                            </div>
                        </div>
						
                        <button id="confirmar" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;">
                            <i class="fa fa-check">
                            </i> Solicitar Saque
                        </button>
                    </div>
                <?php else: ?>
                    <p class="text-center alert alert-warning">
                        <?php echo ("Os saques não estão liberados no momento. Seu saque é liberado das 10:00 às 15:00, dia " . $dia_saque . " e dia " . $Segundo_saque . " do mês.") ?>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php //echo strtotime("now"); ?>
    <?php //echo strtotime('09:00'); ?>
	
    <script>document.getElementsByName('inlineRadio1')[0].checked = false;document.getElementsByName('inlineRadio2')[0].checked = false;document.getElementsByName('inlineRadio3')[0].checked = false;document.getElementById("conta").value = "--------------";function radio1(){document.getElementsByName('inlineRadio2')[0].checked = false;document.getElementsByName('inlineRadio3')[0].checked = false;document.getElementById("pxbtc").innerText = "Chave PIX";document.getElementById("conta").value = "<?php echo ((str_ireplace(' ', '', InformacoesUsuario('conta_saque')) == '') ? 'Por Favor, adicione sua chave PIX em Configurações!' : InformacoesUsuario('conta_saque')); ?>";document.getElementsByName('inlineRadio3')[0].id = "";document.getElementsByName('inlineRadio2')[0].id = "";document.getElementsByName('inlineRadio1')[0].id = "tipo_chave"}function radio2(){document.getElementsByName('inlineRadio1')[0].checked = false;document.getElementsByName('inlineRadio3')[0].checked = false;;document.getElementById("pxbtc").innerText = "Carteira BTC";document.getElementById("conta").value = "<?php echo ((str_ireplace(' ', '', InformacoesUsuario('conta_saque_btc')) == '') ? 'Por Favor, adicione sua carteira BTC em Configurações!' : InformacoesUsuario('conta_saque_btc')); ?>";document.getElementsByName('inlineRadio3')[0].id = "";document.getElementsByName('inlineRadio1')[0].id = "";document.getElementsByName('inlineRadio2')[0].id="tipo_chave"}function radio3(){document.getElementsByName('inlineRadio1')[0].checked = false;;document.getElementsByName('inlineRadio2')[0].checked = false;;document.getElementById("pxbtc").innerText = "Usuario BankOn";document.getElementById("conta").value = "<?php echo ((str_ireplace(' ', '', InformacoesUsuario('conta_saque_bankon')) == '') ? 'Por Favor, adicione seu usuário bankOn em Configurações!' : InformacoesUsuario('conta_saque_bankon')); ?>";document.getElementsByName('inlineRadio2')[0].id = "";document.getElementsByName('inlineRadio1')[0].id = "";document.getElementsByName('inlineRadio3')[0].id = "tipo_chave"}</script>

</div>