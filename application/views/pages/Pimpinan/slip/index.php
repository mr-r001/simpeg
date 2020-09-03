<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Slip Gaji</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Slip Gaji</div>
			</div>
		</div>
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="example">
									<thead>
										<tr>
											<th class="text-center">
												#
											</th>
											<th>Tanggal Pembuatan</th>
											<th>Periode Gaji</th>
											<th>NIP</th>
											<th>Nama</th>
											<th>Gaji Bersih</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) :
											$originalDate = $data->tanggal;
											$newDate1 = date("d M Y", strtotime($originalDate)); ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $newDate1 ?></td>
												<td><?= $data->bulan . ' / ' . $data->tahun ?></td>
												<td><?= $data->nip ?></td>
												<td><?= $data->nama ?></td>
												<td>Rp. <?= rupiah($data->gaji_bersih) ?></td>
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