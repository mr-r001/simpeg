<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Isi Data</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($kepanitiaan as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('admin/kepanitiaan/update') ?>" novalidate="">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <div class="form-group">
                                        <label for="name">Status Kepanitiaan <sup class="text-danger">*</sup></label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1" value="<?= $data->kepanitiaan ?>" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan status kepanitiaan terlebih dahulu
                                        </div>
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