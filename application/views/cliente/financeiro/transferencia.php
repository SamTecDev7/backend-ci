<script src="assets/pro/js/core/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script src="assets/pro/js/plugins/bootstrap-notify.js"></script>

<link rel="stylesheet" href="assets/load.css">
<div id="preloader" style="display: none;">
    <div id="loader"></div>
</div>
<div class="row" style="opacity: unset;">
    <div class="col-md-12">
        <div class="card LetrasAzul">
            <div class="card-header card-header-icon card-header-success">
                <h4 class="card-title" style="color: #07c1e7">TRANSFERÊNCIAS</h4>
                <div class="card-icon">
                    <i class="fa fa-money fa-2x">
                    </i>
                </div>
            </div>
            <div class="row card-body col-md-12">
                <div class="col-sm-12">
                    <div id="msg"></div>
                </div>
                <br>

                <div class="col-sm-12">
                    <h3 class="text-center text-white">Efetuar transferência</h3>
                    <br>
					<div class="row justify-content-center">
						<div class="col">
							<label class="col-sm-12 control-label">
								<b>Conta de Destino (Login)</b>
							</label>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" id="conta" name="conta" class="form-control u-rounded" style="min-width: 110px" value="" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<div class="col">
							<label class="col-sm-12 control-label">
								<b>Quanto deseja transferir?</b>
							</label>
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="valor" id="valor" class="form-control u-rounded" style="min-width: 110px" placeholder="100,00" autocomplete="off" required="">
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label class="col-sm-12 control-label">&nbsp;
								</label>
								<div class="col-sm-12">
									<button data-toggle="modal" data-target="#confirmarModal" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF; min-width: 230px;">
										<i class="fa fa-check">
										</i> Realizar transferência
									</button>
								</div>
							</div>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="opacity: unset;">
    <div class="col-md-12">
        <div class="card LetrasAzul">
            <div class="card-header card-header-icon card-header-success">
                <h4 class="card-title" style="color: #07c1e7">HISTÓRICO DE TRASFERÊNCIA</h4>
                <div class="card-icon">
                    <i class="fa fa-money fa-2x">
                    </i>
                </div>
            </div>
            <div class="row card-body col-md-12">
				<div class="col-sm-12">
                    <div id="msg"></div>
                </div>
                <br>
                <div class="col-sm-12" style="max-width: 100%; overflow: scroll">
                    <h3 class="text-center text-white">Transações entre membros</h3>
                    <table class="table">
                        <small class="float-left">Últimas dez</small>
                        <thead class="text-warning">
                            <tr><th>
                                    #
                                </th>
                                <th>
                                    Descrição
                                </th>
                                <th>
                                    Valor
                                </th>
                                <th>
                                    Data
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($transfencias !== false) {
                                foreach ($transfencias as $transfencia) {
                                    ?>
                                    <tr>
                                        <td>
                                            #<?php echo $transfencia->id; ?>
                                        </td>
                                        <td>
                                            <span class="text-<?php echo ($transfencia->id_usuario_destino == InformacoesUsuario('id')) ? 'success' : 'danger'; ?>">Transferência <?php echo ($transfencia->id_usuario_destino == InformacoesUsuario('id')) ? "de " . InformacoesUsuario("login", $transfencia->id_usuario) : "para " . InformacoesUsuario("login", $transfencia->id_usuario_destino); ?></span>
                                        </td>
                                        <td>
                                            <span class="text-<?php echo ($transfencia->id_usuario_destino == InformacoesUsuario('id')) ? 'success' : 'danger'; ?>"><?php echo ($transfencia->id_usuario_destino == InformacoesUsuario('id')) ? '+' : '-'; ?> R$ <?php echo number_format($transfencia->valor, 2, ",", "."); ?></span>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y H:i', strtotime($transfencia->data)); ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="confirmarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-dark">
                <h5 class="modal-title" id="confirmarModalLabel">Os dados abaixo estão corretos?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-dark">
                <div id="confirmarModal_msg"></div>

                <div id="confirmarModal_body" style="display:none;">
                    <label class="col-sm-10 control-label" style="color: #000"><b>Destinatário</b></label>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <h6 id="c_conta"></h6>
                        </div>
                    </div>

                    <label class="col-sm-10 control-label" style="color: #000"><b>Valor da transferência</b></label>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <h6 id="c_valor"></h6>
                        </div>
                    </div>

                    <label class="col-sm-10 control-label" style="color: #000"><b>Taxa (5%)</b></label>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <h6 id="c_taxa"></h6>
                        </div>
                    </div>

                    <label class="col-sm-10 control-label" style="color: #000"><b>Valor á ser transferido</b></label>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <h6 id="c_total"></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, alterar</button>
                <button type="button" id="confirmar" class="btn" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF; min-width: 230px;">Sim, confirmar</button>
            </div>
        </div>
    </div>
</div>
<script>$('#valor').mask('##,##0.00', {reverse: true});</script>
	