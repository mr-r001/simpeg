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
// Superadmin
// ------------------------------------------------------------------------
$route['admin/dashboard']                                   = 'Admin/DashboardController';

$route['admin/user-dosen']                                  = 'Admin/UserDosenController';
$route['admin/user-dosen/create']                           = 'Admin/UserDosenController/create';
$route['admin/user-dosen/store']                            = 'Admin/UserDosenController/store';
$route['admin/user-dosen/edit/(:any)']                      = 'Admin/UserDosenController/edit/$1';
$route['admin/user-dosen/update']                           = 'Admin/UserDosenController/update';
$route['admin/user-dosen/delete/(:any)']                    = 'Admin/UserDosenController/delete/$1';
$route['admin/user-dosen/reset/(:any)']                     = 'Admin/UserDosenController/reset/$1';

$route['admin/user-pegawai']                                = 'Admin/UserPegawaiController';
$route['admin/user-pegawai/create']                         = 'Admin/UserPegawaiController/create';
$route['admin/user-pegawai/store']                          = 'Admin/UserPegawaiController/store';
$route['admin/user-pegawai/edit/(:any)']                    = 'Admin/UserPegawaiController/edit/$1';
$route['admin/user-pegawai/update']                         = 'Admin/UserPegawaiController/update';
$route['admin/user-pegawai/delete/(:any)']                  = 'Admin/UserPegawaiController/delete/$1';
$route['admin/user-pegawai/reset/(:any)']                  = 'Admin/UserPegawaiController/reset/$1';

$route['admin/user-operator']                               = 'Admin/UserOperatorController';
$route['admin/user-operator/create']                        = 'Admin/UserOperatorController/create';
$route['admin/user-operator/store']                         = 'Admin/UserOperatorController/store';
$route['admin/user-operator/edit/(:any)']                   = 'Admin/UserOperatorController/edit/$1';
$route['admin/user-operator/update']                        = 'Admin/UserOperatorController/update';
$route['admin/user-operator/delete/(:any)']                 = 'Admin/UserOperatorController/delete/$1';
$route['admin/user-operator/reset/(:any)']                 = 'Admin/UserOperatorController/reset/$1';

$route['admin/fakultas']                                    = 'Admin/FakultasController';
$route['admin/fakultas/create']                             = 'Admin/FakultasController/create';
$route['admin/fakultas/store']                              = 'Admin/FakultasController/store';
$route['admin/fakultas/edit/(:any)']                        = 'Admin/FakultasController/edit/$1';
$route['admin/fakultas/update']                             = 'Admin/FakultasController/update';
$route['admin/fakultas/delete/(:any)']                      = 'Admin/FakultasController/delete/$1';

$route['admin/prodi']                                       = 'Admin/ProdiController';
$route['admin/prodi/create']                                = 'Admin/ProdiController/create';
$route['admin/prodi/store']                                 = 'Admin/ProdiController/store';
$route['admin/prodi/edit/(:any)']                           = 'Admin/ProdiController/edit/$1';
$route['admin/prodi/update']                                = 'Admin/ProdiController/update';
$route['admin/prodi/delete/(:any)']                         = 'Admin/ProdiController/delete/$1';

$route['admin/tingkatan']                                   = 'Admin/TingkatanController';
$route['admin/tingkatan/create']                            = 'Admin/TingkatanController/create';
$route['admin/tingkatan/store']                             = 'Admin/TingkatanController/store';
$route['admin/tingkatan/edit/(:any)']                       = 'Admin/TingkatanController/edit/$1';
$route['admin/tingkatan/update']                            = 'Admin/TingkatanController/update';
$route['admin/tingkatan/delete/(:any)']                     = 'Admin/TingkatanController/delete/$1';

$route['admin/jenjang_pendidikan']                          = 'Admin/JenjangPendidikanController';
$route['admin/jenjang_pendidikan/create']                   = 'Admin/JenjangPendidikanController/create';
$route['admin/jenjang_pendidikan/store']                    = 'Admin/JenjangPendidikanController/store';
$route['admin/jenjang_pendidikan/edit/(:any)']              = 'Admin/JenjangPendidikanController/edit/$1';
$route['admin/jenjang_pendidikan/update']                   = 'Admin/JenjangPendidikanController/update';
$route['admin/jenjang_pendidikan/delete/(:any)']            = 'Admin/JenjangPendidikanController/delete/$1';

$route['admin/tahun_akademik']                              = 'Admin/TahunAkademikController';
$route['admin/tahun_akademik/create']                       = 'Admin/TahunAkademikController/create';
$route['admin/tahun_akademik/store']                        = 'Admin/TahunAkademikController/store';
$route['admin/tahun_akademik/edit/(:any)']                  = 'Admin/TahunAkademikController/edit/$1';
$route['admin/tahun_akademik/update']                       = 'Admin/TahunAkademikController/update';
$route['admin/tahun_akademik/delete/(:any)']                = 'Admin/TahunAkademikController/delete/$1';

$route['admin/kepanitiaan']                                 = 'Admin/KepanitiaanController';
$route['admin/kepanitiaan/create']                          = 'Admin/KepanitiaanController/create';
$route['admin/kepanitiaan/store']                           = 'Admin/KepanitiaanController/store';
$route['admin/kepanitiaan/edit/(:any)']                     = 'Admin/KepanitiaanController/edit/$1';
$route['admin/kepanitiaan/update']                          = 'Admin/KepanitiaanController/update';
$route['admin/kepanitiaan/delete/(:any)']                   = 'Admin/KepanitiaanController/delete/$1';

$route['admin/pemateri']                                    = 'Admin/PemateriController';
$route['admin/pemateri/create']                             = 'Admin/PemateriController/create';
$route['admin/pemateri/store']                              = 'Admin/PemateriController/store';
$route['admin/pemateri/edit/(:any)']                        = 'Admin/PemateriController/edit/$1';
$route['admin/pemateri/update']                             = 'Admin/PemateriController/update';
$route['admin/pemateri/delete/(:any)']                      = 'Admin/PemateriController/delete/$1';

$route['admin/team']                                        = 'Admin/TeamController';
$route['admin/team/create']                                 = 'Admin/TeamController/create';
$route['admin/team/store']                                  = 'Admin/TeamController/store';
$route['admin/team/edit/(:any)']                            = 'Admin/TeamController/edit/$1';
$route['admin/team/update']                                 = 'Admin/TeamController/update';
$route['admin/team/delete/(:any)']                          = 'Admin/TeamController/delete/$1';

$route['admin/dosen']                                       = 'Admin/DosenController';
$route['admin/dosen/create']                                = 'Admin/DosenController/create';
$route['admin/dosen/store']                                 = 'Admin/DosenController/store';
$route['admin/dosen/edit/(:any)']                           = 'Admin/DosenController/edit/$1';
$route['admin/dosen/update']                                = 'Admin/DosenController/update';
$route['admin/dosen/delete/(:any)']                         = 'Admin/DosenController/delete/$1';

$route['admin/skills']                                      = 'Admin/SkillsController';
$route['admin/skills/create']                               = 'Admin/SkillsController/create';
$route['admin/skills/store']                                = 'Admin/SkillsController/store';
$route['admin/skills/edit/(:any)']                          = 'Admin/SkillsController/edit/$1';
$route['admin/skills/update']                               = 'Admin/SkillsController/update';
$route['admin/skills/delete/(:any)']                        = 'Admin/SkillsController/delete/$1';

$route['admin/pegawai']                                     = 'Admin/PegawaiController';
$route['admin/pegawai/create']                              = 'Admin/PegawaiController/create';
$route['admin/pegawai/store']                               = 'Admin/PegawaiController/store';
$route['admin/pegawai/edit/(:any)']                         = 'Admin/PegawaiController/edit/$1';
$route['admin/pegawai/update']                              = 'Admin/PegawaiController/update';
$route['admin/pegawai/delete/(:any)']                       = 'Admin/PegawaiController/delete/$1';

$route['admin/haki']                                        = 'Admin/HakiController';
$route['admin/haki/create']                                 = 'Admin/HakiController/create';
$route['admin/haki/store']                                  = 'Admin/HakiController/store';
$route['admin/haki/edit/(:any)']                            = 'Admin/HakiController/edit/$1';
$route['admin/haki/update']                                 = 'Admin/HakiController/update';
$route['admin/haki/delete/(:any)']                          = 'Admin/HakiController/delete/$1';

$route['admin/kategori']                                    = 'Admin/KategoriController';
$route['admin/kategori/create']                             = 'Admin/KategoriController/create';
$route['admin/kategori/store']                              = 'Admin/KategoriController/store';
$route['admin/kategori/edit/(:any)']                        = 'Admin/KategoriController/edit/$1';
$route['admin/kategori/update']                             = 'Admin/KategoriController/update';
$route['admin/kategori/delete/(:any)']                      = 'Admin/KategoriController/delete/$1';

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
