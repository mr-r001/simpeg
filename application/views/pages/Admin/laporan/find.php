<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Penggajian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Laporan Penggajian</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="margin-top: 100px;">
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/laporan/find_') ?>" novalidate="">
                                <div class="row">
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-group mt-5">
                                            <label>Bulan <sup class="text-danger">*</sup></label>
                                            <select class="form-control selectric" id="bulan" name="bulan" required>
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
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-3">
                                        <div class="form-group mt-5">
                                            <label>Tahun <sup class="text-danger">*</sup></label>
                                            <select class="form-control selectric" id="tahun" name="tahun" required>
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
                                    <div class="col-15 col-md-3 col-lg-3">
                                    </div>
                                    <div class="form-group" style="margin-left: 660px;">
                                        <button type="submit" class="btn btn-primary" tabindex="4">
                                            <i class="fa fa-search"></i>
                                            Cari
                                        </button>
                                    </div>
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