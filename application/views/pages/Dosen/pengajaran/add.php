<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Data</h1>
        </div>
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    <?= $this->session->flashdata('error'); ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('dosen/tridharma/pengajaran/store') ?>" novalidate="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tahun Akademik<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_tahun" name="id_tahun">
                                        <option value="" selected disabled>-- Pilih Tahun Akademik --</option>
                                        <?php
                                        foreach ($tahun as $d) : ?>
                                            <option value=<?= $d->id ?>> <?= $d->tahun_akademik ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="matkul">Matakuliah<sup class="text-danger">*</sup></label>
                                    <input id="matkul" type="text" class="form-control" name="matkul" tabindex="1" placeholder="Masukkan Matakuliah" required>
                                    <div class="invalid-feedback">
                                        Masukkan Matakuliah terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sks">SKS<sup class="text-danger">*</sup></label>
                                    <input id="sks" type="number" class="form-control" name="sks" tabindex="1" placeholder="Masukkan SKS" required>
                                    <div class="invalid-feedback">
                                        Masukkan SKS terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sk">Surat Kerja <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sk" type="file" class="form-control" name="sk" required>
                                    <div class="invalid-feedback">
                                        Masukkan Surat Kerja terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>