<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                    <div class="login-brand">
                          <img src="assets/img/logo-pkh.png" alt="logo" width="250px">
                    </div>
                    <hr>
                        <div class="card-body">
                            <form method="POST" action="<?= site_url('auth/login') ?>" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" placeholder="Masukkan Username" required autofocus>
                                    <div class="invalid-feedback">
                                        Masukkan Username terlebih dahulu
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
                    <div class="alert alert-light alert-has-icon">
                      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                      <div class="alert-body">
                        <div class="alert-title">Detail Login</div>
                        rival:12345
                      </div>
                    </div>
                    <div class="simple-footer">
                        Sistem Informasi Penggajian Pegawai<br>
                        Rival Abu Hanifah
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('dist/_partials/js'); ?>