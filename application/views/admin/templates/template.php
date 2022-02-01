<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/pro/img/apple-icon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/pro/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            <?php echo ConfiguracoesSistema('nome_site'); ?>
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- CSS Files -->
        <link href="<?php echo base_url(); ?>assets/pro/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/plugins/orgchart/jquery.orgchart.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>vendor/needim/noty/lib/noty.css">


    </head>

    <body class="">
        <div class="wrapper ">
            <div class="sidebar" data-color="danger" data-background-color="<?php echo ConfiguracoesSistema('tema_admin') ?>">
                <!--
                  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
          
                  Tip 2: you can also add an image using data-image tag
                -->
                <div class="logo d-none d-sm-block">
                    <a href="<?php echo base_url('admin'); ?>" class="simple-text logo-mini">
                        <i class="material-icons">dashboard</i>
                    </a>
                    <!---<a class="logo" href="dashboard"><img src="<?php echo base_url(); ?>uploads/<?php echo ConfiguracoesSistema('logo'); ?>" alt="60" width="150" /></a>--->
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
                                <i class="material-icons">dashboard</i>
                                <p> Dashboard </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#financeiro">
                                <i class="fa fa-file-text-o"></i>
                                <p> Financeiro
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="financeiro">

                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/faturas/liberar'); ?>">
                                            <span class="sidebar-mini"> A </span>
                                            <span class="sidebar-normal"> Aguardando </span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/faturas/pendentes'); ?>">
                                            <span class="sidebar-mini"> PL </span>
                                            <span class="sidebar-normal"> Pendentes </span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/faturas/liberadas'); ?>">
                                            <span class="sidebar-mini"> L </span>
                                            <span class="sidebar-normal"> Liberadas </span>
                                        </a>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/saques'); ?>">
                                            <span class="sidebar-mini"> S </span>
                                            <span class="sidebar-normal"> Saques </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/usuarios'); ?>">
                                <i class="fa fa-users"></i>
                                <p> Usuários </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/niveis'); ?>">
                                <i class="fa fa-ioxhost"></i>
                                <p> Níveis de Indicação </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/tickets'); ?>">
                                <i class="fa fa-ticket"></i>
                                <p> Tickets </p>
                            </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/notificacoes'); ?>">
                                <i class="fa fa-bell"></i>
                                <p> Notificações </p>
                            </a>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#configuracao">
                                <i class="fa fa-cog"></i>
                                <p> Configurações
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="configuracao">                                
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/deposito'); ?>">
                                            <span class="sidebar-mini"> CP </span>
                                            <span class="sidebar-normal"> Contas para pagamento </span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/configuracoes/site'); ?>">
                                            <span class="sidebar-mini"> CS </span>
                                            <span class="sidebar-normal"> Configurações do site </span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/configuracoes/email'); ?>">
                                            <span class="sidebar-mini"> CE </span>
                                            <span class="sidebar-normal"> Configurações de email </span>
                                        </a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="<?php echo base_url('admin/configuracoes/financeira'); ?>">
                                            <span class="sidebar-mini"> CF </span>
                                            <span class="sidebar-normal"> Configurações Financeiras </span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </li>


                        <li class="nav-item ">
                            <a class="nav-link" href="<?php echo base_url('admin/logout'); ?>">
                                <i class="fa fa-globe"></i>
                                <p>  Logout </p>
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


                                <li class="dropdown" style="margin-left: 10px;list-style-type: none;">
                                    <button id="aba_notificacoes_admin" class="btn btn-just-icon btn-white btn-fab btn-round" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-bell-o"></i>
                                    </button>

                                    <!--dropdown -->
                                    <ul class="dropdown-menu dropdown-menu-right -responsive">
                                        <div class="dropdown-header">Notificações (<span id="total_notificacoes_pendentes_admin"><?php echo $this->UsuarioModel->QuantidadeNotificacoesAdmin(); ?></span>)</div>
                                        <ul class="Notification-list Notification-list--small niceScroll list-group">
                                            <?php
                                            if ($this->UsuarioModel->MinhasNotificacoesAdmin() !== false) {
                                                foreach ($this->UsuarioModel->MinhasNotificacoesAdmin() as $notificacao) {
                                                    ?>
                                                    <li class="Notification list-group-item">
                                                        <a href="">
                                                            <div class="Notification__avatar Notification__avatar--danger pull-left" href="">
                                                                <i class="Notification__avatar-icon fa fa-exclamation"></i>
                                                            </div>
                                                            <div class="Notification__highlight">
                                                                <p class="Notification__highlight-excerpt"><b><?php echo $notificacao->mensagem; ?></b></p>
                                                                <p class="Notification__highlight-time"><?php echo TempoAtras(strtotime($notificacao->data)); ?></p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <div class="dropdown-footer">
                                            <a style="float: right; margin: 10px;" href="<?php echo base_url('admin/notificacoes/admin'); ?>">Ver todas</a>
                                        </div>
                                    </ul>
                                    <!--/ dropdown -->
                                </li>




                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">person</i>
                                        <p class="d-lg-none d-md-block">
                                            Account
                                        </p>
                                        <div class="ripple-container"></div></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                        <a class="dropdown-item" href="<?php echo base_url('admin/configuracoes/site'); ?>">Configuração do site</a>
                                        <a class="dropdown-item" href="<?php echo base_url('admin/configuracoes/email'); ?>">Configurações de email</a>
                                        <a class="dropdown-item" href="<?php echo base_url('admin/configuracoes/financeira'); ?>">Configurações Financeiras</a>
                                        <a class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>">Logout</a>
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
                                                <?php echo date('Y'); ?> &copy; <?php echo ConfiguracoesSistema('nome_site'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </footer>
                        <!-- End Footer-->
                    </div>
                    <script>
                        var baseURL = '<?php echo base_url(); ?>';

<?php
if (isset($active) && $active == 'dashboard') {

    if ($this->DashboardModel->PlanoAtivo() !== false) {
        ?>
                                var data_inicio = '<?php echo $this->DashboardModel->PlanoAtivo(); ?>';
        <?php
    }
}
?>
                    </script>
                    <!-- inject:js -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/core/jquery.min.js"></script>
                    <script src="<?php echo base_url(); ?>assets/pro/js/core/popper.min.js"></script>
                    <script src="<?php echo base_url(); ?>assets/pro/js/core/bootstrap-material-design.min.js"></script>
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/perfect-scrollbar.jquery.min.js"></script>

                    <!-- endinject -->

                    <!-- Plugin for the momentJs  -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/moment.min.js"></script>
                    <!--  Plugin for Sweet Alert -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/sweetalert2.js"></script>
                    <!-- Forms Validations Plugin -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/jquery.validate.min.js"></script>
                    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/jquery.bootstrap-wizard.js"></script>
                    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/bootstrap-selectpicker.js"></script>
                    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/bootstrap-datetimepicker.min.js"></script>
                    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/jquery.dataTables.min.js"></script>
                    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/bootstrap-tagsinput.js"></script>
                    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/jasny-bootstrap.min.js"></script>
                    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/fullcalendar.min.js"></script>
                    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/jquery-jvectormap.js"></script>
                    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/nouislider.min.js"></script>
                    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
                    <!-- Library for adding dinamically elements -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/arrive.min.js"></script>
                    <!--  Google Maps Plugin    -->
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
                    <!-- Place this tag in your head or just before your close body tag. -->
                    <script async defer src="https://buttons.github.io/buttons.js"></script>
                    <!-- Chartist JS -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/chartist.min.js"></script>
                    <!--  Notifications Plugin    -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/plugins/bootstrap-notify.js"></script>
                    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
                    <script src="<?php echo base_url(); ?>assets/pro/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>

                    <!-- Custom Js-->
                    <script src="<?php echo base_url(); ?>assets/pages/geral.js"></script>

                    <script src="<?php echo base_url(); ?>assets/dist/js/main.js?4"></script>
                    <script src="<?php echo base_url(); ?>assets/pages/admin/table.js?12"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


                    <?php
                    if (isset($jsLoader)) {

                        foreach ($jsLoader as $type => $script) {

                            $link = ($type === 'external') ? $script : base_urL($script);

                            echo '<script src="' . $link . '"></script>';
                        }
                    }
                    ?>


                    </body>
                    </html>