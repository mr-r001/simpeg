<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Absensi</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('pimpinan/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Absensi</div>
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
											<th>Tanggal</th>
											<th>NIP</th>
											<th>Nama Pegawai</th>
											<th>Hadir</th>
											<th>Sakit</th>
											<th>Ijin</th>
											<th>Tanpa Keterangan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->tanggal ?></td>
												<td><?= $data->nip ?></td>
												<td><?= $data->nama ?></td>
												<td><?= $data->hadir ?></td>
												<td><?= $data->sakit ?></td>
												<td><?= $data->ijin ?></td>
												<td><?= $data->tanpa_keterangan ?></td>
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