<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Auth';

$route['auth'] = 'Auth';

// ------------------------------------------------------------------------
// Admin
// ------------------------------------------------------------------------
$route['admin/dashboard']                                   = 'Admin/DashboardController';

$route['admin/pegawai']                                     = 'Admin/PegawaiController';
$route['admin/pegawai/create']                              = 'Admin/PegawaiController/create';
$route['admin/pegawai/store']                               = 'Admin/PegawaiController/store';
$route['admin/pegawai/edit/(:any)']                         = 'Admin/PegawaiController/edit/$1';
$route['admin/pegawai/update']                              = 'Admin/PegawaiController/update';
$route['admin/pegawai/delete/(:any)']                       = 'Admin/PegawaiController/delete/$1';

$route['admin/jabatan']                                     = 'Admin/JabatanController';
$route['admin/jabatan/create']                              = 'Admin/JabatanController/create';
$route['admin/jabatan/store']                               = 'Admin/JabatanController/store';
$route['admin/jabatan/edit/(:any)']                         = 'Admin/JabatanController/edit/$1';
$route['admin/jabatan/update']                              = 'Admin/JabatanController/update';
$route['admin/jabatan/delete/(:any)']                       = 'Admin/JabatanController/delete/$1';

$route['admin/golongan']                                    = 'Admin/GolonganController';
$route['admin/golongan/create']                             = 'Admin/GolonganController/create';
$route['admin/golongan/store']                              = 'Admin/GolonganController/store';
$route['admin/golongan/edit/(:any)']                        = 'Admin/GolonganController/edit/$1';
$route['admin/golongan/update']                             = 'Admin/GolonganController/update';
$route['admin/golongan/delete/(:any)']                      = 'Admin/GolonganController/delete/$1';

$route['admin/potongan']                                    = 'Admin/PotonganController';
$route['admin/potongan/create']                             = 'Admin/PotonganController/create';
$route['admin/potongan/store']                              = 'Admin/PotonganController/store';
$route['admin/potongan/edit/(:any)']                        = 'Admin/PotonganController/edit/$1';
$route['admin/potongan/update']                             = 'Admin/PotonganController/update';
$route['admin/potongan/delete/(:any)']                      = 'Admin/PotonganController/delete/$1';

$route['admin/tunjangan']                                   = 'Admin/TunjanganController';
$route['admin/tunjangan/create']                            = 'Admin/TunjanganController/create';
$route['admin/tunjangan/store']                             = 'Admin/TunjanganController/store';
$route['admin/tunjangan/edit/(:any)']                       = 'Admin/TunjanganController/edit/$1';
$route['admin/tunjangan/update']                            = 'Admin/TunjanganController/update';
$route['admin/tunjangan/delete/(:any)']                     = 'Admin/TunjanganController/delete/$1';

$route['admin/absensi']                                     = 'Admin/AbsensiController';
$route['admin/absensi/create']                              = 'Admin/AbsensiController/create';
$route['admin/absensi/store']                               = 'Admin/AbsensiController/store';
$route['admin/absensi/edit/(:any)']                         = 'Admin/AbsensiController/edit/$1';
$route['admin/absensi/update']                              = 'Admin/AbsensiController/update';
$route['admin/absensi/delete/(:any)']                       = 'Admin/AbsensiController/delete/$1';
$route['admin/absensi/search']                              = 'Admin/AbsensiController/search';
$route['admin/absensi/auto']                                = 'Admin/AbsensiController/auto';

$route['admin/slip']                                        = 'Admin/SlipController';
$route['admin/slip/create']                                 = 'Admin/SlipController/create';
$route['admin/slip/store']                                  = 'Admin/SlipController/store';
$route['admin/slip/edit/(:any)']                            = 'Admin/SlipController/edit/$1';
$route['admin/slip/update']                                 = 'Admin/SlipController/update';
$route['admin/slip/delete/(:any)']                          = 'Admin/SlipController/delete/$1';
$route['admin/slip/download/(:any)']                        = 'Admin/SlipController/download/$1';
$route['admin/slip/search']                                 = 'Admin/SlipController/search';
$route['admin/slip/auto']                                   = 'Admin/SlipController/auto';

$route['admin/laporan']                                     = 'Admin/LaporanController';
$route['admin/laporan/find']                                = 'Admin/LaporanController/find';
$route['admin/laporan/find_']                               = 'Admin/LaporanController/find_';
$route['admin/laporan/print']                               = 'Admin/LaporanController/print';

// ------------------------------------------------------------------------
// Pimpinan
// ------------------------------------------------------------------------

$route['pimpinan/dashboard']                                = 'Pimpinan/DashboardController';
$route['pimpinan/absensi']                                  = 'Pimpinan/AbsensiController';
$route['pimpinan/slip']                                     = 'Pimpinan/SlipController';
$route['pimpinan/laporan']                                  = 'Pimpinan/LaporanController';

// ------------------------------------------------------------------------
// Pegawai
// ------------------------------------------------------------------------

$route['pegawai/dashboard']                                 = 'Pegawai/DashboardController';


$route['profile/edit']                                      = 'ProfileController/edit';
$route['profile/update']                                    = 'ProfileController/update';
$route['profile/changepassword']                            = 'ProfileController/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
