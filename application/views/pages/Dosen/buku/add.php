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
                            <form method="post" class="needs-validation" action="<?php echo site_url('dosen/tridharma/buku/store') ?>" novalidate="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="judul">Judul<sup class="text-danger">*</sup></label>
                                    <input id="judul" type="text" class="form-control" name="judul" tabindex="1" placeholder="Masukkan Judul" required>
                                    <div class="invalid-feedback">
                                        Masukkan Judul terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISSN/ISBN<sup class="text-danger">*</sup></label>
                                    <input id="isbn" type="text" class="form-control" name="isbn" tabindex="1" placeholder="Masukkan ISSN/ISBN" required>
                                    <div class="invalid-feedback">
                                        Masukkan ISSN/ISBN terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit<sup class="text-danger">*</sup></label>
                                    <input id="penerbit" type="text" class="form-control" name="penerbit" tabindex="1" placeholder="Masukkan Penerbit" required>
                                    <div class="invalid-feedback">
                                        Masukkan Penerbit terlebih dahulu
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
                                    <label for="tahun">Tahun<sup class="text-danger">*</sup></label>
                                    <input id="tahun" type="number" class="form-control" name="tahun" tabindex="1" placeholder="Masukkan Tahun" required>
                                    <div class="invalid-feedback">
                                        Masukkan Tahun terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cover">Cover Buku <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="cover" type="file" class="form-control" name="cover" required>
                                    <small>*)Hanya jpg dan png</small>
                                    <div class="invalid-feedback">
                                        Masukkan Cover Buku terlebih dahulu
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