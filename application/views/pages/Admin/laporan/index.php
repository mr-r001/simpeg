<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Penggajian</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Laporan Penggajian</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 mr-5">
				<h5>Periode : <?= $bulan ?>/<?= $tahun ?></h5>
			</div>
			<div class="col-lg-8">
				<?php
				if (count($admin) > 0) { ?>
					<form method="post" class="needs-validation" action="<?php echo site_url('admin/laporan/print') ?>" novalidate="" target="_blank">
						<div class="row">
							<div class="form-group" style="margin-left:-20px">
								<input type="hidden" value="<?= $bulan ?>" name="bulan">
							</div>
							<div class="form-group" style="margin-left:-20px">
								<input type="hidden" value="<?= $tahun ?>" name="tahun">
							</div>
							<div class="form-group" style="margin-left:-20px">
								<button type="submit" class="btn btn-success" tabindex="4">
									<i class="fa fa-print"></i>
									Print Laporan
								</button>
							</div>
						</div>
					</form>
				<?php } ?>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="laporan">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Periode Gaji</th>
											<th>Nama</th>
											<th>Gaji Pokok</th>
											<th>Tunjangan</th>
											<th>Potongan</th>
											<th>Gaji Bersih</th>
											<th>Potongan Absensi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->bulan . ' / ' . $data->tahun ?></td>
												<td><?= $data->nama ?></td>
												<td>Rp. <?= rupiah($data->gaji_pokok) ?></td>
												<td>Rp. <?= rupiah($data->tunjangan + $data->golongan) ?></td>
												<td>Rp. <?= rupiah($data->potongan) ?></td>
												<td>Rp. <?= rupiah($data->gaji_bersih) ?></td>
												<td>Rp. <?= rupiah($data->potongan_absen) ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>