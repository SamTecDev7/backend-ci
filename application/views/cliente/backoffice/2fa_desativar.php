
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
      <form action="#" method="POST" class="form-signin" autocomplete="off">
      <img class="mb-4" src="<?php echo base_url();?>assets/authy.svg" alt="" width="72" height="72">
      <h1 class="h3 text-dark mb-3 font-weight-normal">Desativar verificação de duas etapas</h1>

      <label for="senha" class="sr-only">Sua senha</label>
      <input type="password" name="senha" id="senha" class="form-control" placeholder="Sua senha" style="text-align: center;font-size: 24px;" required autofocus>

      <?php if(isset($message)) echo $message;?>
      <br>
      <button name="desativar" value="desativar" class="btn btn-lg btn-danger btn-block mb-3" type="submit">DESATIVAR</button>
    </form>
  </body>
<script>$('#token').mask('00 000 00');</script>
</html>
