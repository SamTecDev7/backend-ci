
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Cadastrar verificação de duas etapas - <?php echo ConfiguracoesSistema('nome_site');?></title>
    <link href="<?php echo base_url();?>assets/pro/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/authy.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/pro/js/core/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  </head>

  <body class="text-center">
      <form action="#" method="GET" class="form-signin" autocomplete="off" style="max-width: 370px;">
      <h1 class="h3 text-dark mb-2 font-weight-normal">Cadastrar verificação de duas etapas</h1>
      <small class="text-dark">A Verificação de duas etapa utiliza o <a href="https://authy.com/download/" target="_blank">Authy</a>/<a href="#">Google authenticator</a> para autenticar o acesso á algumas página</small>
      <img class="fluid-img" src="<?php echo ($qrcode); ?>">
      <h1 class="h4 text-dark mb-3 font-weight-normal" style="word-break: break-all;"><?php echo ($codigo); ?></h1>
          <?php if(isset($message)) echo $message;?>
      <hr>
      <button name="submit" value="submit" class="btn btn-lg btn-primary btn-block mb-3" type="submit">Continuar</button>
      <small class="text-dark">Você poderá fazer autenticar no aplicativo atraves do QRcode ou do seu código secreto</small>
    </form>
  </body>
<script>$('#token').mask('000 000');</script>
</html>
