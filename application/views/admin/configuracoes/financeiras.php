<style>
ul li {
    margin: auto 10px;
}
</style>

<?php if(isset($message)) echo '<br><div style="width: 43%; margin: auto;">'.$message.'</div>'; ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
             <div class="card-header card-header-icon">
                <div class="card-icon" style="color: #0000ff;">
                    <i class="fa fa-cog fa-2x"></i>
                </div>
                <h4 class="card-title ">Configuração de rendimento</h4>
            </div>
			<div class="card-body">
				<div class="table">
					<section class="panel">
						<div class="panel-body">
							<form id="rendimento" action="" method="post" class="form-horizontal form-variance">
								<input id="rendimento" type="submit" name="submit" class="btn btn-success pull-right" value="Atualizar">

								<div class="tab-content">
									<div class="tab-pane active" id="saques">
										<h3 class="text-center">Rendimento dos planos</h3>
										<div class="row">
											<label class="col-sm-2 col-form-label">Porcentagem a ser paga no proximo pagamento
											</label>
											<div class="col-sm-10">
												<div class="form-group bmd-form-group">
													<input id="rendimento" type="text" name="PGporcentagem" class="form-control" value="<?php echo PorcentagemDoDia('porcentagem_dia');?>" required>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>	
					</section>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
             <div class="card-header card-header-icon">
                <div class="card-icon" style="color: #0000ff;">
                    <i class="fa fa-cog fa-2x"></i>
                </div>
                <h4 class="card-title ">Configuração de saque</h4>
            </div>
			<div class="card-body">
				<div class="table">
					<section class="panel">
						<div class="panel-body">
							<form action="" method="post" class="form-horizontal form-variance">
								<input type="submit" name="submit" class="btn btn-success pull-right" value="Atualizar">

								<div class="tab-content">
									<div class="tab-pane active" id="saques">
										<h3 class="text-center">Saque</h3>
										<div class="row">
											<label class="col-sm-2 col-form-label">Valor mínimo Saque
											</label>
											<div class="col-sm-10">
												<div class="form-group bmd-form-group">
													<input type="text" name="valor_minimo_saque" class="form-control" value="<?php echo ConfiguracoesSistema('valor_minimo_saque');?>" required>
												</div>
											</div>
										</div>
			  
										<div class="row">
											<label class="col-sm-2 col-form-label">Taxa do Saque
											</label>
											<div class="col-sm-10">
												<div class="form-group bmd-form-group">
													<input type="text" name="taxa_saque" class="form-control" value="<?php echo ConfiguracoesSistema('taxa_saque');?>" required>
												</div>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>	
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
