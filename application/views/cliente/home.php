<?php include "ler.php" ?>
					<div class="container">
						<div class="row row-cards">
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="card ">
									<div class="card-body">	
										<div class="row">
											<div class="col">
												<div class="h3"><?php echo number_format(InformacoesUsuario('saldo'), 2, ",", ".");?></div>
												<div class="text-muted"><b>SALDO ATUAL</b></div>
											</div>
											<div class="col-auto align-self-center ">
												<div class="chart-circle chart-circle-sm" data-value="0.65" data-thickness="6" data-color="#c21a1a">
													<div class="chart-circle-value"><i class="fa fa-dollar fa-2x text-success" aria-hidden="true"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="card ">
									<div class="card-body">	
										<div class="row">
											<div class="col">
												<div class="h3"><?php echo number_format(InformacoesUsuario('saldo_indicacoes'), 2, ",", ".");?></div>
												<div class="text-muted"><b>SALDO INDICAÇÃO</b></div>
											</div>
											<div class="col-auto align-self-center ">
												<div class="chart-circle chart-circle-sm" data-value="0.65" data-thickness="6" data-color="#736cc7">
													<div class="chart-circle-value"><i class="fa fa-dollar fa-2x text-primary" aria-hidden="true"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="card ">
									<div class="card-body">	
										<div class="row">
											<div class="col">
												<div class="h3"><?php echo PlanoCarreira(InformacoesUsuario('plano_carreira'), 'nome');?></div>
												<div class="text-muted"><b>PLANO DE CARREIRA</b></div>
											</div>
											<div class="col-auto align-self-center ">
												<div class="chart-circle chart-circle-sm" data-value="0.65" data-thickness="6" data-color="#4ecc48">
													<div class="chart-circle-value"><i class="fa fa-users fa-2x text-success" aria-hidden="true"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="card ">
									<div class="card-body">	
										<div class="row">
											<div class="col">
												<div class="h3"><?php echo (InformacoesUsuario('binario') == 1) ? 'Ativo' : 'Inativo';?></div>
												<div class="text-muted"><b>SEU BINÁRIO</b></div>
											</div>
											<div class="col-auto align-self-center ">
												<div class="chart-circle chart-circle-sm" data-value="0.65" data-thickness="6" data-color="#4ecc48">
													<div class="chart-circle-value"><i class="fa fa-users fa-2x text-success" aria-hidden="true"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="card ">
									<div class="card-body">	
										<div class="row">
											<div class="col">
												<div class="h3"><?php echo $rede;?></div>
												<div class="text-muted"><b>SUA REDE</b></div>
											</div>
											<div class="col-auto align-self-center ">
												<div class="chart-circle chart-circle-sm" data-value="0.65" data-thickness="6" data-color="#4ecc48">
													<div class="chart-circle-value"><i class="fa fa-users fa-2x text-success" aria-hidden="true"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="card ">
									<div class="card-body">	
										<div class="row">
											<div class="col">
												<div class="h3"><?php echo $this->bitcoin->Price();?></div>
												<div class="text-muted"><b>COTAÇÃO BITCOIN</b></div>
											</div>
											<div class="col-auto align-self-center ">
												<div class="chart-circle chart-circle-sm" data-value="0.65" data-thickness="6" data-color="#4ecc48">
													<div class="chart-circle-value"><i class="fa fa-users fa-2x text-success" aria-hidden="true"></i></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="row row-deck">
							<div class="col-lg-8 col-sm-12">
								<div class="card ">
									<div class="card-header">
										<h3 class="card-title">Cotação Atual</h3>
									</div>
									<div class="card-body">
										<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script>
										<div class="coinmarketcap-currency-widget" data-currencyid="52" data-base="BRL" data-secondary="" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="true" data-stats="BRL" data-statsticker="false"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-sm-12">
								<div class="card ">
									<div class="card-header">
										<div class="card-title">Meus Planos</div>
									</div>
									<div class="card-body p-4">
										<div class="chats-wrap">
											<div class="chat-details mb-1 p-3">
												<h4 class="mb-0">
													<b>2,365</b>
													<span class="float-right p-1 bg-primary btn btn-sm text-white">
													<b>10</b>%</span>
												</h4>
												<p class="m-0">
													Total customers
													<small>This Year</small>
												</p>
											</div>
											<div class="chat-details mb-1 p-3">
												<h4 class="mb-0">
													<b>25,325</b>
													<span class="float-right p-1 bg-secondary  btn btn-sm text-white">
														<b>50</b>%</span>
												</h4>
												<p class="m-0">
													Total Sales
													<small>of This year</small>
												</p>
											</div>
											<div class="chat-details mb-1 p-3">
												<h4 class="mb-0">
													<b>80%</b>
													<span class="float-right p-1 bg-teal btn btn-sm text-white">
														<b>15%</b>
													</span>
												</h4>
												<p class="m-0">
													Business Growth
													<small>of This year</small>
												</p>
											</div>
											<div class="chat-details mb-1 p-3">
												<h4 class="mb-0">
													<b>5,642</b>
													<span class="float-right p-1 bg-info btn btn-sm text-white">
														<b>5%</b>
													</span>
												</h4>
												<p class="m-0">
													Reviews
													<small>daily</small>
												</p>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mg-t-20">
							<div class="col-12 grid-margin">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title ">Transações</h3>
									</div>
									<div class="">
										<div class="table-responsive border-top">
											<table class="table card-table table-striped table-vcenter text-nowrap">
												<thead>
													<tr>
														<th>Id</th>
														<th>Project Name</th>
														<th >Team</th>
														<th>Feedback</th>
														<th>Date</th>
														<th>Preview</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>2345</td>
														<td>Megan Peters</td>
														<td><div class="avatar-list avatar-list-stacked">
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/12.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/21.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/29.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/2.jpg)"></span>
															</div>
														</td>
														<td>please check pricing Info </td>
														<td class="text-nowrap">July 13, 2018</td>
														<td class="w-1"><a href="#" class="icon"><i class="fa fa-eye"></i></a></td>
													</tr>
													<tr>
														<td>4562</td>
														<td>Phil Vance</td>
														<td><div class="avatar-list avatar-list-stacked">
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/12.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/21.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/29.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/2.jpg)"></span>
															</div>
														</td>
														<td>New stock</td>
														<td class="text-nowrap">June 15, 2018</td>
														<td><a href="#" class="icon"><i class="fa fa-eye"></i></a></td>
													</tr>
													<tr>
														<td>8765</td>
														<td>Adam Sharp</td>
														<td><div class="avatar-list avatar-list-stacked">
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/21.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/6.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/19.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/7.jpg)"></span>
															</div>
														</td>
														<td>Daily updates</td>
														<td class="text-nowrap">July 8, 2018</td>
														<td><a href="#" class="icon"><i class="fa fa-eye"></i></a></td>
													</tr>
													<tr>
														<td>2665</td>
														<td>Samantha Slater</td>
														<td><div class="avatar-list avatar-list-stacked">
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/2.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/1.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/9.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/2.jpg)"></span>
															</div>
														</td>
														<td>available item list</td>
														<td class="text-nowrap">June 28, 2018</td>
														<td><a href="#" class="icon"><i class="fa fa-eye"></i></a></td>
													</tr>
													<tr>
														<td>1245</td>
														<td>Joanne Nash</td>
														<td><div class="avatar-list avatar-list-stacked">
															  <span class="avatar brround" style="background-image: url(assets/images/faces/male/7.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/1.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/9.jpg)"></span>
															  <span class="avatar brround" style="background-image: url(assets/images/faces/female/4.jpg)"></span>
															</div>
														</td>
														<td>Provide Best Services</td>
														<td class="text-nowrap">July 2, 2018</td>
														<td><a href="#" class="icon"><i class="fa fa-eye"></i></a></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>

			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
							Copyright © 2018 <a href="#">Klast</a>. Designed by <a href="#">Spruko</a> All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->
		</div>
		
		<!-- Back to top -->
		<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>
		
		<!-- Dashboard Core -->
		<script src="https://king-profits.cc/new/assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="https://king-profits.cc/new/assets/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="https://king-profits.cc/new/assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="https://king-profits.cc/new/assets/js/vendors/selectize.min.js"></script>
		<script src="https://king-profits.cc/new/assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="https://king-profits.cc/new/assets/js/vendors/circle-progress.min.js"></script>
		<script src="https://king-profits.cc/new/assets/plugins/rating/jquery.rating-stars.js"></script>
		
		<script src="https://king-profits.cc/new/assets/plugins/echarts/echarts.js"></script>
		<script src="https://king-profits.cc/new/assets/js/index5.js"></script>
		<!--Morris.js Charts Plugin -->
		<script src="https://king-profits.cc/new/assets/plugins/am-chart/amcharts.js"></script>
		<script src="https://king-profits.cc/new/assets/plugins/am-chart/serial.js"></script>
		
		<!-- Index Scripts -->
		
		
		<!-- Custom scroll bar Js-->
		<script src="https://king-profits.cc/new/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>
		
		<!-- Custom Js-->
		<script src="https://king-profits.cc/new/assets/js/custom.js"></script>
		
	</body>

<!-- Mirrored from spruko.com/demo/klast/html/Horizantal-Dark-Fullwidth/index5.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Nov 2018 13:01:32 GMT -->
</html>