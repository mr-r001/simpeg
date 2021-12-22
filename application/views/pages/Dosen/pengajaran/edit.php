<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($pengajaran as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('dosen/tridharma/pengajaran/update') ?>" novalidate="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <div class="form-group">
                                        <label>Tahun Akademik<sup class="text-danger">*</sup></label>
                                        <select class="form-control selectric" id="id_tahun" name="id_tahun">
                                            <option value="" selected disabled>-- Pilih Tahun Akademik --</option>
                                            <?php
                                            foreach ($tahun as $d) : ?>
                                                <option <?php if ($data->id_tahun == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->tahun_akademik ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Tahun Akademik terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="matkul">Mata Kuliah<sup class="text-danger">*</sup></label>
                                        <input id="matkul" type="text" class="form-control" name="matkul" tabindex="1" value="<?= $data->matkul ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Mata Kuliah terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sks">SKS<sup class="text-danger">*</sup></label>
                                        <input id="sks" type="number" class="form-control" name="sks" tabindex="1" value="<?= $data->sks ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan SKS terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="sk">Surat Kerja <sup class="text-danger">Max 2Mb</sup></label>
                                        <input id="sk" type="file" class="form-control" name="sk">
                                        <small>*)Kosongkan jika tidak ingin dirubah</small>
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
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>