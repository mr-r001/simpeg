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
                            <?php foreach ($pendidikan as $data) : ?>
                                <form method="post" class="needs-validation" action="<?php echo site_url('dosen/pendidikan/update') ?>" novalidate="" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                    <div class="form-group">
                                        <label>Jenjang Pendidikan<sup class="text-danger">*</sup></label>
                                        <select class="form-control selectric" id="id_pendidikan" name="id_pendidikan">
                                            <option value="" selected disabled>-- Pilih Jenjang Pendidikan --</option>
                                            <?php
                                            foreach ($jenjang_pendidikan as $d) : ?>
                                                <option <?php if ($data->id_pendidikan == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->jenjang_pendidikan ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_pt">Nama Perguruan Tinggi<sup class="text-danger">*</sup></label>
                                        <input id="nama_pt" type="text" class="form-control" name="nama_pt" tabindex="1" value="<?= $data->nama_pt ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Nama Perguruan Tinggi terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun">Tahun Lulus<sup class="text-danger">*</sup></label>
                                        <input id="tahun" type="number" class="form-control" name="tahun" tabindex="1" value="<?= $data->tahun ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Tahun Lulus terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul_ta">Judul TA/Skripsi/Thesis<sup class="text-danger">*</sup></label>
                                        <input id="judul_ta" type="text" class="form-control" name="judul_ta" tabindex="1" value="<?= $data->judul_ta ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan Judul TA/Skripsi/Thesis terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ipk">IPK<sup class="text-danger">*</sup></label>
                                        <input id="ipk" type="text" class="form-control" name="ipk" tabindex="1" value="<?= $data->ipk ?>" required>
                                        <div class="invalid-feedback">
                                            Masukkan IPK terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ijazah">Ijazah <sup class="text-danger">Max 2Mb</sup></label>
                                        <input id="ijazah" type="file" class="form-control" name="ijazah">
                                        <small>*)Kosongkan jika tidak ingin dirubah</small>
                                        <div class="invalid-feedback">
                                            Masukkan Ijazah terlebih dahulu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="transkrip">Transkrip Nilai <sup class="text-danger">Max 2Mb</sup></label>
                                        <input id="transkrip" type="file" class="form-control" name="transkrip">
                                        <small>*)Kosongkan jika tidak ingin dirubah</small>
                                        <div class="invalid-feedback">
                                            Masukkan Transkrip Nilai terlebih dahulu
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