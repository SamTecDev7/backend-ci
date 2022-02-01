<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?php echo ConfiguracoesSistema('nome_site');?> - Cadastrar</title>
		<link rel="icon" href="<?php echo base_url();?>uploads/<?php ConfiguracoesSistema('favicon');?>">

		<!-- Custom fonts for this template-->
		<link href="<?php echo base_url();?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
			href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
			rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="<?php echo base_url();?>/css/sb-admin-2.min.css" rel="stylesheet">

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
		<br>
		<div class="container">

			<!-- Outer Row -->
			<div class="row justify-content-center">

				<div class="col-xl-6 col-lg-4 col-md-5">

					<div class="card o-hidden border-0 shadow-lg my-5 LetrasAzul">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-lg-12">
									<div class="p-3">
										<img class="displayed" style="width: 200px" src="<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>" alt="">
										<hr>
										<div class="text-center">
											<h1 class="h6 mb-2" style="color: #07c1e7">CADASTRO</h1>
										</div>
										<form class="form-signin1 full_side text-white user" style="margin-top: 0px;" action="" method="post">
											<?php if(isset($message)) echo $message;?>
											<h6 style="color: white; font-size: 13px">Patrocinador: </h6>
											<div class="form-group">
												<input type="text" class="form-control form-control-user" name="patrocinador" value="<?php echo ($patrocinador !== false && !empty($patrocinador)) ? $patrocinador : ConfiguracoesSistema('login_patrocinador');?>" placeholder="Patrocinador" readonly="">
											</div>	<hr>										
											<div class="row">
												<div class="col">
													<input type="text" class="form-control form-control-user" name="nome" placeholder="Nome" value="<?php echo set_value('nome');?>" required="">
												</div>
												<div class="col">
													<input type="email" class="form-control form-control-user" name="email" placeholder="Email" value="<?php echo set_value('email');?>" required="">
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col">
													<input type="text" class="form-control form-control-user" name="cpf" id="cpf" placeholder="CPF" value="<?php echo set_value('cpf');?>" required="">
												</div>
												<div class="col">
													<input type="text" class="form-control form-control-user" name="celular" id="celular" placeholder="Celular" value="<?php echo set_value('celular');?>" required="">
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col">
													<input type="text" class="form-control form-control-user" name="login" id="login" placeholder="Login" value="<?php echo set_value('login');?>" required="">
												</div>
												<div class="col">
													<input type="password" class="form-control form-control-user" name="senha" placeholder="Senha" value="<?php echo set_value('senha');?>" required="">
												</div>
											</div>
											<br>
											<div class="form-group">
												<h6 style="color: white; font-size: 13px">Ao clicar em <strong>Cadastre-se</strong> você estará aceitando os <a href="termos.pdf" style="color: #07c1e7">termos</a></h6>
											</div>
											<div class="row justify-content-center">
												<div class="col-md-auto" style="width: 60%">
													<input type="submit" name="submit" value="Cadastre-se" class="btn btn-user btn-block" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;"></input>
												</div>
											</div>
										</form>
										<hr>
										<div class="justify-content-between row">
											<div class="col-5">
											<a class="small" style="color: #07c1e7" href="<?php echo base_url('recuperar');?>">Recuperar senha</a>
											</div>
											<div class="col-5" style="text-align:right">
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
		</div>
	
	</body>
</html>


