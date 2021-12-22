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
                            <form method="post" class="needs-validation" action="<?php echo site_url('dosen/tridharma/penelitian/store') ?>" novalidate="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="jenis">Jenis Penelitian<sup class="text-danger">*</sup></label>
                                    <input id="jenis" type="text" class="form-control" name="jenis" tabindex="1" placeholder="Masukkan Jenis Penelitian" required>
                                    <div class="invalid-feedback">
                                        Masukkan Jenis Penelitian terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tingkatan<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_tingkatan" name="id_tingkatan">
                                        <option value="" selected disabled>-- Pilih Tingkatan --</option>
                                        <?php
                                        foreach ($tingkatan as $d) : ?>
                                            <option value=<?= $d->id ?>> <?= $d->tingkatan ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Penelitian<sup class="text-danger">*</sup></label>
                                    <input id="judul" type="text" class="form-control" name="judul" tabindex="1" placeholder="Masukkan Judul Penelitian" required>
                                    <div class="invalid-feedback">
                                        Masukkan Judul Penelitian terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun<sup class="text-danger">*</sup></label>
                                    <input id="tahun" type="number" class="form-control" name="tahun" tabindex="1" placeholder="Masukkan Tahun" required>
                                    <div class="invalid-feedback">
                                        Masukkan Tahun terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="publikasi">Publikasi<sup class="text-danger">*</sup></label>
                                    <input id="publikasi" type="text" class="form-control" name="publikasi" tabindex="1" placeholder="Masukkan Publikasi" required>
                                    <div class="invalid-feedback">
                                        Masukkan Publikasi terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="doc">Docoument Penelitian <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="doc" type="file" class="form-control" name="doc" required>
                                    <div class="invalid-feedback">
                                        Masukkan Docoument Penelitian terlebih dahulu
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