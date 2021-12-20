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
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/tahun_akademik/store') ?>" novalidate="">
                                <div class="form-group">
                                    <label for="code">Kode Tahun Akademik<sup class="text-danger">*</sup></label>
                                    <input id="code" type="text" class="form-control" name="code" tabindex="1" placeholder="Masukkan kode tahun akademik" required autofocus>
                                    <div class="invalid-feedback">
                                        Masukkan kode tahun akademik terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Tahun Akademik<sup class="text-danger">*</sup></label>
                                    <input id="name" type="number" class="form-control" name="name" tabindex="1" placeholder="Masukkan tahun akademik" required>
                                    <div class="invalid-feedback">
                                        Masukkan tahun akademik terlebih dahulu
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