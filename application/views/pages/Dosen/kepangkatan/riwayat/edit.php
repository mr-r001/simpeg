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
                            <?php foreach ($riwayat as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('dosen/kepangkatan/riwayat/update') ?>" novalidate="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <div class="form-group">
                                        <label for="nama_jabatan">Nama Jabatan Struktural<sup class="text-danger">*</sup></label>
                                        <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" tabindex="1" value="<?= $data->nama_jabatan ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Jabatan Struktural terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="periode">Periode<sup class="text-danger">*</sup></label>
                                        <input id="periode" type="number" class="form-control" name="periode" tabindex="1" value="<?= $data->periode ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Periode terlebih dahulu
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