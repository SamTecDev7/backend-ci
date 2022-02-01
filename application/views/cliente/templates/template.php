<!DOCTYPE html>
<html class="loading" lang="pt-br" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?php echo ConfiguracoesSistema('nome_site');?></title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/vendors/css/charts/apexcharts.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/vendors/css/extensions/tether-theme-arrows.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/vendors/css/extensions/tether.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/vendors/css/extensions/shepherd-theme-default.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/bootstrap-extended.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/colors.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/components.min.css?1">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/themes/dark-layout.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/themes/semi-dark-layout.min.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/core/menu/menu-types/vertical-menu.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/core/colors/palette-gradient.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/pages/dashboard-analytics.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/pages/card-analytics.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/plugins/tour/tour.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/cliente/css/flipper.css">
        <!-- END: Page CSS-->
        <style>
            body{
                background-image: linear-gradient(to right, #36373F, #000000)
            }
            .LetrasAzul{
                background: #494949;
		        color: #07c1e7
	        }
        </style>
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

        <!-- BEGIN: Main Menu-->
        <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" style="background-color: rgb(73, 73, 73);" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="#">
                            <img class="img-fluid mb-0" src="<?php echo base_url();?>uploads/<?php echo ConfiguracoesSistema('logo');?>" alt="">
                        </a>
                    </li>

                </ul>
            </div>
            <hr style="border-top: dotted 2px; color: white; width: 80%"/>
            <div class="sidebar-wrapper"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" style="height: -webkit-fill-available; height: 500px; overflow: auto" data-menu="menu-navigation">
                    
                    <li class="nav-item">
                        <a href="<?php echo base_url('dashboard');?>">
                            <i class="feather icon-home"></i>
                            <span class="menu-title" data-i18n="Dashboard">Pagina inicial</span>
                        </a>
                    </li>
                    <li class=" nav-item">
                        <a href="<?php echo base_url('cotas/comprar');?>">
                            <i class="feather icon-shopping-cart"></i>
                            <span class="menu-title" data-i18n="Comprar cota">Ver planos</span></a>
                    </li>
                    <li class=" nav-item">
                        <a href="#">
                            <i class="feather icon-zap"></i>
                            <span class="menu-title" data-i18n="Minha Rede">Inform de Rede</span>
                        </a>
                        <ul class="menu-content">
                                                
                            <li>
                                <a href="<?php echo base_url('linear');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Rede linear">Indicados</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url('pontos/extrato');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Extrato pontos">Pontos de rede</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url('carreira');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Plano de carreira">Plano de carreira</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    <li class=" nav-item">
                        <a href="#">
                            <i class="feather icon-dollar-sign"></i>
                            <span class="menu-title" data-i18n="Financeiro">Financeiro</span>
                        </a>
                        <ul class="menu-content">
                            
                            <li>
                                <a href="<?php echo base_url('faturas');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Faturas">Faturas</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url('saque');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Saque">Saque</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url('extrato');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Extratos">Extratos</span>
                                </a>
                            </li>
                            
                            <!--<li>
                                <a href="<?php //echo base_url('transferencia');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Transferência">Transferência</span>
                                </a>
                            </li>-->
                            
                        </ul>
                    </li>
                    <li class=" nav-item">
                        <a href="#">
                            <i class="feather icon-user"></i>
                            <span class="menu-title" data-i18n="Minha conta">Minha conta</span>
                        </a>
                        <ul class="menu-content">
                            
                            <li>
                                <a href="<?php echo base_url('configuracoes');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Configurações">Configurações</span>
                                </a>
                            </li>                            
                        </ul>
                    </li>
                    
                    <li class=" nav-item">
                        <a href="#">
                            <i class="feather icon-inbox"></i>
                            <span class="menu-title" data-i18n="Suporte">Suporte</span>
                        </a>
                        <ul class="menu-content">
                            
                            <li>
                                <a href="<?php echo base_url('ticket');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Suporte">Suporte</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?php echo base_url('ticket/abrir');?>">
                                    <i class="feather icon-circle"></i>
                                    <span class="menu-item" data-i18n="Novo Chamado">Novo ticket</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--<li class=" nav-item">
                        <a href="<?php echo base_url('juros');?>">
                            <i class="feather icon-dollar-sign"></i>
                            <span class="menu-title" data-i18n="Comprar cota">Calculadora</span></a>
                    </li>-->
                    <hr style="border-top: dotted 2px; color: white; width: 80%"/>
                    <li class="nav-item">
                        <a href="<?php echo base_url('logout');?>">
                            <i class="feather icon-power"></i>
                            <span class="menu-title" data-i18n="Logout">Sair</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content">

            <!-- BEGIN: Header-->
            <div class="content-overlay"></div>
            <div class=""></div>
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-shadow" style="background-image: linear-gradient(to right, #36373F, #000000)">
                <div class="navbar-wrapper">
                    <div class="navbar-container content">
                        <div class="navbar-collapse" id="navbar-mobile">
                            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                                <ul class="nav navbar-nav bookmark-icons">
                                    <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                                    <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                                    <!--     i.ficon.feather.icon-menu-->
                                    <li class=""><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
								</ul>
                            </div>
                            
                            <ul class="nav navbar-nav float-right">
                                
                            
                                <!-- Modified by Novikov.ua -->
                                <style type="text/css">
                                    a.gflag {
                                        vertical-align: middle;
                                        font-size: 15px;
                                        padding: 0px;
                                        background-repeat: no-repeat;
                                        /*background-image: url(//gtranslate.net/flags/16.png);*/
                                    }

                                    a.gflag img {
                                        border: 0;
                                    }

                                    a.gflag:hover {
                                        /*background-image: url(//gtranslate.net/flags/16a.png);*/
                                    }

                                    #goog-gt-tt {
                                        display: none !important;
                                    }

                                    .goog-te-banner-frame {
                                        display: none !important;
                                    }

                                    .goog-te-menu-value:hover {
                                        text-decoration: none !important;
                                    }

                                    body {
                                        top: 0 !important;
                                    }

                                    #google_translate_element2 {
                                        display: none !important;
                                    }
                                </style>

                                <div style="margin: auto 15px">
                                    <a href="#" onclick="doGTranslate('pt|pt');return false;" title="Português" class="gflag nturl"
                                    style="background-position:-0px -0px;"><img src="<?php echo base_url(); ?>assets/images/flags/br.svg" height="20" width="20"
                                                                                alt="Português"/></a>
                                    <a href="#" onclick="doGTranslate('pt|en');return false;" title="English" class="gflag nturl"
                                    style="background-position:-100px -400px;"><img src="<?php echo base_url(); ?>assets/images/flags/gb.svg" height="20" width="20"
                                                                                    src="English"/></a>
                                    <a href="#" onclick="doGTranslate('pt|es');return false;" title="Español" class="gflag nturl"
                                    style="background-position:-500px -200px;"><img src="<?php echo base_url(); ?>assets/images/flags/es.svg" height="20" width="20"
                                                                                    alt="Español"/></a>
                                </div>


                                <div id="google_translate_element2"></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit2() {
                                        new google.translate.TranslateElement({
                                            pageLanguage: 'pt',
                                            autoDisplay: false
                                        }, 'google_translate_element2');
                                    }
                                </script>
                                <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
                                <script type="text/javascript">
                                    /* <![CDATA[ */
                                    eval(function (p, a, c, k, e, r) {
                                        e = function (c) {
                                            return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
                                        };
                                        if (!''.replace(/^/, String)) {
                                            while (c--) r[e(c)] = k[c] || e(c);
                                            k = [function (e) {
                                                return r[e]
                                            }];
                                            e = function () {
                                                return '\\w+'
                                            };
                                            c = 1
                                        }
                                        while (c--) if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
                                        return p
                                    }('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}', 43, 43, '||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'), 0, {}))
                                    /* ]]> */
                                </script>
                                <!-- Modified by Novikov.ua -->


                                <li class="dropdown dropdown-notification nav-item" style="right:13px;">
                                    
                                    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                        <i class="ficon feather icon-bell"></i>
                                        <span class="badge badge-pill badge-primary badge-up">
                                            <?php echo ($this->UsuarioModel->QuantidadeNotificacoes() > 0) ? $this->UsuarioModel->QuantidadeNotificacoes() : '0';?>
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                        <li class="dropdown-menu-header">
                                            <div class="dropdown-header m-0 p-2">
                                                <h3 class="white"><?php echo ($this->UsuarioModel->QuantidadeNotificacoes() > 0) ? $this->UsuarioModel->QuantidadeNotificacoes() : '';?> Novas</h3><span class="notification-title">Notificações</span>
                                            </div>
                                        </li>
                                        <li class="scrollable-container media-list">
                                            <?php
                                            if($this->UsuarioModel->MinhasNotificacoes() !== false):
                                                foreach($this->UsuarioModel->MinhasNotificacoes() as $notificacao):
                                            ?>
                                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                <div class="media d-flex align-items-start">
                                                    <div class="media-left">
                                                        <i class="feather icon-plus-square font-medium-5 primary"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <small class="notification-text"> <?php echo $notificacao->mensagem;?></small>
                                                    </div>
                                                    <small>
                                                        <time class="media-meta"><?php echo TempoAtras(strtotime($notificacao->data));?></time>
                                                    </small>
                                                </div>
                                            </a>
                                            <?php endforeach; endif; ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- END: Header-->

            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                        <?php echo $contents; ?>
                </div>
            </div>
        </div>
        <!-- END: Content-->
        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light">
            <p class="clearfix lighten-2 mb-0" style="color: #07c1e7"><span class="float-md-left d-block d-md-inline-block mt-25"><?php echo date('Y');?> &copy; <?php echo ConfiguracoesSistema('nome_site');?></span>
            </p>
        </footer>
        <!-- END: Footer-->
        
    	<script>
            var baseURL = '<?php echo base_url();?>';
        </script>
    
        <!-- BEGIN: Vendor JS-->
        <script src="<?php echo base_url(); ?>assets/cliente/vendors/js/vendors.min.js"></script>
        <!-- BEGIN Vendor JS-->
    
        <!-- BEGIN: Page Vendor JS-->
        <script src="<?php echo base_url(); ?>assets/cliente/vendors/js/charts/apexcharts.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/cliente/vendors/js/extensions/tether.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/cliente/vendors/js/extensions/shepherd.min.js"></script>
        <!-- END: Page Vendor JS-->
    
        <!-- BEGIN: Theme JS-->
        <script src="<?php echo base_url(); ?>assets/cliente/js/core/app-menu.min.js?11"></script>
        <script src="<?php echo base_url(); ?>assets/cliente/js/core/app.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/cliente/js/scripts/components.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/cliente/js/scripts/footer.min.js"></script>
        <!-- END: Theme JS-->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
        
    	<?php
                if(isset($jsLoader)){
    
                    foreach($jsLoader as $type=>$script){
    
                        $link = ($type === 'external') ? $script : base_urL($script);
    
                        echo '<script src="'.$link.'"></script>';
                    }
                }
            ?>
        
    </body>
    <!-- END: Body-->

</html>