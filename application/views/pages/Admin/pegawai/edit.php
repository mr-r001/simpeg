<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Pegawai</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <?php foreach ($admin as $data) : ?>
                        <form method="post" class="needs-validation" action="<?php echo site_url('admin/pegawai/update') ?>" novalidate="" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-8">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Data Pegawai</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="id">ID Pegawai <sup class="text-danger">*</sup></label>
                                                <input id="id" type="hidden" class="form-control" name="id" tabindex="1" value="<?= $data->id ?>">
                                                <input id="id_pegawai" type="text" class="form-control" name="id_pegawai" tabindex="1" value="<?= $data->id_pegawai ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="nip">NIP <sup class="text-danger">*</sup></label>
                                                <input id="nip" type="text" class="form-control" name="nip" tabindex="1" value="<?= $data->nip ?>" required autofocus>
                                                <div class="invalid-feedback">
                                                    Please fill in your name
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama <sup class="text-danger">*</sup></label>
                                                <input id="name" type="text" class="form-control" name="name" tabindex="1" value="<?= $data->nama ?>" required>
                                                <div class="invalid-feedback">
                                                    Please fill in your name
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan <sup class="text-danger">*</sup></label>
                                                <select class="form-control selectric" id="jabatan" name="jabatan">
                                                    <option value="" selected disabled>-- Pilih Jabatan --</option>
                                                    <?php
                                                    foreach ($jabatan as $d) : ?>
                                                        <option <?php if ($data->id_jabatan == $d->id_jabatan) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id_jabatan ?>> <?= $d->nama_jabatan ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Golongan <sup class="text-danger">*</sup></label>
                                                <select class="form-control selectric" id="golongan" name="golongan">
                                                    <option value="" selected disabled>-- Pilih Golongan --</option>
                                                    <?php
                                                    foreach ($golongan as $d) : ?>
                                                        <option <?php if ($data->id_golongan == $d->id_golongan) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id_golongan ?>> <?= $d->nama_golongan ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="control-label">Jenis Kelamin <sup class="text-danger">*</sup></div>
                                                <label class="custom-switch mt-2">
                                                    <span class="custom-switch-description">Laki-Laki &nbsp;</span>
                                                    <input type="checkbox" name="jk" value="1" class="custom-switch-input" <?php if ($data->jenis_kelamin == 'P') : echo 'checked'; ?><?php endif; ?>>
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description">Perempuan</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat <sup class="text-danger">*</sup></label>
                                                <textarea class="form-control" name="alamat" required=""><?= $data->alamat ?></textarea>
                                                <div class="invalid-feedback">
                                                    Please fill in your Address
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="telp">No Telepon <sup class="text-danger">*</sup></label>
                                                <input id="telp" type="number" class="form-control" name="telp" tabindex="1" value="<?= $data->no_hp ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukkan Nomor Telepon terlebih dahulu
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Perkawinan <sup class="text-danger">*</sup></label>
                                                <select class="form-control selectric" id="status_kawin" name="status_kawin">
                                                    <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
                                                    <option <?php if ($data->status_kawin == '0') : echo 'selected'; ?><?php endif; ?> value="0">Belum Kawin
                                                    </option>
                                                    <option <?php if ($data->status_kawin == '1') : echo 'selected'; ?><?php endif; ?> value="1">Kawin
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah">Jumlah Anak <sup class="text-danger">*</sup></label>
                                                <input id="jumlah" type="number" class="form-control" name="jumlah" tabindex="1" value="<?= $data->jumlah_anak ?>" readonly required>
                                            </div>
                                            <br><br><br><br><br><br>
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
                                                <input id="username" type="text" class="form-control" name="username" tabindex="1" value="<?= $data->username ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukkan username terlebih dahulu
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <sup class="text-danger">*</sup></label>
                                                <input id="password" type="password" class="form-control" name="password" tabindex="1" placeholder="Masukkan password">
                                                <small>Kosongkan jika tidak ingin dirubah</small>
                                            </div>
                                            <div class="form-group">
                                                <label>Hak Akses <sup class="text-danger">*</sup></label>
                                                <select class="form-control selectric" id="role" name="role">
                                                    <option value="" selected disabled>-- Pilih hak akses --</option>
                                                    <?php
                                                    foreach ($hak_akses as $d) : ?>
                                                        <option <?php if ($data->role == $d->id_role) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id_role ?>> <?= $d->role ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Foto</label>
                                                <input id="img" type="file" class="form-control" name="img" tabindex="1">
                                                <small>Kosongkan jika tidak ingin dirubah</small>
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
                                                <input id="bank" type="text" class="form-control" name="bank" tabindex="1" value="<?= $data->bank ?>" required>
                                                <div class="invalid-feedback">
                                                    Masukkan nama Bank terlebih dahulu
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="norek">No Rekening <sup class="text-danger">*</sup></label>
                                                <input id="norek" type="text" class="form-control" name="norek" tabindex="1" value="<?= $data->no_rekening ?>" required>
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
                                                    <?php for ($i = 0; $i < count($tunjangan); $i++) { ?>
                                                        <option value=<?= $tunjangan[$i]->id_tunjangan ?> <?php if ($tunjangan_pegawai !== NULL) {
                                                                                                                for ($j = 0; $j < count($tunjangan_pegawai); $j++) {
                                                                                                                    echo $tunjangan[$i]->id_tunjangan == $tunjangan_pegawai[$j]->id_tunjangan ? 'selected' : '';
                                                                                                                }
                                                                                                            } ?>> <?= $tunjangan[$i]->nama_tunjangan ?>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Potongan</label>
                                                <select class="form-control select2" multiple id="potongan" name="potongan[]">
                                                    <?php
                                                    for ($i = 0; $i < count($potongan); $i++) { ?>
                                                        <option value=<?= $potongan[$i]->id_potongan ?> <?php if ($potongan_pegawai !== NULL) {
                                                                                                            for ($j = 0; $j < count($potongan_pegawai); $j++) {
                                                                                                                echo $potongan[$i]->id_potongan == $potongan_pegawai[$j]->id_potongan ? 'selected' : '';
                                                                                                            }
                                                                                                        } ?>> <?= $potongan[$i]->nama_potongan ?>
                                                        <?php } ?>
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
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>