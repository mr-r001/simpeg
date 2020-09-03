<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Absensi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data Absensi</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($admin as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/absensi/update') ?>" novalidate="">
                                    <div class="form-group">
                                        <label for="id">ID Absensi <sup class="text-danger">*</sup></label>
                                        <input type="hidden" name="id" value="<?= $data->id ?>">
                                        <input id="id_absensi" type="text" class="form-control" name="id_absensi" tabindex="1" value="<?= $data->id_absensi ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Bulan/Tahun <sup class="text-danger">*</sup></label>
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <select class="form-control selectric" id="bulan" name="bulan">
                                                    <option value="" selected disabled>-- Pilih bulan --</option>
                                                    <option <?php if ($data->bulan == 'Januari') : echo 'selected'; ?><?php endif; ?> value="01">Januari
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Februari') : echo 'selected'; ?><?php endif; ?> value="02">Februari
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Maret') : echo 'selected'; ?><?php endif; ?> value="03">Maret
                                                    </option>
                                                    <option <?php if ($data->bulan == 'April') : echo 'selected'; ?><?php endif; ?> value="04">April
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Mei') : echo 'selected'; ?><?php endif; ?> value="05">Mei
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Juni') : echo 'selected'; ?><?php endif; ?> value="06">Juni
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Juli') : echo 'selected'; ?><?php endif; ?> value="07">Juli
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Agustus') : echo 'selected'; ?><?php endif; ?> value="8">Agustus
                                                    </option>
                                                    <option <?php if ($data->bulan == 'September') : echo 'selected'; ?><?php endif; ?> value="9">September
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Oktober') : echo 'selected'; ?><?php endif; ?> value="10">Oktober
                                                    </option>
                                                    <option <?php if ($data->bulan == 'November') : echo 'selected'; ?><?php endif; ?> value="11">November
                                                    </option>
                                                    <option <?php if ($data->bulan == 'Desember') : echo 'selected'; ?><?php endif; ?> value="12">Desember
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6">
                                                <select class="form-control selectric" id="tahun" name="tahun">
                                                    <option value="" selected disabled>-- Pilih tahun --</option>
                                                    <?php
                                                    $thn_skr = date('Y');
                                                    for ($x = $thn_skr; $x >= 2000; $x--) {
                                                    ?>
                                                        <option <?php if ($data->tahun == $x) : echo 'selected'; ?><?php endif; ?> value="<?= $x ?>"><?= $x ?></option>
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
                                            foreach ($pegawai as $d) : ?>
                                                <option <?php if ($data->id_pegawai == $d->id_pegawai) : echo 'selected'; ?><?php endif; ?> value="<?= $d->id_pegawai ?>"><?= $d->nip ?> [ <?= $data->nama ?> ]</option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Pegawai <sup class="text-danger">*</sup></label>
                                        <input id="nama" type="text" class="form-control" name="nama" tabindex="1" value="<?= $data->nama ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="sakit">Sakit <sup class="text-danger">*</sup></label>
                                        <?php
                                        foreach ($sakit as $data) : ?>
                                            <input id="sakit" type="number" class="form-control" name="sakit" tabindex="1" value="<?= $data->sakit ?>" value="0">
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="ijin">Ijin <sup class="text-danger">*</sup></label>
                                        <?php
                                        foreach ($ijin as $data) : ?>
                                            <input id="ijin" type="number" class="form-control" name="ijin" tabindex="1" value="<?= $data->ijin ?>" value="0">
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanpa">Tanpa Keterangan <sup class="text-danger">*</sup></label>
                                        <?php
                                        foreach ($tanpa as $data) : ?>
                                            <input id="tanpa" type="number" class="form-control" name="tanpa" tabindex="1" value="<?= $data->tanpa_keterangan ?>" value="0">
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="hadir">Hadir <sup class="text-danger">*</sup></label>
                                        <?php
                                        foreach ($hadir as $data) : ?>
                                            <input id="hadir" type="number" class="form-control" name="hadir" tabindex="1" value="<?= $data->hadir ?>" readonly>
                                        <?php endforeach; ?>
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