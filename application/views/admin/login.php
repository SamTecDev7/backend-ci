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
<figure class="background"> <img src="<?php echo base_url();?>assets/login/img/login_bg.jpg" alt=""> </figure>
<!-- Page Loader -->

<!-- Page Loader Ends -->


<header class="navbar-fixed">
<nav class="navbar navbar-toggleable-md sign-in-header">
  <div class="sidebar-left">  <a class="navbar-brand imglogo" style="
    background: url(<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>) no-repeat center left;
    ">
        
   </a>
  </div>
  <div class="col"></div>
</nav>
</header>
<div class="wrapper-content-sign-in p-0">
  <div class="col-md-8 offset-md-8 text-left side_signing_full">
      <form class="form-signin1 full_side text-white" action="<?php echo base_url('admin/844f9ad9fd4409d347446347');?>" method="POST">
      <h2 class="tex-black mb-4">Administração</h2>
      <?php if(isset($message)) echo $message;?>
      <label  class="sr-only">Login</label>
      <input type="text" name="login" class="form-control" placeholder="Seu Login" >
      <br>
      <label class="sr-only">Senha</label>
      <input type="password" name="senha" class="form-control" placeholder="Sua Senha" >
      <br>
      <button type="submit" name="submit" value="submit" class="btn btn-lg btn-primary btn-round">Login</button>
      <br>
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