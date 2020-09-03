<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Slip Gaji</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <form method="post" class="needs-validation" action="<?php echo site_url('admin/slip/store') ?>" novalidate="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Gaji</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="id">ID Pegawai <sup class="text-danger">*</sup></label>
                                            <input id="id" type="text" class="form-control" name="id" tabindex="1" value="<?= $newCode ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan/Tahun <sup class="text-danger">*</sup></label>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <select class="form-control selectric" id="_bulan" name="_bulan">
                                                        <option value="" selected disabled>-- Pilih bulan --</option>
                                                        <option value="Januari">Januari</option>
                                                        <option value="Februari">Februari</option>
                                                        <option value="Maret">Maret</option>
                                                        <option value="April">April</option>
                                                        <option value="Mei">Mei</option>
                                                        <option value="Juni">Juni</option>
                                                        <option value="Juli">Juli</option>
                                                        <option value="Agustus">Agustus</option>
                                                        <option value="September">September</option>
                                                        <option value="Oktober">Oktober</option>
                                                        <option value="November">November</option>
                                                        <option value="Desember">Desember</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-6">
                                                    <select class="form-control selectric" id="_tahun" name="_tahun">
                                                        <option value="" selected disabled>-- Pilih tahun --</option>
                                                        <?php
                                                        $thn_skr = date('Y');
                                                        for ($x = $thn_skr; $x >= 2000; $x--) {
                                                        ?>
                                                            <option value="<?= $x ?>"><?= $x ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP <sup class="text-danger">*</sup></label>
                                            <select class="form-control select2" id="nip" name="nip">
                                                <option value="" selected disabled>-- Pilih NIP --</option>
                                                <?php
                                                foreach ($pegawai as $data) : ?>
                                                    <option value="<?= $data->id_pegawai ?>"><?= $data->nip ?> [ <?= $data->nama ?> ]</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan <sup class="text-danger">*</sup></label>
                                            <input id="jabatan" type="text" class="form-control" name="jabatan" tabindex="1" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="gaji_pokok">Gaji Pokok <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="gaji_pokok" type="text" name="gaji_pokok" tabindex="1" class="form-control currency" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="golongan">Total Tunjangan Golongan <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="golongan" type="text" name="golongan" tabindex="1" class="form-control currency" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tunjangan">Total Tunjangan Lain <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="tunjangan" type="text" name="tunjangan" tabindex="1" class="form-control currency" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="potongan">Total Potongan <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="potongan" type="text" name="potongan" tabindex="1" class="form-control currency" required readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="gaji_bersih">Gaji Bersih <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="gaji_bersih" type="text" name="gaji_bersih" tabindex="1" class="form-control currency" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Absensi</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="hadir">Hadir <sup class="text-danger">*</sup></label>
                                            <input id="hadir" type="text" class="form-control" name="hadir" tabindex="1" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="sakit">Sakit <sup class="text-danger">*</sup></label>
                                            <input id="sakit" type="text" class="form-control" name="sakit" tabindex="1" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="ijin">Ijin <sup class="text-danger">*</sup></label>
                                            <input id="ijin" type="text" class="form-control" name="ijin" tabindex="1" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanpa">Tanpa Keterangan <sup class="text-danger">*</sup></label>
                                            <input id="tanpa" type="text" class="form-control" name="tanpa" tabindex="1" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="potongan_absensi">Potongan Absensi <sup class="text-danger">*</sup></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        Rp
                                                    </div>
                                                </div>
                                                <input id="potongan_absensi" type="text" name="potongan_absensi" tabindex="1" class="form-control currency" required readonly>
                                            </div>
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