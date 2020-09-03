<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Absensi</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data Absensi</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/absensi/store') ?>" novalidate="">
                                <div class="form-group">
                                    <label for="id">ID Absensi <sup class="text-danger">*</sup></label>
                                    <input id="id" type="text" class="form-control" name="id" tabindex="1" value="<?= $newCode ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Bulan/Tahun <sup class="text-danger">*</sup></label>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <select class="form-control selectric" id="bulan" name="bulan">
                                                <option value="" selected disabled>-- Pilih bulan --</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <select class="form-control selectric" id="tahun" name="tahun">
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
                                    <label for="sakit">Sakit <sup class="text-danger">*</sup></label>
                                    <input id="sakit" type="number" class="form-control" name="sakit" tabindex="1" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="ijin">Ijin <sup class="text-danger">*</sup></label>
                                    <input id="ijin" type="number" class="form-control" name="ijin" tabindex="1" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="tanpa">Tanpa Keterangan <sup class="text-danger">*</sup></label>
                                    <input id="tanpa" type="number" class="form-control" name="tanpa" tabindex="1" value="0">
                                </div>
                                <div class="form-group">
                                    <label for="hadir">Hadir <sup class="text-danger">*</sup></label>
                                    <input id="hadir" type="number" class="form-control" name="hadir" tabindex="1" value="0" readonly>
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