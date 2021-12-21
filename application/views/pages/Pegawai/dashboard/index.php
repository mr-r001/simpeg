<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?= $this->session->userdata('nama') ?>!</h2>
            <p class="section-lead">
                Ini adalah halaman profile anda.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="<?php echo base_url('assets/img/avatar/') . $this->session->userdata('img') ?>" class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">NIP</div>
                                    <div class="profile-widget-item-value"><?= $this->session->userdata('nip') ?></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">No Telepon</div>
                                    <div class="profile-widget-item-value"><?= $this->session->userdata('telp') ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name"><?= $this->session->userdata('nama') ?> <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> <?php foreach ($admin as $data) {
                                                                    echo  $data->nama_jabatan;
                                                                } ?>
                                </div>
                            </div>
                            <?= $this->session->userdata('alamat') ?></b>.
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Gaji 6 bulan terakhir</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Periode Gaji</th>
                                    <th>Nama</th>
                                    <th>Gaji Pokok</th>
                                    <th>Tunjangan</th>
                                    <th>Potongan</th>
                                    <th>Gaji Bersih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($admin as $data) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->bulan . ' / ' . $data->tahun ?></td>
                                        <td><?= $data->nama ?></td>
                                        <td>Rp. <?= rupiah($data->gaji_pokok) ?></td>
                                        <td>Rp. <?= rupiah($data->tunjangan + $data->golongan) ?></td>
                                        <td>Rp. <?= rupiah($data->potongan) ?></td>
                                        <td>Rp. <?= rupiah($data->gaji_bersih) ?></td>
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
</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>