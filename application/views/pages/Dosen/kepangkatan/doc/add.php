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
                            <form method="post" class="needs-validation" action="<?php echo site_url('dosen/kepangkatan/doc/store') ?>" novalidate="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="sk_cpns">SK CPNS <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sk_cpns" type="file" class="form-control" name="sk_cpns" required>
                                    <div class="invalid-feedback">
                                        Masukkan SK CPNS terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sk_pns">SK PNS <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sk_pns" type="file" class="form-control" name="sk_pns" required>
                                    <div class="invalid-feedback">
                                        Masukkan SK PNS terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sk_kontrak">SK P3K/Kontrak <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sk_kontrak" type="file" class="form-control" name="sk_kontrak" required>
                                    <div class="invalid-feedback">
                                        Masukkan SK P3K/Kontrak terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="karpeg">Karpeg <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="karpeg" type="file" class="form-control" name="karpeg" required>
                                    <div class="invalid-feedback">
                                        Masukkan Karpeg terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sertifikat">Sertifikat Serdos <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sertifikat" type="file" class="form-control" name="sertifikat" required>
                                    <div class="invalid-feedback">
                                        Masukkan Sertifikat Serdos terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sk_jabatan">SK Jabatan Fungsional <sup class="text-danger">Max 2Mb</sup></label>
                                    <input id="sk_jabatan" type="file" class="form-control" name="sk_jabatan" required>
                                    <div class="invalid-feedback">
                                        Masukkan SK Jabatan Fungsional terlebih dahulu
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