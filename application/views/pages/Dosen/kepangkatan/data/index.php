<?php
defined('BASEPATH') or exit('No direct script access allowed');
$data['admin'] = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
$this->load->view('dist/_partials/header', $data);
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kepangkatan </h1>
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
                            <h4>Isi Data</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($kepangkatan as $data) : ?>
                                <?= form_open_multipart('dosen/kepangkatan/data/update'); ?>
                                <input type="hidden" name="id" value="<?= $data->id ?>">
                                <div class="form-group">
                                    <label>NIP<sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" tabindex="1" value="<?= $this->session->userdata('nip'); ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nidn">NIDN<sup class="text-danger">*</sup></label>
                                    <input id="nidn" type="text" class="form-control" name="nidn" tabindex="1" placeholder="Masukkan NIDN" value="<?= $data->nidn ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan NIDN terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_karpeg">No Kartu pegawai<sup class="text-danger">*</sup></label>
                                    <input id="no_karpeg" type="text" class="form-control" name="no_karpeg" tabindex="1" placeholder="Masukkan No Kartu Pegawai" value="<?= $data->no_karpeg ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan No Kartu Pegawai terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status Serdos<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="status" name="status">
                                        <option value="" selected disabled>-- Pilih Status --</option>
                                        <option <?php if ($data->status == 'Ya') : echo 'selected'; ?><?php endif; ?> value="Ya">Ya</option>
                                        <option <?php if ($data->status == 'Tidak') : echo 'selected'; ?><?php endif; ?> value="Tidak">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group" id="nomor" style="display: none;">
                                    <label for="nomor_serdos">Nomor Serdos<sup class="text-danger">*</sup></label>
                                    <input id="nomor_serdos" type="text" class="form-control" name="nomor_serdos" tabindex="1" placeholder="Masukkan Nomor Serdos" value="<?= $data->nomor_serdos ?>">
                                    <div class="invalid-feedback">
                                        Masukkan Nomor Serdos terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tmt_pns">TMT PNS<sup class="text-danger">*</sup></label>
                                    <input id="tmt_pns" type="date" class="form-control" name="tmt_pns" value="<?= $data->tmt_pns ?>" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan TMT PNS terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Golongan<sup class="text-danger">*</sup></label>
                                    <select class="form-control selectric" id="id_golongan" name="id_golongan">
                                        <option value="" selected disabled>-- Pilih Golongan --</option>
                                        <?php
                                        foreach ($golongan as $d) : ?>
                                            <option <?php if ($data->id_golongan == $d->id) : echo 'selected'; ?><?php endif; ?> value=<?= $d->id ?>> <?= $d->name ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tmt_golongan">TMT Golongan<sup class="text-danger">*</sup></label>
                                    <input id="tmt_golongan" type="date" class="form-control" name="tmt_golongan" value="<?= $data->tmt_golongan ?>" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan TMT Golongan terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan Fungsional<sup class="text-danger">*</sup></label>
                                    <input id="jabatan" type="text" class="form-control" name="jabatan" tabindex="1" placeholder="Masukkan Jabatan Fungsional" value="<?= $data->jabatan ?>" required>
                                    <div class="invalid-feedback">
                                        Masukkan Jabatan Fungsional terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tmt_jabatan">TMT Jabatan Fungsional<sup class="text-danger">*</sup></label>
                                    <input id="tmt_jabatan" type="date" class="form-control" name="tmt_jabatan" value="<?= $data->tmt_jabatan ?>" tabindex="1" required>
                                    <div class="invalid-feedback">
                                        Masukkan TMT Jabatan Fungsional terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Simpan
                                    </button>
                                </div>
                                <?= form_close() ?>
                                <!-- </form> -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var status = $('#status').val()
        if (status == 'Ya') {
            $("#nomor").css({
                'display': 'block',
            });
        }

        $('body').on('change', '#status', function() {
            var id = $(this).val();
            if (id == 'Ya') {
                $("#nomor").css({
                    'display': 'block',
                });
            } else {
                $("#nomor").css({
                    'display': 'none',
                });
            }
        })

    })
</script>

<?php $this->load->view('dist/_partials/footer'); ?>