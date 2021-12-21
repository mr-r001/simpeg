<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pribadi / Umum </h1>
        </div>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-primary alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    <?= $this->session->flashdata('success'); ?>
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
                            <?php foreach ($personal as $data) : ?>
                                <?= form_open_multipart('dosen/personal/update'); ?>
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <div class="form-group">
                                    <label for="nik">NIK<sup class="text-danger">*</sup></label>
                                    <input id="nik" type="text" class="form-control" name="nik" tabindex="1" placeholder="Masukkan nik anda" value="<?= $data->nik ?>" required autofocus>
                                    <div class="invalid-feedback">
                                        Masukkan NIK terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama<sup class="text-danger">*</sup></label>
                                    <input id="name" type="text" class="form-control" name="name" tabindex="1" placeholder="Masukkan Nama Anda" value="<?= $data->nama ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan Nama terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat<sup class="text-danger">*</sup></label>
                                    <input id="address" type="text" class="form-control" name="address" tabindex="1" placeholder="Masukkan Alamat Anda" value="<?= $data->alamat ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan Alamat terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                                        <option <?php if ($data->jenis_kelamin == 'L') : echo 'selected'; ?><?php endif; ?> value="L">Laki-Laki</option>
                                        <option <?php if ($data->jenis_kelamin == 'P') : echo 'selected'; ?><?php endif; ?> value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal Lahir<sup class="text-danger">*</sup></label>
                                    <input id="tgl" type="date" class="form-control" name="tgl" value="<?= $data->tgl_lahir ?>" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan tanggal lahir terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Agama<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="agama" name="agama">
                                        <option value="" selected disabled>-- Pilih Agama --</option>
                                        <option <?php if ($data->agama == 'Islam') : echo 'selected'; ?><?php endif; ?> value="Islam">Islam</option>
                                        <option <?php if ($data->agama == 'Kristen') : echo 'selected'; ?><?php endif; ?> value="Kristen">Kristen</option>
                                        <option <?php if ($data->agama == 'Katolik') : echo 'selected'; ?><?php endif; ?> value="Katolik">Katolik</option>
                                        <option <?php if ($data->agama == 'Hindu') : echo 'selected'; ?><?php endif; ?> value="Hindu">Hindu</option>
                                        <option <?php if ($data->agama == 'Buddha') : echo 'selected'; ?><?php endif; ?> value="Buddha">Buddha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="phone">No Handphone<sup class="text-danger">*</sup></label>
                                    <input id="phone" type="text" class="form-control" name="phone" tabindex="1" placeholder="Masukkan No Handphone Anda" value="<?= $data->no_hp ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan No Handphone terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email<sup class="text-danger">*</sup></label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="Masukkan Email Anda" value="<?= $data->email ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan Email terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email_institusi">Email Institusi<sup class="text-danger">*</sup></label>
                                    <input id="email_institusi" type="email" class="form-control" name="email_institusi" tabindex="1" placeholder="Masukkan Email Institusi Anda" value="<?= $data->email_institusi ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan Email Institusi terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_pendidikan" name="id_pendidikan">
                                        <option value="" selected disabled>-- Pilih Pendidikan Terakhir --</option>
                                        <?php
                                        foreach ($pendidikan as $d) : ?>
                                            <option <?php if ($data->id_pendidikan == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->jenjang_pendidikan ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_fakultas" name="id_fakultas">
                                        <option value="" selected disabled>-- Pilih Fakultas --</option>
                                        <?php
                                        foreach ($fakultas as $d) : ?>
                                            <option <?php if ($data->id_fakultas == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Program Studi<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_prodi" name="id_prodi">
                                        <option value="" selected disabled>-- Pilih Program Studi --</option>
                                        <?php
                                        foreach ($prodi as $d) : ?>
                                            <option <?php if ($data->id_prodi == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->nama_prodi ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Dosen<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_dosen" name="id_dosen">
                                        <option value="" selected disabled>-- Pilih Status Dosen --</option>
                                        <?php
                                        foreach ($status as $d) : ?>
                                            <option <?php if ($data->id_dosen == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->status_dosen ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Dosen Sesuai Bidang Keahlian<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_dosen_skills" name="id_dosen_skills">
                                        <option value="" selected disabled>-- Pilih Status Dosen Sesuai Bidang Keahlian --</option>
                                        <?php
                                        foreach ($sesuai as $d) : ?>
                                            <option <?php if ($data->id_dosen_skills == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->status ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Foto <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="photo" type="file" class="form-control" name="photo">
                                    <img alt="image" src="<?php echo base_url('assets/img/avatar/') . $data->foto ?>" width="100" height="100" class="mt-2">
                                    <div class="invalid-feedback">
                                        Masukkan Foto terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Simpan
                                    </button>
                                </div>
                                <?= form_close() ?>
                                <!-- </form> -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>