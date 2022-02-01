
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Verificação de duas etapas - <?php echo ConfiguracoesSistema('nome_site');?></title>
    <link href="<?php echo base_url();?>assets/pro/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/authy.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/pro/js/core/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  </head>

  <body class="text-center">
      <form action="#" method="POST" class="form-signin" autocomplete="off">
      <img class="mb-4" src="<?php echo base_url();?>assets/authy.svg" alt="" width="72" height="72">
      <h1 class="h3 text-dark mb-3 font-weight-normal">Verificação de duas etapas</h1>
      <label for="token" class="sr-only">Token</label>
      <input type="text" name="token" id="token" class="form-control" placeholder="Seu Token" style="text-align: center;font-size: 24px;" required autofocus>
      <?php if(isset($message)) echo $message;?>
      <br>
      <button name="submit_token" value="submit_token" class="btn btn-lg btn-primary btn-block mb-3" type="submit">Verificar</button>
      <?php if(isset($replay)) echo $replay;?>
      </form>
  </body>
<script>$('#token').mask('000 000');</script>
</html>
