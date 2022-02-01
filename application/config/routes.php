<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'website';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Controllers Cliente */
$route['dashboard'] = 'cliente/dashboard';
$route['carreira'] = 'cliente/carreira';
$route['chave'] = 'cliente/chave';
$route['comprovante'] = 'cliente/comprovante';
$route['login'] = 'cliente/conta/login';
$route['logout'] = 'cliente/conta/logout';
$route['configuracoes'] = 'cliente/dashboard/configuracoes';

$route['verificar'] = 'cliente/conta/authy';
$route['configuracoes/2fa'] = 'cliente/dashboard/authy_config';
$route['configuracoes/2fa/novo_codigo'] = 'cliente/dashboard/novo_codigo';
$route['configuracoes/2fa/desativar'] = 'cliente/dashboard/authy_desativar';

$route['new-user/(:any)'] = 'cliente/conta/cadastrar/$1';
$route['cadastrar'] = 'cliente/conta/cadastrar';
$route['recuperar/(:any)'] = 'cliente/conta/recuperar_senha/$1';
$route['recuperar'] = 'cliente/conta/recuperar_senha';
$route['extrato'] = 'cliente/extrato';
$route['boleto/gerar/(:num)'] = 'cliente/boleto/gerar/$1';
$route['faturas'] = 'cliente/faturas';
$route['pagamento'] = 'cliente/pagamento';
$route['pendentes'] = 'cliente/pendentes';
$route['ativos'] = 'cliente/ativos';
$route['linear'] = 'cliente/linear';
$route['cotas'] = 'cliente/faturas';
$route['cotas/comprar'] = 'cliente/faturas/comprar';

$route['cursos'] = 'cliente/cursos';
$route['cursos/meus'] = 'cliente/cursos/meuscursos';
$route['cursos/comprar/(:num)'] = 'cliente/cursos/comprar/$1';
$route['pontos'] = 'cliente/pontos';
$route['pontos/extrato'] = 'cliente/pontos/extrato';
$route['rede'] = 'cliente/rede';

$route['saque'] = 'cliente/saque';
//$route['juros'] = 'cliente/dashboard/juros';
$route['saquerendimento'] = 'cliente/saquerendimento';
$route['saqueindicacao'] = 'cliente/saqueindicacao';
//$route['transferencia'] = 'cliente/transferencia';

$route['ticket/abrir'] = 'cliente/ticket/abrir';
$route['ticket/visualizar/(:num)'] = 'cliente/ticket/visualizar/$1';
$route['ticket/fechar/(:num)'] = 'cliente/ticket/fechar/$1';
$route['ticket'] = 'cliente/ticket';
$route['saqueurpay'] = 'cliente/configurpay';


$route['saquecoinpayments'] = 'cliente/SaqueCoinpayments';


$route['coinpayments-call'] = 'cliente/Coinpayments';


/* Controllers Administrador */
$route['adminere'] = 'admin/dashboard';

$route['admin/planilha'] = 'admin/planilha';

$route['admin/844f9ad9fd4409d347446347'] = 'admin/conta/login';
$route['admin/logout'] = 'admin/conta/logout';
$route['admin/saques/visualizar/(:num)'] = 'admin/saques/visualizar/$1';
$route['admin/saques'] = 'admin/saques';
$route['admin/deposito/adicionar'] = 'admin/deposito/adicionar';
$route['admin/deposito/editar/(:num)'] = 'admin/deposito/editar/$1';
$route['admin/deposito/excluir/(:num)'] = 'admin/deposito/excluir/$1';
$route['admin/deposito'] = 'admin/deposito';
$route['admin/faturas/liberar/(:num)'] = 'admin/faturas/liberar/$1';
$route['admin/faturas/liberar'] = 'admin/faturas/liberar';
$route['admin/faturas/liberadas'] = 'admin/faturas/liberadas';
$route['admin/faturas/pendentes'] = 'admin/faturas/pendentes';
$route['admin/faturas/editar/(:num)'] = 'admin/faturas/editar/$1';

$route['admin/cursos/adicionar'] = 'admin/cursos/adicionar';
$route['admin/cursos/editar/(:num)'] = 'admin/cursos/editar/$1';
$route['admin/cursos/excluir/(:num)'] = 'admin/cursos/excluir/$1';
$route['admin/cursos'] = 'admin/cursos';

$route['admin/niveis/adicionar'] = 'admin/niveis/adicionar';
$route['admin/niveis/editar/(:num)'] = 'admin/niveis/editar/$1';
$route['admin/niveis/excluir/(:num)'] = 'admin/niveis/excluir/$1';
$route['admin/niveis'] = 'admin/niveis';
$route['admin/usuarios/delete/(:num)'] = 'admin/usuarios/delete/$1';
$route['admin/usuarios/visualizar/(:num)'] = 'admin/usuarios/visualizar/$1';
$route['admin/usuarios/excluir/(:num)'] = 'admin/usuarios/excluir/$1';

$route['admin/usuarios'] = 'admin/usuarios/usuarios';
$route['admin/usuarios/(:num)'] = 'admin/usuarios/usuarios/$1';

$route['admin/tickets/fechar/(:num)'] = 'admin/tickets/fechar/$1';
$route['admin/tickets/visualizar/(:num)'] = 'admin/tickets/visualizar/$1';
$route['admin/tickets'] = 'admin/tickets';
$route['admin/notificacoes'] = 'admin/notificacoes';
$route['admin/notificacoes/admin'] = 'admin/notificacoes/admin';
$route['admin/configuracoes/site'] = 'admin/configuracoes/site';
$route['admin/configuracoes/email'] = 'admin/configuracoes/email';
$route['admin/configuracoes/financeira'] = 'admin/configuracoes/financeira';
$route['admin/configuracoes/urpay'] = 'admin/configurpay';
$route['admin/configuracoes/urpay-salvar'] = 'admin/configurpay/salvarurpayaction';