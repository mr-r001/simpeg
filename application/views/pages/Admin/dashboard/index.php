<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="fas fa-users"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Pegawai</h4>
						</div>
						<div class="card-body">
							<?= $pegawai ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-user-tag"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Jabatan</h4>
						</div>
						<div class="card-body">
							<?= $jabatan ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-user-clock"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Absensi</h4>
						</div>
						<div class="card-body">
							<?= $absensi ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-address-card"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Laporan</h4>
						</div>
						<div class="card-body">
							<?= $laporan ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4>Gaji 6 bulan terakhir</h4>
					</div>
					<div class="card-body p-0">
						<div class="table-responsive table-invoice">
							<table class="table table-striped">
								<thead>
									<tr>
										<th class="text-center">
											#
										</th>
										<th>Periode Gaji</th>
										<th>Total Slip Gaji</th>
										<th>Total Gaji Bersih</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$no = 1;
									foreach ($periode as $data) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $data->bulan . ' / ' . $data->tahun ?></td>
											<td><?= $data->jumlah_karyawan ?></td>
											<td>Rp. <?= rupiah($data->total) ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>