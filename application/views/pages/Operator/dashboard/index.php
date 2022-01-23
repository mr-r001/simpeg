<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger" style="display: flex; justify-content: center; align-items: center;">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Jumlah Dosen Program Studi <?= $prodi ?></h4>
						</div>
						<div class="card-body">
							<?= $dosen ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning" style="display: flex; justify-content: center; align-items: center;">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Jumlah Pegawai Program Studi <?= $prodi ?></h4>
						</div>
						<div class="card-body">
							<?= $pegawai ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<?php $this->load->view('dist/_partials/footer'); ?>