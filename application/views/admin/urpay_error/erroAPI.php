<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Configurações URPAY
                        <small>Gerenciamento do Gateway</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Configurações</li>
                        <li><a href="<?php echo base_url('admin/configuracoes/urpay');?>" class="active">Configurações URPAY</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->
            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section  id="session-desabilitado" class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-12" style="text-align: center;">
                                    <label class="alert alert-danger col-sm-12">
                                    <i class="fas fa-exclamation-triangle" style="font-size:50px"></i>
                                            <h3> ATENÇÃO! URPAY API TEMPORARIAMENTE INDISPONÍVEL</h3>
                                            <small>Desculpe-nos pelo transtorno, o sistema URPAY está fora do ar!</small>
                                    </label>
                                    <div id="countdown" style="margin: 0 auto;"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>

    </div>
</div>
<!--main content end-->
<script>
(function countdown(remaining) {
    if(remaining === 0)
        location.reload(true);
    document.getElementById('countdown').innerHTML = "<i class='fas fa-sync fa-spin'></i> Aguarde, estamos atualizando a página em " + remaining + " segundos..";
    setTimeout(function(){ countdown(remaining - 1); }, 1000);
})(10)
</script>
