<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Resume Pegawai</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills" id="myTab3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Pendidikan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Kepangkatan</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        <?php foreach ($pribadi as $data) { ?>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    NIP
                                                                </span>
                                                                <span>
                                                                    <?= $data->nip ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Nama Lengkap
                                                                </span>
                                                                <span>
                                                                    <?= $data->nama ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Program Studi
                                                                </span>
                                                                <span>
                                                                    <?= $data->nama_prodi ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Fakultas
                                                                </span>
                                                                <span>
                                                                    <?= $data->name ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Email Aktif
                                                                </span>
                                                                <span>
                                                                    <?= $data->email ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Email Institusi
                                                                </span>
                                                                <span>
                                                                    <?= $data->email_institusi ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item">
                                                                Foto
                                                            </li>
                                                            <li class="list-group-item">
                                                                <img alt="image" src="<?php echo base_url('assets/img/avatar/') . $data->foto ?>" width="100" height="100">
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped" id="example">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">
                                                                        #
                                                                    </th>
                                                                    <th>Jenjang Pendidikan</th>
                                                                    <th>Nama Perguruan Tinggi</th>
                                                                    <th>Tahun Lulus</th>
                                                                    <th>Judul TA/Skripsi/Thesis</th>
                                                                    <th>IPK</th>
                                                                    <th>Ijazah</th>
                                                                    <th>Transkrip Nilai</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                foreach ($pendidikan as $data) : ?>
                                                                    <tr>
                                                                        <td><?= $no++ ?></td>
                                                                        <td><?= $data->jenjang_pendidikan ?></td>
                                                                        <td><?= $data->nama_pt ?></td>
                                                                        <td><?= $data->tahun ?></td>
                                                                        <td><?= $data->judul_ta ?></td>
                                                                        <td><?= $data->ipk ?></td>
                                                                        <td>
                                                                            <a href="<?= base_url('assets/img/pegawai/ijazah/') . $data->ijazah ?>" download class="btn btn-primary">Download</a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?= base_url('assets/img/pegawai/transkrip/') . $data->transkrip ?>" download class="btn btn-primary">Download</a>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <ul class="list-group">
                                                        <?php if (empty($kepangkatan)) { ?>
                                                            <li class="list-group-item" style="display: flex; justify-content: center;">
                                                                <span>
                                                                    Mohon lengkap data kepangkatan terlebih dulu
                                                                </span>
                                                            </li>
                                                        <?php } ?>
                                                        <?php foreach ($kepangkatan as $data) { ?>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    No. Kartu Pegawai
                                                                </span>
                                                                <span>
                                                                    <?= $data->no_karpeg ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    TMT PNS
                                                                </span>
                                                                <span>
                                                                    <?= $data->tmt_pns ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Golongan
                                                                </span>
                                                                <span>
                                                                    <?= $data->golname ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    TMT Golongan
                                                                </span>
                                                                <span>
                                                                    <?= $data->tmt_golongan ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Jabatan Fungsional
                                                                </span>
                                                                <span>
                                                                    <?= $data->jabatan ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    TMT Jabatan Fungsional
                                                                </span>
                                                                <span>
                                                                    <?= $data->tmt_jabatan ?>
                                                                </span>
                                                            </li>
                                                            <li class="list-group-item" style="display: flex; justify-content: space-between;">
                                                                <span>
                                                                    Kategori Tendik
                                                                </span>
                                                                <span>
                                                                    <?= $data->katname ?>
                                                                </span>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->load->view('dist/_partials/footer'); ?>