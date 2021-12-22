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
                            <?php foreach ($pemateri as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('dosen/tridharma/pemateri/update') ?>" novalidate="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <div class="form-group">
                                        <label for="judul">Judul Kegiatan<sup class="text-danger">*</sup></label>
                                        <input id="judul" type="text" class="form-control" name="judul" tabindex="1" value="<?= $data->judul ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Judul Kegiatan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="penyelenggara">Penyelenggara<sup class="text-danger">*</sup></label>
                                        <input id="penyelenggara" type="text" class="form-control" name="penyelenggara" tabindex="1" value="<?= $data->penyelenggara ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Penyelenggara terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Pemateri<sup class="text-danger">*</sup></label>
                                        <select class="form-control selectric" id="id_pemateri" name="id_pemateri">
                                            <option value="" selected disabled>-- Pilih Status Pemateri --</option>
                                            <?php
                                            foreach ($status as $d) : ?>
                                                <option <?php if ($data->id_pemateri == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->pemateri ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih Tingkatan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun<sup class="text-danger">*</sup></label>
                                        <input id="tahun" type="number" class="form-control" name="tahun" tabindex="1" value="<?= $data->tahun ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Tahun terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="doc">Document <sup class="text-danger">Max 2Mb</sup></label>
                                        <input id="doc" type="file" class="form-control" name="doc">
                                        <small>*)Kosongkan jika tidak ingin dirubah</small>
                                        <div class="invalid-feedback">
                                            Masukkan Document terlebih dahulu
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