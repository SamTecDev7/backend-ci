<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/pro/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/pro/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo ConfiguracoesSistema('nome_site');?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>assets/pro/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/plugins/orgchart/jquery.orgchart.css" rel="stylesheet" type="text/css">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="danger" style="background: linear-gradient(to right, #9127ac, #9127ac); border: none; border-radius: 10px;">
      <div class="logo">
        <a href="<?php echo base_url('dashboard');?>" class="simple-text logo-mini">
          <i class="material-icons">dashboard</i>
        </a>
        <a class="logo" href="dashboard"><img src="<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>" alt="60" width="150" /></a>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('dashboard');?>">
              <i class="fa fa-home"></i>
              <p><strong><font color="white">Dashboard</font> </strong> </p>
            </a>
          </li>
		  <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#cursos">
              <i class="fa fa-shopping-cart"></i> 
              <p> <font color="white">Loja Life</font>
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="cursos">
                
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('cursos');?>">
                    <span class="sidebar-mini"></span>
                    <span class="sidebar-normal"> <font color="white">Comprar</font>  </span>
                  </a>
                </li>
                
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('cursos/meus');?>">
                    <span class="sidebar-mini"></span>
                    <span class="sidebar-normal"> <font color="white">Minhas Compras</font> </span>
                  </a>
                </li>
                
                
              </ul>
            </div>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('planos');?>">
              <i class="fa fa-bar-chart"></i>
              <p><strong> <font color="white">Investimentos</font> </p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#minharede">
              <i class="fa fa-file-text-o"></i>
              <p> <font color="white">Minha Rede
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="minharede">
                
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('ativos');?>">
                    <span class="sidebar-mini"><font color="white"><font color="white"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"> <font color="white"><font color="white"><font color="white"><font color="white"><font color="white"> Indicados ativos </span>
                  </a>
                </li>
                
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('pendentes');?>">
                    <span class="sidebar-mini"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"><font color="white"><font color="white"><font color="white"> Indicados pendentes </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('linear');?>">
                    <span class="sidebar-mini"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"><font color="white"><font color="white"><font color="white"> Rede linear </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('pontos/extrato');?>">
                    <span class="sidebar-mini"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"><font color="white"><font color="white"><font color="white"> Extrato pontos </span>
                  </a>
                </li>
                
                
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('carreira');?>">
                    <span class="sidebar-mini"> <font color="white"><font color="white"></span>
                    <span class="sidebar-normal"> <font color="white"> Plano de carreira </span>
                  </a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#financeiro">
              <i class="fa fa-dollar"></i> 
              <p><font color="white"> Financeiro
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="financeiro">
                
              <ul class="nav">
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('faturas');?>">
                    <span class="sidebar-mini"> <font color="white"><font color="white"><font color="white"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"><font color="white"><font color="white"><font color="white"><font color="white"><font color="white"><font color="white"> Faturas </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('saque');?>">
                    <span class="sidebar-mini"> <font color="white"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"> <font color="white"><font color="white"><font color="white"><font color="white"> Saque </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('transferencia');?>">
                    <span class="sidebar-mini"> <font color="white"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"> <font color="white"><font color="white"><font color="white"><font color="white"> Transferência entre usuários </span>
                  </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url('extrato');?>">
                    <span class="sidebar-mini"><font color="white"><font color="white"><font color="white"><font color="white"></span>
                    <span class="sidebar-normal"> <font color="white"><font color="white">Extratos </span>
                  </a>
                </li>
                
              </ul>
            </div>
          </li>
          
          
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('configuracoes');?>">
              <i class="fa fa-user"></i>
              <p> <font color="white">Minha conta</font> </p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('ticket');?>">
              <i class="fa fa-envelope"></i>
              <p>  <font color="white">Suporte</font> </p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url('logout');?>">
              <i class="fa fa-globe"></i>
              <p>  <font color="white">Logout</font> </p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
          </div>
            <div class="collapse navbar-collapse justify-content-end">
            
    <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                <div class="ripple-container"></div></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?php echo base_url('configuracoes');?>">Minha conta</a>
                  <a class="dropdown-item" href="<?php echo base_url('ticket');?>">Suporte</a>
                  <a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a>
                </div>
              </li>
              </ul>
                </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="content">
          <div class="container-fluid">
          <?php echo $contents; ?>
        </div>

          
          
          
          
          
          
          
          
          
          
          
          
          
          
        
       <!--footer-->
			<footer class="footer">
				 <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  <?php echo date('Y');?> &copy; <?php echo ConfiguracoesSistema('nome_site');?>
                </a>
              </li>
            </ul>
          </nav>
				</div>
			</footer>
			<!-- End Footer-->
		</div>
		<script>
            var baseURL = '<?php echo base_url();?>';

        </script>
        <!-- inject:js -->
              <script src="<?php echo base_url();?>assets/pro/js/core/jquery.min.js"></script>
              <script src="<?php echo base_url();?>assets/pro/js/core/popper.min.js"></script>
              <script src="<?php echo base_url();?>assets/pro/js/core/bootstrap-material-design.min.js"></script>
              <script src="<?php echo base_url();?>assets/pro/js/plugins/perfect-scrollbar.jquery.min.js"></script>

        <!-- endinject -->
        
              <!-- Plugin for the momentJs  -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/moment.min.js"></script>
              <!--  Plugin for Sweet Alert -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/sweetalert2.js"></script>
              <!-- Forms Validations Plugin -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/jquery.validate.min.js"></script>
              <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/jquery.bootstrap-wizard.js"></script>
              <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/bootstrap-selectpicker.js"></script>
              <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/bootstrap-datetimepicker.min.js"></script>
              <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/jquery.dataTables.min.js"></script>
              <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/bootstrap-tagsinput.js"></script>
              <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/jasny-bootstrap.min.js"></script>
              <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/fullcalendar.min.js"></script>
              <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/jquery-jvectormap.js"></script>
              <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/nouislider.min.js"></script>
              <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
              <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
              <!-- Library for adding dinamically elements -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/arrive.min.js"></script>
              <!--  Google Maps Plugin    -->
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
              <!-- Place this tag in your head or just before your close body tag. -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <!-- Chartist JS -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/chartist.min.js"></script>
              <!--  Notifications Plugin    -->
              <script src="<?php echo base_url();?>assets/pro/js/plugins/bootstrap-notify.js"></script>
              <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
              <script src="<?php echo base_url();?>assets/pro/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
		
		<!-- Custom Js-->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>
		<?php
        if(isset($jsLoader)){

            foreach($jsLoader as $type=>$script){

                $link = ($type === 'external') ? $script : base_urL($script);

                echo '<script src="'.$link.'"></script>';
            }
        }
        ?>


    </body>
</html>