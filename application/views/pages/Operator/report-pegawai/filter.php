<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Filter Data</h1>
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
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('operator/report-pegawai/download') ?>" novalidate="">
                                <div class="form-group">
                                    <label>Download data berdasarkan<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="filter" name="filter">
                                        <option value="" selected disabled>-- Silahkan pilih --</option>
                                        <option value="0">Semua</option>
                                        <option value="5">Teknisi</option>
                                        <option value="6">Laboran</option>
                                        <option value="7">Administrasi</option>
                                        <option value="8">Arsiparis</option>
                                    </select>
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