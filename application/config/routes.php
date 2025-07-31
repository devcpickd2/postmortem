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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'auth/login';
$route['login'] = 'auth/login';
$route['home'] = 'home';
$route['profil'] = 'profil/index';


// $route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['departemen'] = 'departemen';
$route['departemen/tambah'] = 'departemen/tambah';
$route['departemen/edit/(:any)'] = 'departemen/edit/$1';
$route['departemen/delete/(:any)'] = 'departemen/delete/$1';

$route['plant'] = 'plant';
$route['plant/tambah'] = 'plant/tambah';
$route['plant/edit/(:any)'] = 'plant/edit/$1';
$route['plant/delete/(:any)'] = 'plant/delete/$1';

$route['pegawai'] = 'pegawai';
$route['pegawai/tambah'] = 'pegawai/tambah';
$route['pegawai/edit/(:any)'] = 'pegawai/edit/$1';
$route['pegawai/edituser/(:any)'] = 'pegawai/edituser/$1';
$route['pegawai/editpass/(:any)'] = 'pegawai/editpass/$1';
$route['pegawai/delete/(:any)'] = 'pegawai/delete/$1';

$route['post-mortem'] = 'form/post_mortem';
$route['post-mortem/tambah'] = 'form/post_mortem/tambah';
$route['post-mortem/edit/(:any)'] = 'form/post_mortem/edit/$1';
$route['post-mortem/detail/(:any)'] = 'form/post_mortem/detail/$1';
$route['post-mortem/verifikasi'] = 'form/post_mortem/verifikasi';
$route['post-mortem/status/(:any)'] = 'form/post_mortem/status/$1';
$route['post-mortem/cetak/(:any)'] = 'form/post_mortem/cetak/$1';
$route['post-mortem/delete/(:any)'] = 'form/post_mortem/delete/$1';
$route['post-mortem/diketahui'] = 'form/post_mortem/diketahui';
$route['post-mortem/statusprod/(:any)'] = 'form/post_mortem/statusprod/$1';
$route['post-mortem/export_excel'] = 'form/post_mortem/export_excel';

$route['defeat-evis'] = 'form/defeat_evis';
$route['defeat-evis/tambah'] = 'form/defeat_evis/tambah';
$route['defeat-evis/edit/(:any)'] = 'form/defeat_evis/edit/$1';
$route['defeat-evis/detail/(:any)'] = 'form/defeat_evis/detail/$1';
$route['defeat-evis/verifikasi'] = 'form/defeat_evis/verifikasi';
$route['defeat-evis/status/(:any)'] = 'form/defeat_evis/status/$1';
$route['defeat-evis/delete/(:any)'] = 'form/defeat_evis/delete/$1';
$route['defeat-evis/diketahui'] = 'form/defeat_evis/diketahui';
$route['defeat-evis/statusprod/(:any)'] = 'form/defeat_evis/statusprod/$1';
$route['defeat-evis/evisceration/(:any)'] = 'form/defeat_evis/evisceration/$1';
$route['defeat-evis/export_excel'] = 'form/defeat_evis/export_excel';
$route['defeat-evis/cetak'] = 'form/defeat_evis/cetak';
