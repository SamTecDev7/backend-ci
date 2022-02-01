<script src="assets/pro/js/core/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<link rel="stylesheet" href="assets/load.css">

<div id="preloader" style="display: none;">
  <div id="loader"></div>
</div>
<div class="row" style="opacity: unset;">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-icon card-header-success">
          <div class="card-icon">
            <i class="fa fa-money fa-2x">
            </i>
          </div>
          <h4 class="card-title ">Saque Automático CoinPayments
          </h4>
        </div>          
        <div class="card-body">
            <div id="msg">
                    <p class="text-center alert alert-success">
                    Utilize o formulário abaixo para realizar um Saque Automático para sua conta CoinPayments
                    <br>
                    <b>Último endereço usado:</b> <?php echo InformacoesUsuario('coinpayments'); ?>
                </p>
          </div>

            <div class="row">
            <div class="col-sm-10">
              <div class="form-group bmd-form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="saque_conta" id="saque_conta" value="1" checked="">
                      <b>Saldo (R$ 
                        <b id="rendimento"><?php echo number_format(InformacoesUsuario('saldo'), 2, ",", ".");?></b>)
                      </b>
                      <span class="circle">
                        <span class="check">
                        </span>
                      </span>
                    </label>
                </div>
              </div>
            </div>
          </div>

          <div>
            <label class="col-sm-3 control-label">
              <b>Endereço Bitcoin
              </b>
            </label>
            <div class="form-group">
              <div class="col-sm-6">
                  <input type="text" id="conta" name="conta" class="form-control u-rounded" value="<?php echo InformacoesUsuario('coinpayments') ?>" autocomplete="off" required="">
              </div>
            </div>
            <label class="col-sm-3 control-label">
              <b>Quanto deseja sacar?
              </b>
            </label>
            <div class="form-group">
              <div class="col-sm-6">
                  <input type="text" name="valor_saque" id="valor_saque" class="form-control u-rounded" placeholder="100,00" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">&nbsp;
              </label>
              <div class="col-sm-6">
                <button id="confirmar" class="btn btn-success">
                  <i class="fa fa-check">
                  </i> Realizar Saque
                </button>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<script>
$('#valor_saque').mask('##.##0,00', {reverse: true});
$("#confirmar").click(function() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: { saque_conta: $('#saque_conta:checked').val(), conta: $('#conta').val(), valor_saque: $('#valor_saque').val() }, 

            beforeSend: function() {
            $('#preloader').show();
            },

            success: function(data) {
                $("#msg").html('<h4 class="text-center alert alert-'+data.type+'">'+data.msg+'</h4>');
                
                if(data.type === "success"){
                    $("#rendimento").html(data.rendimento);
                    $("#indicacao").html(data.indicacao);
                }
                    $('#preloader').hide();
                },
            error: function() {
                $("#msg").html('<h4 class="text-center alert alert-danger">Problema na comunicação com a CoinPayments, tente novamente mais tarde!</h4>');
                $('#preloader').hide();
            }
        });
});
</script>