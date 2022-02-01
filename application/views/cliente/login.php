<!DOCTYPE html>
<html lang="pt-br">


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


<body style="background-image: linear-gradient(to right, #36373F, #000000)">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-5 col-lg-4 col-md-5">

				<div class="card o-hidden border-0 shadow-lg my-5 LetrasAzul" style="border-radius: 10px;">
					<div class="card-body p-0 LetrasAzul">
						<div class="col-lg-12">
							<div class="p-3">
								<img class="displayed" style="width: 200px" src="<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>" alt="">
								<hr style="color: #000">
								<div class="text-center">
									<h1 class="h6 mb-2" style="color: #07c1e7">LOGIN</h1>
								</div>
								<form class="form-signin1 full_side text-white user" action="<?php echo base_url('login');?>" method="POST">
								    <?php if(isset($message)) echo $message;?>
									<div class="form-group">
										<input type="text" name="login" class="form-control form-control-user" aria-describedby="loginHelp" placeholder="Seu login">
									</div>
									<div class="form-group">
										<input type="password" name="senha" class="form-control form-control-user" placeholder="Sua senha">
									</div>
									<div class="form-group">
										<div class="custom-control custom-checkbox small">
											<input type="checkbox" class="custom-control-input" id="customCheck">
											<label class="custom-control-label" for="customCheck" style="color: #fff">Lembrar de
												mim</label>
										</div>
									</div>
									<button type="submit" name="submit" value="submit" class="btn btn-user btn-block" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;">
										Login
									</button>
								</form>
								<hr style="color: #000">
								<div class="justify-content-between row">
									<div class="col-5">
									<a class="small" style="color: #07c1e7" href="<?php echo base_url('recuperar');?>">Recuperar senha</a>
									</div>
									<div class="col-5" style="text-align:right">
									<a class="small" style="color: #07c1e7" href="<?php echo base_url('cadastrar');?>">Abrir conta</a>
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<div class="row justify-content-center">
	<div class="col-xl-4" style="border-radius: 10px; background-color: #fff">
		<div class="accordion accordion-flush" style="background-color: rgba(255, 0, 0, 0);" id="accordionFlushExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="flush-headingOne">
				<button class="accordion-button collapsed" style="border-radius: 10px;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
					Dúvidas frequentes
				</button>
				</h2>
				<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
				<div class="accordion-body">
					<strong>Qual valor mínimo de investimento?</strong><p>O valor mínimo de aporte na Minere trader é de 10 dólare, o equivalente a aproximadamente 50 reais.<hr></p>
					<strong>Quanto vou receber por dia?</strong><p>A rentabilidade será entregue de acordo com as operações no Forex, ou seja, de forma conservadora e variável em dias úteis, algo entre 0,5 e 3,0 porcento.<hr></p>
					<strong>Preciso indicar pessoas para ganhar dinheiro?</strong><p>Não, a Minere trader tem seus lucros através da rentabilização do capital de seus associados e separa o valor de bonificação para quem atrai novos clientes.<hr></p>
					<strong>É possível realizar Juros Compostos?</strong><p>Não juros compostos se tornar um risco a saúde da empresa.<hr></p>
					<strong>Como faço para solicitar o Desaporte Total?</strong><p>O saque total e disponível assim que fecha 200% porém vc pode fazer saque diário acima de 20 dólares.<hr></p>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><br>
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
