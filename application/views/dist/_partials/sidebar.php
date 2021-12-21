<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?php echo base_url(); ?>">SIMPEG</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?php echo base_url(); ?>">SIMPEG</a>
		</div>
		<?php if ($this->session->userdata('role') === '1') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'user-dosen' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/user-dosen') ?>">
						<i class="fas fa-users"></i>
						<span>Manage User Dosen</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'user-pegawai'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/user-pegawai') ?>">
						<i class="fas fa-users"></i>
						<span>Manage User Pegawai</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'user-operator'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/user-operator') ?>">
						<i class="fas fa-users"></i>
						<span>Manage User Operator</span>
					</a>
				</li>
				<!-- List -->
				<li class="menu-header">Data Pendukung</li>
				<li class="<?= $this->uri->segment(2) == 'fakultas'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/fakultas') ?>">
						<i class="fas fa-chalkboard-teacher"></i>
						<span>Fakultas</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'prodi'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/prodi') ?>">
						<i class="fas fa-book-reader"></i>
						<span>Program Studi</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'tingkatan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/tingkatan') ?>">
						<i class="fas fa-graduation-cap"></i>
						<span>Tingkatan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'jenjang_pendidikan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/jenjang_pendidikan') ?>">
						<i class="fas fa-university"></i>
						<span>Jenjang Pendidikan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'tahun_akademik'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/tahun_akademik') ?>">
						<i class="fas fa-calendar-alt"></i>
						<span>Tahun Akademik</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'kepanitiaan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/kepanitiaan') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Status Kepanitian</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'pemateri'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/pemateri') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Status Pemateri</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'team'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/team') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Status Didalam tim</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'dosen'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/dosen') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Status Dosen</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'skills'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/skills') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Status Dosen sesuai bidang keahlian</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'pegawai'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/pegawai') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Status Pegawai</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'haki'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/haki') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Kategori HAKI</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'kategori'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/kategori') ?>">
						<i class="fas fa-user-cog"></i>
						<span>Kategori Pegawai</span>
					</a>
				</li>
				<br><br><br>
			</ul>
		<?php } ?>
		<?php if ($this->session->userdata('role') === '2') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('dosen/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li class="menu-header">Data Master</li>
				<li class="<?= $this->uri->segment(2) == 'account' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('dosen/account') ?>">
						<i class="fas fa-user"></i>
						<span>Data Akun</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'personal' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('dosen/personal') ?>">
						<i class="fas fa-user"></i>
						<span>Data Pribadi</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('dosen/dashboard') ?>">
						<i class="fas fa-user"></i>
						<span>Data Pendidikan</span>
					</a>
				</li>
				<!-- <li class="dropdown">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Kepangkatan</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="#">Data Kepangkatan</a></li>
						<li><a class="nav-link" href="#">Data Kepangkatan</a></li>
						<li><a class="nav-link" href="#">Riwayat Struktural</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Tridharma</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="#">Data Pengajaran</a></li>
						<li class="dropdown">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown">Data Penelitian</a>
							<ul class="dropdown-menu">
								<li><a class="nav-link" href="#">Penelitian</a></li>
								<li><a class="nav-link" href="#">Buku/Modul</a></li>
								<li><a class="nav-link" href="#">HAKI</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown">Data Pengabdian</a>
							<ul class="dropdown-menu">
								<li><a class="nav-link" href="#">Kegiatan Pengabdian</a></li>
								<li><a class="nav-link" href="#">Pemateri/Narasumber</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Penunjang</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="#">Panitia Kegiatan</a></li>
						<li><a class="nav-link" href="#">Organisasi Profesi</a></li>
						<li><a class="nav-link" href="#">Organisasi Non Profesi</a></li>
					</ul>
				</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('dosen/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Data Penghargaan</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data Pelatihan</span></a>
					<ul class="dropdown-menu">
						<li><a class="nav-link" href="#">Seminar</a></li>
						<li><a class="nav-link" href="#">Workshop</a></li>
						<li><a class="nav-link" href="#">Kursus></li>
						<li><a class="nav-link" href="#">Pelatihan></li>
						<li><a class="nav-link" href="#">Lainnya></li>
					</ul>
				</li> -->
			</ul>
		<?php } ?>
		<?php if ($this->session->userdata('role') === '3') {  ?>
			<ul class="sidebar-menu">
				<li class="menu-header">Dashboard</li>
				<li class="<?= $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('pegawai/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Dashboard</span>
					</a>
				</li>

			</ul>
		<?php } ?>
	</aside>
</div>