<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pegawai</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <form method="post" class="needs-validation" action="<?php echo site_url('admin/pegawai/store') ?>" novalidate="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Pegawai</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="id">ID Pegawai <sup class="text-danger">*</sup></label>
                                            <input id="id" type="text" class="form-control" name="id" tabindex="1" value="<?= $newCode ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP <sup class="text-danger">*</sup></label>
                                            <input id="nip" type="text" class="form-control" name="nip" tabindex="1" placeholder="Masukkan NIP anda" required autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in your name
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nama <sup class="text-danger">*</sup></label>
                                            <input id="name" type="text" class="form-control" name="name" tabindex="1" placeholder="Masukkan nama anda" required autofocus>
                                            <div class="invalid-feedback">
                                                Please fill in your name
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan <sup class="text-danger">*</sup></label>
                                            <select class="form-control selectric" id="jabatan" name="jabatan">
                                                <option value="" selected disabled>-- Pilih Jabatan --</option>
                                                <?php
                                                foreach ($jabatan as $data) : ?>
                                                    <option value="<?= $data->id_jabatan ?>"><?= $data->nama_jabatan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Golongan <sup class="text-danger">*</sup></label>
                                            <select class="form-control selectric" id="golongan" name="golongan">
                                                <option value="" selected disabled>-- Pilih Golongan --</option>
                                                <?php
                                                foreach ($golongan as $data) : ?>
                                                    <option value="<?= $data->id_golongan ?>"><?= $data->nama_golongan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="control-label">Jenis Kelamin <sup class="text-danger">*</sup></div>
                                            <label class="custom-switch mt-2">
                                                <span class="custom-switch-description">Laki-Laki &nbsp;</span>
                                                <input type="checkbox" name="jk" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Perempuan</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                                            <textarea class="form-control" name="alamat" required=""></textarea>
                                            <div class="invalid-feedback">
                                                Please fill in your Address
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telp">No Telepon <sup class="text-danger">*</sup></label>
                                            <input id="telp" type="number" class="form-control" name="telp" tabindex="1" placeholder="Masukakan Nomor Telepon Anda" required>
                                            <div class="invalid-feedback">
                                                Masukkan Nomor Telepon terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Perkawinan <sup class="text-danger">*</sup></label>
                                            <select class="form-control selectric" id="status_kawin" name="status_kawin">
                                                <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
                                                <option value="0">Belum Kawin</option>
                                                <option value="1">Kawin</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah">Jumlah Anak <sup class="text-danger">*</sup></label>
                                            <input id="jumlah" type="number" class="form-control" name="jumlah" tabindex="1" value="0" readonly required>
                                        </div>
                                        <br><br><br><br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Akun</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="username">Username <sup class="text-danger">*</sup></label>
                                            <input id="username" type="text" class="form-control" name="username" tabindex="1" placeholder="Masukkan username" required>
                                            <div class="invalid-feedback">
                                                Masukkan username terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password <sup class="text-danger">*</sup></label>
                                            <input id="password" type="password" class="form-control" name="password" tabindex="1" placeholder="Masukkan password" required>
                                            <div class="invalid-feedback">
                                                Masukkan password terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Hak Akses <sup class="text-danger">*</sup></label>
                                            <select class="form-control selectric" id="role" name="role">
                                                <option value="" selected disabled>-- Pilih hak akses --</option>
                                                <?php
                                                foreach ($hak_akses as $data) : ?>
                                                    <option value="<?= $data->id_role ?>"><?= $data->role ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="img">Foto</label>
                                            <input id="img" type="file" class="form-control" name="img" tabindex="1">
                                            <div class="invalid-feedback">
                                                Please choose your Photo
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Bank</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="bank">Bank <sup class="text-danger">*</sup></label>
                                            <input id="bank" type="text" class="form-control" name="bank" tabindex="1" placeholder="Masukkan nama Bank" required>
                                            <div class="invalid-feedback">
                                                Masukkan nama Bank terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="norek">No Rekening <sup class="text-danger">*</sup></label>
                                            <input id="norek" type="text" class="form-control" name="norek" tabindex="1" placeholder="Masukkan Nomor Rekening" required>
                                            <div class="invalid-feedback">
                                                Masukkan nomor rekening terlebih dahulu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Tunjangan dan Potongan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Tunjangan lain</label>
                                            <select class="form-control select2" multiple id="tunjangan" name="tunjangan[]">
                                                <?php
                                                foreach ($tunjangan as $data) : ?>
                                                    <option value="<?= $data->id_tunjangan ?>"><?= $data->nama_tunjangan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Potongan</label>
                                            <select class="form-control select2" multiple id="potongan" name="potongan[]">
                                                <?php
                                                foreach ($potongan as $data) : ?>
                                                    <option value="<?= $data->id_potongan ?>"><?= $data->nama_potongan ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>