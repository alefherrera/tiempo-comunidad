<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'pages/view/quienes';
$route['404_override'] = '';

//Notas
$route['notas'] = '/notas/view';
//Submit del eliminar y editar
$route['notas/eliminar/(:any)'] = '/notas/eliminar/$1';
$route['notas/editar_submit/(:any)'] = '/notas/editar_submit/$1';
//Carga los datos al formulario
$route['notas/editar/(:any)'] = '/notas/cargar_editar/$1';
$route['notas/ajax/tabla/(:any)'] = '/notas/ajax_table/$1';
$route['notas/(:any)'] = '/notas/view/$1';
$route['nueva_nota'] = '/notas/nueva_nota';
//Nota
$route['notas/(:any)'] = '/notas/nota_view/$1';

//Anunciantes
$route['anunciantes/submit'] = '/anunciantes/nuevo_anunciante';
$route['anunciantes/editar/submit/(:any)'] = '/anunciantes/editar_submit/$1';
$route['anunciantes/editar/(:any)'] = '/anunciantes/cargar_editar/$1';
$route['anunciantes/eliminar/(:any)'] = '/anunciantes/eliminar/$1';
$route['anunciantes/ajax/rubros_table/(:any)'] = '/anunciantes/ajax_table/$1';
$route['anunciantes/ajax/rubros_view/(:any)'] = '/anunciantes/ajax_rubros/$1';
$route['anunciantes/(:any)'] = '/anunciantes/view/$1';
$route['anunciantes'] = '/anunciantes/view';

//Revista
$route['revista'] = 'revista/view';
$route['revista/verificar_revista/(:any)'] = 'revista/ajax_verificar_existente/$1/$2';
$route['revista/ajax/(:any)'] = 'revista/ajax_view/$1/$2';
$route['revista/(:any)'] = 'revista/view/$1/$2';
$route['revista/nueva_revista'] = 'revista/nueva_revista';

//General
$route['revista/login'] = 'revista/login';
$route['revista/logout'] = 'revista/logout';
$route['(:any)'] = 'pages/view/$1';

//$route['usuario/(:any)'] = 'usuario/view/$1/$2';

/* End of file routes.php */
/* Location: ./application/config/routes.php */