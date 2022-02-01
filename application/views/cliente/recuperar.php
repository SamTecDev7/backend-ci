<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php echo ConfiguracoesSistema('nome_site');?> - Login</title>
<!-- Fontawesome icon CSS -->

<!-- Bootstrap CSS -->

<!-- Adminux CSS -->

<!-- Page Loader -->

<!-- Page Loader Ends -->


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo ConfiguracoesSistema('nome_site');?> - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

	<style>
		.LetrasAzul{
			background: #494949;
			color: #07c1e7
		}
		img.displayed {
			display: block;
			margin-left: auto;
			margin-right: auto 
		}
	</style>

</head>


<body style="background-image: linear-gradient(to right, #36373F, #000000)" class="justify-content-center">
<br><br><br>
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-5 col-lg-4 col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5 LetrasAzul">
					<div class="card-body p-0 LetrasAzul">
						<div class="col-lg-12">
							<div class="p-3">
								<img class="displayed" style="width: 200px" src="<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>" alt="">
								<hr>
								<div class="text-center">
									<h1 class="h6 mb-2" style="color: #07c1e7">RECUPERAR SENHA</h1>
								</div>
                <form class="form-signin1 full_side text-white" action="" method="POST">
                  <?php if(isset($message['mensagem'])) echo $message['mensagem'];?>
                  <?php
                    if(!$this->input->post('email') && !$this->input->post('codigo') && (!isset($codigo) || empty($codigo))){
                  ?>
                  <label  class="sr-only">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Digite seu email" required="">
                  <br>
                  <input type="submit" name="submit" class="btn btn-user btn-block" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF; width: 60%; margin: auto" value="Envie-me o código">
                  <?php
                    }elseif($this->input->post('email') && !$this->input->post('codigo') && $message['status'] == 1){
                  ?>
                  <small>Ainda não recebeu o código? <a href="<?php echo base_url('recuperar');?>">Peça um novo aqui</a></small>
                  <br>
                  <label  class="sr-only">Código</label>
                  <input type="text" class="form-control" name="codigo" placeholder="Informe o código que recebeu no email" required="">
                  <br>   
                  <input type="submit" name="submit" class="btn btn-user btn-block" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF; width: 60%; margin: auto" value="Resetar minha senha">
                  <?php
                        }

                        if(isset($codigo) && !empty($codigo) && $codigo !== false){
                            echo $this->ContaModel->ResetarSenha($codigo);
                        }
                    ?>
                </form>
								<hr>
								<div class="justify-content-between row">
									<div class="col-5">
									<a class="small" style="color: #07c1e7" href="<?php echo base_url('login');?>">Entrar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<footer class="footer-content row  justify-content-between align-items-center">
  <div class="col-sm-8"> 
      <a href="" target="_blank" class="">
      </a>
  </div>
</footer>




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

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5faebd460863900e88c86f11/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->