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
            <h2 class="section-title">Hi, <?= $this->session->userdata('nama') ?>!</h2>
            <p class="section-lead">
                Ini adalah halaman profile anda.
            </p>

        </div>
</div>
</div>
</section>
</div>

<?php $this->load->view('dist/_partials/footer'); ?>