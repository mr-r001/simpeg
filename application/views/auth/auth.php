<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary" style="margin-top: 50%;">
                        <div class="card-header">
                            <h5>Login</h5>
                        </div>
                        <?php if ($this->session->flashdata('failed')) { ?>
                            <div class="alert alert-danger alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>×</span>
                                    </button>
                                    <?= $this->session->flashdata('failed'); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('auth/login') ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">NIP</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" placeholder="Masukkan NIP" required autofocus>
                                    <div class="invalid-feedback">
                                        Masukkan NIP terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="1" placeholder="Masukkan Password" required>
                                    <div class="invalid-feedback">
                                        Masukkan Password terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Sistem Informasi Manajemen Kepegawaian
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>