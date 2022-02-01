<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">
<title><?php echo ConfiguracoesSistema('nome_site');?> - Login</title>
<!-- Fontawesome icon CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/login/vendor/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/login/vendor/bootstrap4beta/css/bootstrap.css" type="text/css">

<!-- Adminux CSS -->
 <link rel="stylesheet" href="<?php echo base_url();?>assets/login/css/dark_blue_adminux.css" type="text/css">
</head>
<body class="menuclose menuclose-right">
<figure class="background"> 
    <img src="<?php echo base_url();?>assets/login/img/login_bg.jpg" alt="">
</figure>
<!-- Page Loader -->
<div class="loader_wrapper inner align-items-center text-center">
  <div class="load7 load-wrapper">
    <div class="loading_img"></div>
    <div class="loader"> Carregando... </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Page Loader Ends -->


<header class="navbar-fixed">
<nav class="navbar navbar-toggleable-md sign-in-header">
  <div class="sidebar-left">  <a class="navbar-brand imglogo" style="
    background: url(<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>) no-repeat center left;
    ">
        
   </a>
  </div>
  <div class="col"></div>
  <div class="sidebar-right pull-right" >
    <ul class="navbar-nav  justify-content-end">
      <li><a href="<?php echo base_url('recuperar');?>" class="btn btn-link text-white">Perdi minha senha</a></li>
      <li><a href="<?php echo base_url('login');?>" class="btn btn-primary">Login</a></li>
    </ul>
  </div>
</nav>
</header>
<div class="wrapper-content-sign-in p-0">
  <div class="col-md-8 offset-md-8 text-left side_signing_full">
      <form class="form-signin1 full_side text-white" style="margin-top: 0px;" action="" method="post">
      <h2 class="tex-black mb-4">Cadastre-se</h2>
      <?php if(isset($message)) echo $message; ?>
      <label  class="sr-only">Patrocinador</label>
      <input type="text" class="form-control" name="patrocinador" value="<?php echo ($patrocinador !== false && !empty($patrocinador)) ? $patrocinador : ConfiguracoesSistema('login_patrocinador');?>" placeholder="Patrocinador" readonly>
      <br>
      <label  class="sr-only">Nome</label>
      <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo set_value('nome');?>" required="">
      <br>
      <label  class="sr-only">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email');?>" required="">
      <br>
      <label class="sr-only">CPF</label>
      <input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF" value="<?php echo set_value('cpf');?>" required="">
      <br>
      <label class="sr-only">Celular</label>
      <input type="text" class="form-control" name="celular" id="celular" placeholder="Celular" value="<?php echo set_value('celular');?>" required="">
      <br>
      <label class="sr-only">Celular</label>
      <input type="text" class="form-control" name="login" id="login" placeholder="Login" value="<?php echo set_value('login');?>" required="">
      <br>
      <label class="sr-only">Celular</label>
      <input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo set_value('senha');?>" required="">
      <br>
      <div class="checkbox">
        <label class="form-check-label active">
          <input type="checkbox" class="form-check-input">
          <i class="fa fa-check"></i></label>
        Lembre de mim </div>
      <input type="submit" name="submit" class="btn btn-lg btn-primary btn-round" value="Cadastre-se"><br>

    </form>
    <br>
  </div>
  <footer class="footer-content row  justify-content-between align-items-center">
    <div class="col-sm-8"> 
        <a href="" target="_blank" class="">
        </a>
    </div>
  </footer>
</div>



<script src="<?php echo base_url();?>assets/login/js/jquery-2.1.1.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> 

<script src="<?php echo base_url();?>assets/login/vendor/bootstrap4beta/js/bootstrap.min.js" type="text/javascript"></script> 

<script>
            "use strict";
            $('input[type="checkbox"]').on('change', function(){
                $(this).parent().toggleClass("active")
                $(this).closest(".media").toggleClass("active");
            }); 
        $(window).on("load", function(){
            /* loading screen */
            $(".loader_wrapper").fadeOut("slow");
        });
</script>
</body>
</html>