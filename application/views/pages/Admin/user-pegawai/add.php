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
                            <form method="post" class="needs-validation" action="<?php echo site_url('admin/user-pegawai/store') ?>" novalidate="">
                                <div class="form-group">
                                    <label for="nip">NIP<sup class="text-danger">*</sup></label>
                                    <input id="nip" type="text" class="form-control" name="nip" tabindex="1" placeholder="Masukkan NIP" required autofocus>
                                    <div class="invalid-feedback">
                                        Masukkan NIP terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama<sup class="text-danger">*</sup></label>
                                    <input id="name" type="text" class="form-control" name="name" tabindex="1" placeholder="Masukkan Nama" required autofocus>
                                    <div class="invalid-feedback">
                                        Masukkan NIP terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal Lahir<sup class="text-danger">*</sup></label>
                                    <input id="tgl" type="date" class="form-control" name="tgl" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan tanggal lahir terlebih dahulu
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