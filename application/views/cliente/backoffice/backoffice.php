<section id="dashboard-analytics">

    <?php
	$idd = InformacoesUsuario('id');	
    $string = (Patrocinador()) ? InformacoesUsuario('celular', Patrocinador()) : '';
    $stringCorrigida1 = str_replace('(', 'https://api.whatsapp.com/send?phone=55', $string);
    $stringCorrigida2 = str_replace(') ', '', $stringCorrigida1);
    $whats = str_replace('-', '', $stringCorrigida2);
    ?>
	<div class ="row" style="display: none">
		<div class="col-md-12">
			<div class="tradingview-widget-container">
				<div class="tradingview-widget-container__widget"></div>
				<div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Ticker Tape</span></a> by TradingView</div>
				<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
					{
					"symbols": [
					{
					"title": "S&P 500",
							"proName": "OANDA:SPX500USD"
					},
					{
					"description": "USD/JPY",
							"proName": "OANDA:USDJPY"
					},
					{
					"description": "USD/RUB",
							"proName": "MOEX:USDRUB_SPT"
					},
					{
					"description": "USD/CZK",
							"proName": "OANDA:USDCZK"
					},
					{
					"description": "USD/CHF",
							"proName": "OANDA:USDCHF"
					},
					{
					"description": "BRL/JPY",
							"proName": "FX_IDC:BRLJPY"
					},
					{
					"description": "BRL/USD",
							"proName": "FX_IDC:BRLUSD"
					}
					],
							"colorTheme": "light",
							"isTransparent": false,
							"displayMode": "adaptive",
							"locale": "en"
					}
				</script>
			</div>
		</div>
	</div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card LetrasAzul">
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h1 class="mb-2 text-white">Bem-vindo <?php echo InformacoesUsuario('nome')?>, esté é seu escritório virtual.</h1>
                            <p class="m-auto w-60">Seu patrocinador: <b><?php echo (Patrocinador()) ? InformacoesUsuario('login', Patrocinador()) : 'Indefinido'; ?></b>
                            <p class="m-auto w-60">Contato: <b><?php echo (Patrocinador()) ? InformacoesUsuario('celular', Patrocinador()) : 'Indefinido'; ?> <a href="<?php echo $whats ?>"><i class="fa fa-whatsapp" style="font-size: 15px; color: #00ff72;"></i></a></b>
							<hr>
						</div>
                    </div>
                </div>
            </div>
        </div>
        
    	<?php    
			
    		$porcentagem = (PlanoAtual('id')) ? intval(($Total_conta / $total_teto) * 100): 0;
    		
    
    		if (($porcentagem >= 0) && ($porcentagem <= 180)) {
    			$barra = "progress-bar-striped progress-bar-animated bg-primary";
    		}elseif(($porcentagem > 180) &&  ($porcentagem <= 199)){
    			$barra = "progress-bar-striped progress-bar-animated bg-primary";
    		}elseif ($porcentagem >= 200) {
    			$barra = "progress-bar-striped progress-bar-animated bg-primary";
    		}else{
    			$barra = "progress-bar-striped progress-bar-animated bg-primary";
    		}
    		
    		
    	?>
    	
    	<style>
    		.overlay {height: 22px; width: 100%; margin: 0 auto; border-radius: 0px;}
    
    		
    		@media only screen and (max-width: 1000px){
    			.overlay { display: none; }
    		}
    	</style>

		<div class="col-md-12 col-12">
            <div class="card LetrasAzul" style="width: 100%; height: auto">
				<div class="card-content">
                    <div class="card-body pt-0">
						<div class="text-center">
						<br>
						<STRONG>BARRA DO TETO DA CONTA   <a href="<?php echo base_url(); ?>dashboard"><i class="ficon feather icon-refresh-ccw" style="font-size: 20px; color: #fff"></i></a></STRONG>
						<hr>
						</div>
						<div class="progress" style="height: 22px; width: 90%; margin: 0 auto; border-radius: 4px;">
            			  <div class="progress-bar <?php echo $barra ?>" role="progressbar" style="width: <?php echo $porcentagem ?>%" aria-valuenow="<?php echo $porcentagem; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $porcentagem; ?>%</div>
            			</div>
					</div>
				</div>
			</div>
		</div>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

		<div class="col-md-12">
			<div class="row ">
				<div class="col-xl-3 col-lg-6">
					<div class="card33 LetrasAzul">
						<div class="card-statistic-3 p-2">
							<div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
							<div class="mb-4">
								<h5 class="card-title mb-0 text-white">SALDO DE <br>DIVIDENDOS</h5>
							</div>
							<div class="row align-items-center mb-2 d-flex">
								<div class="col-9">
									<h2 class="d-flex align-items-center mb-0 text-white">
										<b><?php echo number_format(InformacoesUsuario('saldo'), 2, ".", ","); ?> $</b>
									</h2>
								</div>
								<div class="col-3 text-right">
									<span><i class="fa fa-arrow-up"></i></span>
								</div>
							</div>
							<div class="progress mt-1 " data-height="8" style="height: 8px;">
								<div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card33 LetrasAzul">
						<div class="card-statistic-3 p-2">
							<div class="card-icon card-icon-large" style="font-size: 80px;"><i class="fa fa-bar-chart"></i></div>
							<div class="mb-4">
								<h5 class="card-title mb-0 text-white">SALDO<br>BONIFICAÇÃO</h5>
							</div>
							<div class="row align-items-center mb-2 d-flex">
								<div class="col-9">
									<h2 class="d-flex align-items-center mb-0 text-white">
										<b><?php echo ($Saldo_rede == "") ? "0.00" : number_format($Saldo_rede, 2, ".", ","); ?> $</b>
									</h2>
								</div>
								<div class="col-3 text-right">
									<span><i class="fa fa-arrow-up"></i></span>
								</div>
							</div>
							<div class="progress mt-1 " data-height="8" style="height: 8px;">
								<div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card33 LetrasAzul">
						<div class="card-statistic-3 p-2">
							<div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
							<div class="mb-4">
								<h5 class="card-title mb-0 text-white">PLANO DE<br>CARREIRA</h5>
							</div>
							<div class="row align-items-center mb-2 d-flex">
								<div class="col-9">
									<h2 class="d-flex align-items-center mb-0 text-white">
									<b><?php echo (PlanoCarreira(InformacoesUsuario('plano_carreira'), 'nome')) ?: 'Sem plano'; ?></b>
									</h2>
								</div>
								<div class="col-3 text-right">
									<span><i class="fa fa-arrow-up"></i></span>
								</div>
							</div>
							<div class="progress mt-1 " data-height="8" style="height: 8px;">
								<div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card33 LetrasAzul">
						<div class="card-statistic-3 p-2">
							<div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
							<div class="mb-4">
								<h5 class="card-title mb-0 text-white">PONTOS DE<br>REDE</h5>
							</div>
							<div class="row align-items-center mb-2 d-flex">
								<div class="col-9">
									<h2 class="d-flex align-items-center mb-0 text-white">
										<b><?php echo number_format($pontos['transferir']['esquerdo'] + $pontos['transferir']['direito'], 0, ".", "."); ?></b>
									</h2>
								</div>
								<div class="col-3 text-right">
									<span><i class="fa fa-arrow-up"></i></span>
								</div>
							</div>
							<div class="progress mt-1 " data-height="8" style="height: 8px;">
								<div class="progress-bar l-bg-cyan2" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-xxl-3 d-flex order-2 order-xxl-3">
					<div class="card flex-fill w-100 LetrasAzul">
						<div class="text-center" style="margin: 10px 0px 0px 0px;">
							<h5 class="card-title text-white">INDICADOS</h5>
						</div>
						<div class="card-body d-flex">
							<div class="align-self-center w-100">
								<table class="table mb-0">
									<tbody>
										<tr>
											<td class="text-white" style="font: 14px normal Arial">TODOS INDICADOS</td>
											<td class="text-right" style="color: #07c1e7"><strong><?php echo $indicadosativos + $indicadospendentes; ?></strong></td>
										</tr>
										<tr>
											<td class="text-white" style="font: 14px normal Arial">INDICADOS ATIVOS</td>
											<td class="text-right" style="color: #07c1e7"><strong><?php echo $indicadosativos; ?></strong></td>
										</tr>
										<tr>
											<td class="text-white" style="font: 14px normal Arial">INDICADOS PENDENTES</td>
											<td class="text-right" style="color: #07c1e7"><strong><?php echo $indicadospendentes; ?></strong></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card LetrasAzul">
                <div class="card-content">
                    <div class="card-body text-center">
                        <div class="text-center">
							<strong>LINK DE INDICAÇÃO</strong>
							<hr>
                            <div class="row">
                                <div class="col-md-10" style="padding: 5px">
                                    <input type="text" class="form-control " readonly="true" id="linkIndicacao" value="<?php if ((((PlanoAtual('id'))) ? intval($total_investido / ConfiguracoesSistema('valor_cota')) . '' : '0') > 0) { echo base_url('new-user/' . InformacoesUsuario('login')); } else { echo "Obrigatorio ter uma pacote ou mais ativos para liberar o link"; } ?>">
                                </div>
                                <div class="col-md-2" style="padding: 5px">
                                    <button class="btn clipboard" style="background: linear-gradient(135deg,#07c1e7,#227cf3) !important; color: #FFF;" data-clipboard-target="#linkIndicacao">Copiar Link</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<script src="assets/js/app.js"></script>
	
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["TODOS", "ATIVOS", "PENDENTES"],
					datasets: [{
						data: [<?php echo (($indicadospendentes + $indicadosativos) > 0) ? $indicadospendentes + $indicadosativos : 1; ?>, <?php echo (($indicadospendentes + $indicadosativos) > 0) ?  $indicadosativos : 1; ?>, <?php echo (($indicadospendentes + $indicadosativos) > 0) ?  $indicadospendentes : 1; ?>],
						backgroundColor: [
							window.theme.primary,
							window.theme.success,
							window.theme.warning
						],
						borderWidth: 2
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
</section>