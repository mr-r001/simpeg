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
					<a class="nav-link" href="<?= base_url('pimpinan/dashboard') ?>">
						<i class="fas fa-fire"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="menu-header">Data Absensi</li>
				<li class="<?= $this->uri->segment(2) == 'absensi'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('pimpinan/absensi') ?>">
						<i class="fas fa-clock"></i>
						<span>Data Absensi</span>
					</a>
				</li>
				<li class="menu-header">Penggajian</li>
				<li class="<?= $this->uri->segment(2) == 'slip'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('pimpinan/slip') ?>">
						<i class="fas fa-calculator"></i>
						<span>Slip Gaji</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'laporan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('pimpinan/laporan') ?>">
						<i class="fas fa-file"></i>
						<span>Laporan</span>
					</a>
				</li>

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