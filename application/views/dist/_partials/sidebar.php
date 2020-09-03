<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?php echo base_url(); ?>">SI Penggajian</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="<?php echo base_url(); ?>">SIP</a>
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
				<li class="<?= $this->uri->segment(2) == 'pegawai' ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/pegawai') ?>">
						<i class="fas fa-user"></i>
						<span>Data Pegawai</span>
					</a>
				</li>
				<li class="menu-header">Data Pendukung</li>
				<li class="<?= $this->uri->segment(2) == 'jabatan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/jabatan') ?>">
						<i class="fas fa-user"></i>
						<span>Data Jabatan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'golongan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/golongan') ?>">
						<i class="fas fa-users"></i>
						<span>Data Golongan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'potongan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/potongan') ?>">
						<i class="fas fa-percent"></i>
						<span>Data Potongan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'tunjangan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/tunjangan') ?>">
						<i class="fas fa-money-bill"></i>
						<span>Data Tunjangan</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'absensi'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/absensi') ?>">
						<i class="fas fa-clock"></i>
						<span>Data Absensi</span>
					</a>
				</li>
				<li class="menu-header">Penggajian</li>
				<li class="<?= $this->uri->segment(2) == 'slip'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/slip') ?>">
						<i class="fas fa-calculator"></i>
						<span>Slip Gaji</span>
					</a>
				</li>
				<li class="<?= $this->uri->segment(2) == 'laporan'  ? 'active' : ''; ?>">
					<a class="nav-link" href="<?= base_url('admin/laporan/find') ?>">
						<i class="fas fa-file"></i>
						<span>Laporan Penggajian</span>
					</a>
				</li>
				
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