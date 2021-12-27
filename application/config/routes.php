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
$route['auth-admin'] = 'Auth/admin';

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

$route['admin/golongan']                                    = 'Admin/GolonganController';
$route['admin/golongan/create']                             = 'Admin/GolonganController/create';
$route['admin/golongan/store']                              = 'Admin/GolonganController/store';
$route['admin/golongan/edit/(:any)']                        = 'Admin/GolonganController/edit/$1';
$route['admin/golongan/update']                             = 'Admin/GolonganController/update';
$route['admin/golongan/delete/(:any)']                      = 'Admin/GolonganController/delete/$1';

// ------------------------------------------------------------------------
// Dosen
// ------------------------------------------------------------------------

$route['dosen/dashboard']                                   = 'Dosen/DashboardController';

$route['dosen/account']                                     = 'Dosen/AccountController';
$route['dosen/account/update']                              = 'Dosen/AccountController/update';

$route['dosen/personal']                                    = 'Dosen/PersonalController';
$route['dosen/personal/update']                             = 'Dosen/PersonalController/update';

$route['dosen/pendidikan']                                  = 'Dosen/PendidikanController';
$route['dosen/pendidikan/create']                           = 'Dosen/PendidikanController/create';
$route['dosen/pendidikan/store']                            = 'Dosen/PendidikanController/store';
$route['dosen/pendidikan/edit/(:any)']                      = 'Dosen/PendidikanController/edit/$1';
$route['dosen/pendidikan/update']                           = 'Dosen/PendidikanController/update';
$route['dosen/pendidikan/delete/(:any)']                    = 'Dosen/PendidikanController/delete/$1';

$route['dosen/kepangkatan/data']                            = 'Dosen/KepangkatanController';
$route['dosen/kepangkatan/data/update']                     = 'Dosen/KepangkatanController/update';

$route['dosen/kepangkatan/doc']                             = 'Dosen/KepangkatanController/doc_index';
$route['dosen/kepangkatan/doc/create']                      = 'Dosen/KepangkatanController/create';
$route['dosen/kepangkatan/doc/store']                       = 'Dosen/KepangkatanController/store';
$route['dosen/kepangkatan/doc/delete/(:any)']               = 'Dosen/KepangkatanController/delete/$1';

$route['dosen/kepangkatan/riwayat']                         = 'Dosen/KepangkatanController/riwayat_index';
$route['dosen/kepangkatan/riwayat/create']                  = 'Dosen/KepangkatanController/riwayat_create';
$route['dosen/kepangkatan/riwayat/store']                   = 'Dosen/KepangkatanController/riwayat_store';
$route['dosen/kepangkatan/riwayat/edit/(:any)']             = 'Dosen/KepangkatanController/riwayat_edit/$1';
$route['dosen/kepangkatan/riwayat/update']                  = 'Dosen/KepangkatanController/riwayat_update';
$route['dosen/kepangkatan/riwayat/delete/(:any)']           = 'Dosen/KepangkatanController/riwayat_delete/$1';

$route['dosen/tridharma/pengajaran']                        = 'Dosen/PengajaranController';
$route['dosen/tridharma/pengajaran/create']                 = 'Dosen/PengajaranController/create';
$route['dosen/tridharma/pengajaran/store']                  = 'Dosen/PengajaranController/store';
$route['dosen/tridharma/pengajaran/edit/(:any)']            = 'Dosen/PengajaranController/edit/$1';
$route['dosen/tridharma/pengajaran/update']                 = 'Dosen/PengajaranController/update';
$route['dosen/tridharma/pengajaran/delete/(:any)']          = 'Dosen/PengajaranController/delete/$1';

$route['dosen/tridharma/penelitian']                        = 'Dosen/PenelitianController';
$route['dosen/tridharma/penelitian/create']                 = 'Dosen/PenelitianController/create';
$route['dosen/tridharma/penelitian/store']                  = 'Dosen/PenelitianController/store';
$route['dosen/tridharma/penelitian/edit/(:any)']            = 'Dosen/PenelitianController/edit/$1';
$route['dosen/tridharma/penelitian/update']                 = 'Dosen/PenelitianController/update';
$route['dosen/tridharma/penelitian/delete/(:any)']          = 'Dosen/PenelitianController/delete/$1';

$route['dosen/tridharma/buku']                              = 'Dosen/BukuController';
$route['dosen/tridharma/buku/create']                       = 'Dosen/BukuController/create';
$route['dosen/tridharma/buku/store']                        = 'Dosen/BukuController/store';
$route['dosen/tridharma/buku/edit/(:any)']                  = 'Dosen/BukuController/edit/$1';
$route['dosen/tridharma/buku/update']                       = 'Dosen/BukuController/update';
$route['dosen/tridharma/buku/delete/(:any)']                = 'Dosen/BukuController/delete/$1';

$route['dosen/tridharma/haki']                              = 'Dosen/HakiController';
$route['dosen/tridharma/haki/create']                       = 'Dosen/HakiController/create';
$route['dosen/tridharma/haki/store']                        = 'Dosen/HakiController/store';
$route['dosen/tridharma/haki/edit/(:any)']                  = 'Dosen/HakiController/edit/$1';
$route['dosen/tridharma/haki/update']                       = 'Dosen/HakiController/update';
$route['dosen/tridharma/haki/delete/(:any)']                = 'Dosen/HakiController/delete/$1';

$route['dosen/tridharma/pengabdian']                        = 'Dosen/PengabdianController';
$route['dosen/tridharma/pengabdian/create']                 = 'Dosen/PengabdianController/create';
$route['dosen/tridharma/pengabdian/store']                  = 'Dosen/PengabdianController/store';
$route['dosen/tridharma/pengabdian/edit/(:any)']            = 'Dosen/PengabdianController/edit/$1';
$route['dosen/tridharma/pengabdian/update']                 = 'Dosen/PengabdianController/update';
$route['dosen/tridharma/pengabdian/delete/(:any)']          = 'Dosen/PengabdianController/delete/$1';

$route['dosen/tridharma/pemateri']                          = 'Dosen/PemateriController';
$route['dosen/tridharma/pemateri/create']                   = 'Dosen/PemateriController/create';
$route['dosen/tridharma/pemateri/store']                    = 'Dosen/PemateriController/store';
$route['dosen/tridharma/pemateri/edit/(:any)']              = 'Dosen/PemateriController/edit/$1';
$route['dosen/tridharma/pemateri/update']                   = 'Dosen/PemateriController/update';
$route['dosen/tridharma/pemateri/delete/(:any)']            = 'Dosen/PemateriController/delete/$1';

$route['dosen/penunjang/panitia']                           = 'Dosen/PanitiaController';
$route['dosen/penunjang/panitia/create']                    = 'Dosen/PanitiaController/create';
$route['dosen/penunjang/panitia/store']                     = 'Dosen/PanitiaController/store';
$route['dosen/penunjang/panitia/edit/(:any)']               = 'Dosen/PanitiaController/edit/$1';
$route['dosen/penunjang/panitia/update']                    = 'Dosen/PanitiaController/update';
$route['dosen/penunjang/panitia/delete/(:any)']             = 'Dosen/PanitiaController/delete/$1';

$route['dosen/penunjang/profesi']                           = 'Dosen/ProfesiController';
$route['dosen/penunjang/profesi/create']                    = 'Dosen/ProfesiController/create';
$route['dosen/penunjang/profesi/store']                     = 'Dosen/ProfesiController/store';
$route['dosen/penunjang/profesi/edit/(:any)']               = 'Dosen/ProfesiController/edit/$1';
$route['dosen/penunjang/profesi/update']                    = 'Dosen/ProfesiController/update';
$route['dosen/penunjang/profesi/delete/(:any)']             = 'Dosen/ProfesiController/delete/$1';

$route['dosen/penunjang/nonprofesi']                        = 'Dosen/NonprofesiController';
$route['dosen/penunjang/nonprofesi/create']                 = 'Dosen/NonprofesiController/create';
$route['dosen/penunjang/nonprofesi/store']                  = 'Dosen/NonprofesiController/store';
$route['dosen/penunjang/nonprofesi/edit/(:any)']            = 'Dosen/NonprofesiController/edit/$1';
$route['dosen/penunjang/nonprofesi/update']                 = 'Dosen/NonprofesiController/update';
$route['dosen/penunjang/nonprofesi/delete/(:any)']          = 'Dosen/NonprofesiController/delete/$1';

$route['dosen/penghargaan']                                 = 'Dosen/PenghargaanController';
$route['dosen/penghargaan/create']                          = 'Dosen/PenghargaanController/create';
$route['dosen/penghargaan/store']                           = 'Dosen/PenghargaanController/store';
$route['dosen/penghargaan/edit/(:any)']                     = 'Dosen/PenghargaanController/edit/$1';
$route['dosen/penghargaan/update']                          = 'Dosen/PenghargaanController/update';
$route['dosen/penghargaan/delete/(:any)']                   = 'Dosen/PenghargaanController/delete/$1';

$route['dosen/pelatihan/seminar']                           = 'Dosen/SeminarController';
$route['dosen/pelatihan/seminar/create']                    = 'Dosen/SeminarController/create';
$route['dosen/pelatihan/seminar/store']                     = 'Dosen/SeminarController/store';
$route['dosen/pelatihan/seminar/edit/(:any)']               = 'Dosen/SeminarController/edit/$1';
$route['dosen/pelatihan/seminar/update']                    = 'Dosen/SeminarController/update';
$route['dosen/pelatihan/seminar/delete/(:any)']             = 'Dosen/SeminarController/delete/$1';

$route['dosen/pelatihan/workshop']                          = 'Dosen/WorkshopController';
$route['dosen/pelatihan/workshop/create']                   = 'Dosen/WorkshopController/create';
$route['dosen/pelatihan/workshop/store']                    = 'Dosen/WorkshopController/store';
$route['dosen/pelatihan/workshop/edit/(:any)']              = 'Dosen/WorkshopController/edit/$1';
$route['dosen/pelatihan/workshop/update']                   = 'Dosen/WorkshopController/update';
$route['dosen/pelatihan/workshop/delete/(:any)']            = 'Dosen/WorkshopController/delete/$1';

$route['dosen/pelatihan/kursus']                            = 'Dosen/KursusController';
$route['dosen/pelatihan/kursus/create']                     = 'Dosen/KursusController/create';
$route['dosen/pelatihan/kursus/store']                      = 'Dosen/KursusController/store';
$route['dosen/pelatihan/kursus/edit/(:any)']                = 'Dosen/KursusController/edit/$1';
$route['dosen/pelatihan/kursus/update']                     = 'Dosen/KursusController/update';
$route['dosen/pelatihan/kursus/delete/(:any)']              = 'Dosen/KursusController/delete/$1';

$route['dosen/pelatihan/pelatihan']                         = 'Dosen/PelatihanController';
$route['dosen/pelatihan/pelatihan/create']                  = 'Dosen/PelatihanController/create';
$route['dosen/pelatihan/pelatihan/store']                   = 'Dosen/PelatihanController/store';
$route['dosen/pelatihan/pelatihan/edit/(:any)']             = 'Dosen/PelatihanController/edit/$1';
$route['dosen/pelatihan/pelatihan/update']                  = 'Dosen/PelatihanController/update';
$route['dosen/pelatihan/pelatihan/delete/(:any)']           = 'Dosen/PelatihanController/delete/$1';

$route['dosen/pelatihan/lainnya']                           = 'Dosen/LainnyaController';
$route['dosen/pelatihan/lainnya/create']                    = 'Dosen/LainnyaController/create';
$route['dosen/pelatihan/lainnya/store']                     = 'Dosen/LainnyaController/store';
$route['dosen/pelatihan/lainnya/edit/(:any)']               = 'Dosen/LainnyaController/edit/$1';
$route['dosen/pelatihan/lainnya/update']                    = 'Dosen/LainnyaController/update';
$route['dosen/pelatihan/lainnya/delete/(:any)']             = 'Dosen/LainnyaController/delete/$1';

// ------------------------------------------------------------------------
// Pegawai
// ------------------------------------------------------------------------

$route['pegawai/dashboard']                                 = 'Pegawai/DashboardController';

$route['pegawai/account']                                   = 'Pegawai/AccountController';
$route['pegawai/account/update']                            = 'Pegawai/AccountController/update';

$route['pegawai/personal']                                  = 'Pegawai/PersonalController';
$route['pegawai/personal/update']                           = 'Pegawai/PersonalController/update';

$route['pegawai/pendidikan']                                = 'Pegawai/PendidikanController';
$route['pegawai/pendidikan/create']                         = 'Pegawai/PendidikanController/create';
$route['pegawai/pendidikan/store']                          = 'Pegawai/PendidikanController/store';
$route['pegawai/pendidikan/edit/(:any)']                    = 'Pegawai/PendidikanController/edit/$1';
$route['pegawai/pendidikan/update']                         = 'Pegawai/PendidikanController/update';
$route['pegawai/pendidikan/delete/(:any)']                  = 'Pegawai/PendidikanController/delete/$1';

$route['pegawai/kepangkatan']                               = 'Pegawai/KepangkatanController';
$route['pegawai/kepangkatan/update']                        = 'Pegawai/KepangkatanController/update';

$route['pegawai/penghargaan']                               = 'Pegawai/PenghargaanController';
$route['pegawai/penghargaan/create']                        = 'Pegawai/PenghargaanController/create';
$route['pegawai/penghargaan/store']                         = 'Pegawai/PenghargaanController/store';
$route['pegawai/penghargaan/edit/(:any)']                   = 'Pegawai/PenghargaanController/edit/$1';
$route['pegawai/penghargaan/update']                        = 'Pegawai/PenghargaanController/update';
$route['pegawai/penghargaan/delete/(:any)']                 = 'Pegawai/PenghargaanController/delete/$1';

$route['pegawai/pelatihan/seminar']                         = 'Pegawai/SeminarController';
$route['pegawai/pelatihan/seminar/create']                  = 'Pegawai/SeminarController/create';
$route['pegawai/pelatihan/seminar/store']                   = 'Pegawai/SeminarController/store';
$route['pegawai/pelatihan/seminar/edit/(:any)']             = 'Pegawai/SeminarController/edit/$1';
$route['pegawai/pelatihan/seminar/update']                  = 'Pegawai/SeminarController/update';
$route['pegawai/pelatihan/seminar/delete/(:any)']           = 'Pegawai/SeminarController/delete/$1';

$route['pegawai/pelatihan/workshop']                        = 'Pegawai/WorkshopController';
$route['pegawai/pelatihan/workshop/create']                 = 'Pegawai/WorkshopController/create';
$route['pegawai/pelatihan/workshop/store']                  = 'Pegawai/WorkshopController/store';
$route['pegawai/pelatihan/workshop/edit/(:any)']            = 'Pegawai/WorkshopController/edit/$1';
$route['pegawai/pelatihan/workshop/update']                 = 'Pegawai/WorkshopController/update';
$route['pegawai/pelatihan/workshop/delete/(:any)']          = 'Pegawai/WorkshopController/delete/$1';

$route['pegawai/pelatihan/kursus']                          = 'Pegawai/KursusController';
$route['pegawai/pelatihan/kursus/create']                   = 'Pegawai/KursusController/create';
$route['pegawai/pelatihan/kursus/store']                    = 'Pegawai/KursusController/store';
$route['pegawai/pelatihan/kursus/edit/(:any)']              = 'Pegawai/KursusController/edit/$1';
$route['pegawai/pelatihan/kursus/update']                   = 'Pegawai/KursusController/update';
$route['pegawai/pelatihan/kursus/delete/(:any)']            = 'Pegawai/KursusController/delete/$1';

$route['pegawai/pelatihan/pelatihan']                       = 'Pegawai/PelatihanController';
$route['pegawai/pelatihan/pelatihan/create']                = 'Pegawai/PelatihanController/create';
$route['pegawai/pelatihan/pelatihan/store']                 = 'Pegawai/PelatihanController/store';
$route['pegawai/pelatihan/pelatihan/edit/(:any)']           = 'Pegawai/PelatihanController/edit/$1';
$route['pegawai/pelatihan/pelatihan/update']                = 'Pegawai/PelatihanController/update';
$route['pegawai/pelatihan/pelatihan/delete/(:any)']         = 'Pegawai/PelatihanController/delete/$1';

$route['pegawai/pelatihan/lainnya']                         = 'Pegawai/LainnyaController';
$route['pegawai/pelatihan/lainnya/create']                  = 'Pegawai/LainnyaController/create';
$route['pegawai/pelatihan/lainnya/store']                   = 'Pegawai/LainnyaController/store';
$route['pegawai/pelatihan/lainnya/edit/(:any)']             = 'Pegawai/LainnyaController/edit/$1';
$route['pegawai/pelatihan/lainnya/update']                  = 'Pegawai/LainnyaController/update';
$route['pegawai/pelatihan/lainnya/delete/(:any)']           = 'Pegawai/LainnyaController/delete/$1';

// ------------------------------------------------------------------------
// Profile
// ------------------------------------------------------------------------
$route['profile/edit']                                      = 'ProfileController/edit';
$route['profile/update']                                    = 'ProfileController/update';
$route['profile/changepassword']                            = 'ProfileController/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
