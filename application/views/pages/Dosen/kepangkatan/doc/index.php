<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Doc Kepangkatan</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
				<div class="breadcrumb-item">Doc Kepangkatan</div>
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
			<?php
			if (count($kepangkatan) <= 0) { ?>
				<a href="<?= base_url('dosen/kepangkatan/doc/create') ?>" class="btn btn-primary btn-s"><i class="fa fa-plus"></i> Tambah Data</a>
			<?php } ?>
			<br><br>
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
											<th>SK CPNS</th>
											<th>SK PNS</th>
											<th>SK P3K/Kontrak</th>
											<th>Karpeg</th>
											<th>Sertifikat Serdos</th>
											<th>SK Jabatan Fungsional</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($kepangkatan as $data) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td>
													<a href="<?= base_url('assets/img/dosen/sk_cpns/') . $data->sk_cpns ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?= base_url('assets/img/dosen/sk_pns/') . $data->sk_pns ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?= base_url('assets/img/dosen/sk_kontrak/') . $data->sk_kontrak ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?= base_url('assets/img/dosen/karpeg/') . $data->karpeg ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?= base_url('assets/img/dosen/sertifikat/') . $data->sertifikat ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?= base_url('assets/img/dosen/sk_jabatan/') . $data->sk_jabatan ?>" download class="btn btn-primary">Download</a>
												</td>
												<td>
													<a href="<?php echo base_url('dosen/kepangkatan/doc/delete/') . $data->id ?>" class="btn btn-danger" onclick="javascript: return confirm('Are you sure want to Delete ?')" title="Delete"><i class="fa fa-trash"></i></a>
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