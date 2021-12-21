<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-primary alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    <?= $this->session->flashdata('success'); ?>
                </div>
            </div>
        <?php } ?>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="<?php echo site_url('profile/update') ?>" novalidate="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="hidden" name="id" value="<?= $profile['id'] ?>">
                                    <input id="name" type="text" class="form-control" name="name" tabindex="1" value="<?= $profile['nama'] ?>" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" name="username" tabindex="1" value="<?= $profile['username'] ?>" required>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="img">Foto Profil</label>
                                    <br>
                                    <img src="<?= base_url('assets/img/avatar/') . $profile['img'] ?>" alt="" style="margin-left: 40px;margin-bottom: 10px;width: 100px; border-radius: 50%">
                                    <input id="img" type="file" class="form-control" name="img" tabindex="1">
                                    <small>Kosongkan jika tidak ingin dirubah</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Edit Data
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