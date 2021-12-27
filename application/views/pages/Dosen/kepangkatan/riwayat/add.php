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
                            <form method="post" class="needs-validation" action="<?php echo site_url('dosen/kepangkatan/riwayat/store') ?>" novalidate="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_jabatan">Nama Jabatan Struktural<sup class="text-danger">*</sup></label>
                                    <input id="nama_jabatan" type="text" class="form-control" name="nama_jabatan" tabindex="1" placeholder="Masukkan Nama Jabatan Struktural Anda" required>
                                    <div class="invalid-feedback">
                                        Masukkan Nama Jabatan Struktural terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="periode">Periode<sup class="text-danger">*</sup></label>
                                    <input id="periode" type="text" class="form-control" name="periode" tabindex="1" placeholder="Masukkan Periode" required>
                                    <div class="invalid-feedback">
                                        Masukkan Periode terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun<sup class="text-danger">*</sup></label>
                                    <input id="tahun" type="number" class="form-control" name="tahun" tabindex="1" placeholder="Masukkan Tahun" required>
                                    <div class="invalid-feedback">
                                        Masukkan Tahunterlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sk">Surat Kerja <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sk" type="file" class="form-control" name="sk" required>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>