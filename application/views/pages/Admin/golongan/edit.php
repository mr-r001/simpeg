<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Golongan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data Golongan</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($admin as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/golongan/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="id">ID Golongan <sup class="text-danger">*</sup></label>
                                        <input type="hidden" name="id" value="<?= $data->id ?>">
                                        <input id="id_golongan" type="text" class="form-control" name="id_golongan" tabindex="1" value="<?= $data->id_golongan ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Golongan <sup class="text-danger">*</sup></label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" value="<?= $data->nama_golongan ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan nama golongan terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="golongan">Tunjangan Golongan <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="golongan" type="number" name="golongan" tabindex="1" value="<?= $data->tunjangan_golongan ?>" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in nominal
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasutri">Tunjangan Suami Istri <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                            <input id="pasutri" type="text" name="pasutri" tabindex="1" value="<?= $data->tunjangan_pasutri ?>" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in nominal
                                            </div>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    %
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="anak">Tunjangan Anak <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                            <input id="anak" type="text" name="anak" tabindex="1" value="<?= $data->tunjangan_anak ?>" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in nominal
                                            </div>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    %
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Tunjangan Jabatan <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="jabatan" type="number" name="jabatan" tabindex="1" value="<?= $data->tunjangan_jabatan ?>" class="form-control currency" required>
                                            <div class="invalid-feedback">
                                                Please fill in nominal
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="makan">Tunjangan Makan <sup class="text-danger">*</sup></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    Rp
                                                </div>
                                            </div>
                                            <input id="makan" type="number" name="makan" tabindex="1" value="<?= $data->tunjangan_makan ?>" class="form-control currency" required>
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