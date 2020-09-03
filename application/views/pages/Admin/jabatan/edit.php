<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Jabatan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data Jabatan</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($admin as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/jabatan/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="id">ID Jabatan <sup class="text-danger">*</sup></label>
                                        <input type="hidden" name="id" value="<?= $data->id ?>">
                                        <input id="id_jabatan" type="text" class="form-control" name="id_jabatan" tabindex="1" value="<?= $data->id_jabatan ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Jabatan <sup class="text-danger">*</sup></label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" value="<?= $data->nama_jabatan ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan nama jabatan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="gaji">Gaji Pokok <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="gaji" type="number" name="gaji" tabindex="1" class="form-control currency" value="<?= $data->gaji_pokok ?>" required>
                                            <div class="invalid-feedback">
                                                Please fill in nominal
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>