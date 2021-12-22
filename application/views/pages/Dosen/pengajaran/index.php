<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Pengajaran</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Pengajaran</div>
			</div>
		</div>
		<?php if ($this->session->flashdata('success')) { ?>
			<div class="alert alert-primary alert-dismissible show fade">
				<div class="alert-body">
					<button class="close" data-dismiss="alert">
						<span>×</span>
					</button>
					<?= $this->session->flashdata('success'); ?>
				</div>
			</div>
		<?php } ?>
		<div class="section-body">
			<a href="<?= base_url('dosen/tridharma/pengajaran/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
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
											<th>Tahun Akademik</th>
											<th>Matakuliah</th>
											<th>SKS</th>
											<th>SK</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($pengajaran as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->tahun_akademik ?></td>
												<td><?= $data->matkul ?></td>
												<td><?= $data->sks ?></td>
												<td>
													<a href="<?= base_url('assets/img/dosen/sk_pengajaran/') . $data->sk ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?php echo base_url('dosen/tridharma/pengajaran/edit/') . $data->id ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
													<a href="<?php echo base_url('dosen/tridharma/pengajaran/delete/') . $data->id ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
												</td>
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