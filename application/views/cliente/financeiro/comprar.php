<?php if (isset($message)) echo $message;
?>

<div class="col-md-12">
	<div class="card LetrasAzul">
		<div class="card-header card-header card-header-text">
			<div class="card-text">
				<h4 class="card-title" style="color: #07c1e7">PLANOS DE RENDIMENTO</b></h4>
			</div>
		</div>
		<div class="card-body ">
			<form id="cotas" action="" method="post" class="form-horizontal form-variance">
				<div class="row">
					<label class="col-sm-2 col-form-label">Escolha quantos pacotes quiser
					</label>
					<div class="col-sm-10">
						<div class="form-group bmd-form-group">
							<select class="form-control" name="quantidade" required>
								<?php
								$valorInicial = ConfiguracoesSistema('valor_cota');
								$total = 0;
								for ($i = 1; $i <= 200; $i++) {
									$total += $valorInicial;
									echo '<option value="' . $i . '">' . $i . ' ' . (($valorInicial == $total) ? 'Pacote' : 'Pacotes') . ' por ' . number_format($total, 2, ".", ",") . ' USD' . '</option>';
								}
								?>

							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<label class="col-sm-2 col-form-label">&nbsp;
					</label>
					<div class="col-sm-10">
						<div class="form-group bmd-form-group">
							<button id="cotas" type="submit" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;" name="submit" value="Comprar">Comprar</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
