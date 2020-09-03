<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

<!-- Page Specific JS File -->
<script src="<?php echo base_url(); ?>assets/js/page/forms-advanced-forms.js"></script>
<script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>


<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

<script>
  $(document).ready(function() {
    $('#example').dataTable({
      "bPaginate": true,
      "bLengthChange": false,
      "bFilter": true,
      "bInfo": false,
      "bAutoWidth": false
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#laporan').DataTable({
      dom: 'Bfrtip',
      buttons: ['copy', 'csv', 'excel', 'pdf']
    });
  });
</script>

<script>
  function show() {
    var x = document.getElementById("expired");
    console.log(x);
    x.style.display = "block";
  }
</script>

<script>
  function rubah() {
    var z = document.getElementById("expired");
    console.log(z);
    z.style.display = "none";
  }
</script>

<script>
  $(document).ready(function() {
    $("#status_kawin").change(function() {
      var x = $("#status_kawin").val();
      if (x == 0) {
        $('#jumlah').prop('readonly', true);
      } else {
        $('#jumlah').prop('readonly', false);
      }
    })
  });
</script>

<script>
  $(document).ready(function() {
    var x = $("#tunjangan").val();
  });
</script>

<script>
  $(document).ready(function() {
    $("#nip").change(function() {
      let nip = $("#nip").val();
      $.ajax({
        method: "GET",
        url: "<?= base_url('admin/absensi/search') ?>",
        data: {
          id_pegawai: nip
        },
        success: function(data) {
          let j = JSON.parse(data);
          $('#nama').val(j.nama);
        },
        error: function(data) {
          alert('Error');
        }
      })
    })
  });
</script>

<script>
  $(document).ready(function() {
    var hadir_init = 0;

    $("#bulan, #tahun ").change(function() {
      let bulan = $("#bulan").val();
      let tahun = $("#tahun").val();
      $.ajax({
        method: "GET",
        url: "<?= base_url('admin/absensi/auto') ?>",
        data: {
          bulan: bulan,
          tahun: tahun,
        },
        success: function(data) {
          var j = JSON.parse(data);
          $('#hadir').val(j);
          hadir_init = j;
        },
        error: function(data) {
          alert('Error');
        }
      })
    })

    $("#sakit, #ijin, #tanpa").keyup(function() {
      var hadir_count = hadir_init;
      var sakit = $("#sakit").val();
      var ijin = $("#ijin").val();
      var tanpa = $("#tanpa").val();

      if (sakit >= 0) {
        var hadir_count1 = hadir_count - sakit;
        $('#hadir').val(hadir_count1);
      } else {
        $('#hadir').val(hadir_count);
      }

      if (ijin >= 0) {
        var hadir_count2 = hadir_count1 - ijin;
        $('#hadir').val(hadir_count2);
      } else {
        $('#hadir').val(hadir_count1);
      }

      if (tanpa >= 0) {
        var hadir_count3 = hadir_count2 - tanpa;
        $('#hadir').val(hadir_count3);
      } else {
        $('#hadir').val(hadir_count2);
      }
    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#bulan, #tahun, #nip").change(function() {
      let nip = $("#nip").val();
      let bulan = $("#_bulan").val();
      let tahun = $("#_tahun").val();

      if (bulan == 01) {
        bulan = "Januari";
      } else if (bulan == 02) {
        bulan = "Februari";
      } else if (bulan == 03) {
        bulan = "Maret";
      } else if (bulan == 04) {
        bulan = "April";
      } else if (bulan == 05) {
        bulan = "Mei";
      } else if (bulan == 06) {
        bulan = "Juni";
      } else if (bulan == 07) {
        bulan = "Juli";
      } else if (bulan == 8) {
        bulan = "Agustus";
      } else if (bulan == 9) {
        bulan = "September";
      } else if (bulan == 10) {
        bulan = "Oktober";
      } else if (bulan == 11) {
        bulan = "November";
      } else if (bulan == 12) {
        bulan = "Desember";
      }

      let tanggal = bulan.concat(" / ", tahun);

      $.ajax({
        method: "GET",
        url: "<?= base_url('admin/slip/search') ?>",
        data: {
          tanggal: tanggal,
          id_pegawai: nip
        },
        success: function(data) {
          let j = JSON.parse(data);

          if (j.tanggal[0]) {
            $('#hadir').val(j.tanggal[0].hadir);
            $('#sakit').val(j.tanggal[0].sakit);
            $('#ijin').val(j.tanggal[0].ijin);
            $('#tanpa').val(j.tanggal[0].tanpa_keterangan);
            $('#potongan_absensi').val(j.tanggal[0].potongan);
          } else {
            $('#hadir').val(0);
            $('#sakit').val(0);
            $('#ijin').val(0);
            $('#tanpa').val(0);
            $('#potongan_absensi').val(0);
          }

          var total_tunjangan_lain = 0;
          for (var i = 0; i < j.tunjangan_pegawai.length; i++) {
            total_tunjangan_lain += parseInt(j.tunjangan_pegawai[i].besar_tunjangan);
          }
          var total_potongan = 0;
          for (var i = 0; i < j.potongan_pegawai.length; i++) {
            total_potongan += j.potongan_pegawai[i].besar_potongan / 100 * j.pegawai[0].gaji_pokok;
          }
          if (j.tanggal[0]) {
            potongan = parseInt(j.tanggal[0].potongan);
          } else {
            potongan = 0;
          }

          var tunjangan_anak = parseInt((j.pegawai[0].tunjangan_anak / 100) * j.pegawai[0].gaji_pokok);
          var jumlah_anak = parseInt(j.pegawai[0].jumlah_anak);
          var jumlah_tunjangan_anak = parseInt(tunjangan_anak) * parseInt(jumlah_anak);

          var tunjangan_pasutri = parseInt((j.pegawai[0].tunjangan_pasutri / 100) * j.pegawai[0].gaji_pokok);

          var total_golongan = parseInt(j.pegawai[0].tunjangan_golongan) + tunjangan_pasutri + jumlah_tunjangan_anak + parseInt(j.pegawai[0].tunjangan_jabatan) + parseInt(j.pegawai[0].tunjangan_makan);

          var gaji_bersih = parseInt(j.pegawai[0].gaji_pokok) + parseInt(total_golongan) + parseInt(total_tunjangan_lain) - parseInt(total_potongan) - parseInt(potongan);

          $('#nama').val(j.pegawai[0].nama);
          $('#jabatan').val(j.pegawai[0].nama_jabatan);
          $('#gaji_pokok').val(j.pegawai[0].gaji_pokok);
          $('#golongan').val(total_golongan);
          $('#tunjangan').val(total_tunjangan_lain);
          $('#potongan').val(total_potongan);
          $('#gaji_bersih').val(gaji_bersih);
        },
        error: function(data) {
          alert('Error');
        }
      })
    })
  });
</script>

</body>

</html>