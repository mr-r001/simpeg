<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Pegawai</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Data Pegawai</div>
			</div>
		</div>
		<div class="section-body">
			<a href="<?= base_url('admin/pegawai/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
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
											<th>ID Pegawai</th>
											<th>NIP</th>
											<th>Nama Pegawai</th>
											<th>Username</th>
											<th>Hak Akses</th>
											<th>Foto Profil</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($admin as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $data->id_pegawai ?></td>
												<td><?= $data->nip ?></td>
												<td><?= $data->nama ?></td>
												<td><?= $data->username ?></td>
												<td><?= $data->role ?></td>
												<td><img src="<?= base_url('assets/img/avatar/') . $data->img ?>" alt="" style="width: 50px; border-radius: 50%"></td>
												<td>
													<a href="<?php echo base_url('admin/pegawai/edit/') . $data->id ?>" class="btn btn-success" title="Edit"><i class="fa fa-edit"></i> </a>
													<?php if ($data->id_pegawai == 'PE01') { ?>

													<?php } else { ?>
														<a href="<?php echo base_url('admin/pegawai/delete/') . $data->id ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
													<?php } ?>
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