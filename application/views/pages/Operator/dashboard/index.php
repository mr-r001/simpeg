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
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Dosen Tetap</h4>
						</div>
						<div class="card-body">
							<?= $tetap ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="far fa-newspaper"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Dosen Tidak Tetap</h4>
						</div>
						<div class="card-body">
							<?= $tidak_tetap ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="far fa-file"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Dosen Sesuai Bidang</h4>
						</div>
						<div class="card-body">
							<?= $sesuai ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-circle"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Dosen Tidak Sesuai Bidang</h4>
						</div>
						<div class="card-body">
							<?= $tidak_sesuai ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Jumlah Pegawai berdasarkan Kategori Tendik</h4>
					</div>
					<div class="card-body">
						<canvas id="myChart" height="150"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Persentasi dosen tetap : tidak tetap</h4>
					</div>
					<div class="card-body">
						<canvas id="percent_dosen_tetap" height="150"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Persentasi dosen sesuai bidang : tidak sesuai bidang</h4>
					</div>
					<div class="card-body">
						<canvas id="percent_dosen_bidang" height="150"></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Persentasi dosen tetap sesuai bidang : dosen tetap tidak sesuai bidang</h4>
					</div>
					<div class="card-body">
						<canvas id="percent_dosen_tetap_sesuai" height="150"></canvas>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Persentasi dosen tidak tetap sesuai bidang : dosen tidak tetap tidak sesuai bidang
						</h4>
					</div>
					<div class="card-body">
						<canvas id="percent_dosen_tidak_bidang" height="150"></canvas>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<script>
	const teknisi = <?php echo $teknisi ?>;
	const laboran = <?php echo $laboran ?>;
	const administrasi = <?php echo $administrasi ?>;
	const arsiparis = <?php echo $arsiparis ?>;
	const ctx = document.getElementById('myChart').getContext('2d');
	const myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Laboran', 'Administrasi', 'Teknisi', 'Arsiparis'],
			datasets: [{
				label: 'Kategori',
				data: [teknisi, laboran, administrasi, arsiparis],
				backgroundColor: [
					'rgb(103,119,238)',
					'rgb(252,84,74)',
					'rgb(255,164,37)',
					'rgb(99,237,122)',
				],
			}]
		},
		options: {
			responsive: true,
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>

<script>
	const percent_tetap = <?php echo $tetap ?>;
	const percent_tidak_tetap = <?php echo $tidak_tetap ?>;
	var data = [{
		data: [percent_tetap, percent_tidak_tetap],
		labels: ["Dosen Tetap", "Dosen Tidak Tetap"],
		backgroundColor: [
			"#4b77a9",
			"#5f255f",
		],
		borderColor: "#fff"
	}];

	var options = {
		tooltips: {
			enabled: false
		},
		plugins: {
			datalabels: {
				formatter: (value, categories) => {

					let sum = 0;
					let dataArr = categories.chart.data.datasets[0].data;
					dataArr.map(data => {
						sum += data;
					});
					let percentage = (value * 100 / sum).toFixed(2) + "%";
					return percentage;


				},
				color: '#fff',
			}
		}
	};


	var percentDosen = document.getElementById('percent_dosen_tetap').getContext('2d');
	var myChartPercent = new Chart(percentDosen, {
		type: 'pie',
		data: {
			labels: ["Dosen Tetap", "Dosen Tidak Tetap"],
			datasets: data
		},
		options: options
	});
</script>

<script>
	const percent_sesuai = <?php echo $sesuai ?>;
	const percent_tidak_sesuai = <?php echo $tidak_sesuai ?>;
	var data = [{
		data: [percent_sesuai, percent_tidak_sesuai],
		labels: ["Dosen Sesuai Bidang", "Dosen Tidak Sesuai Bidang"],
		backgroundColor: [
			"#4b77a9",
			"#5f255f",
		],
		borderColor: "#fff"
	}];

	var options = {
		tooltips: {
			enabled: false
		},
		plugins: {
			datalabels: {
				formatter: (value, categories) => {

					let sum = 0;
					let dataArr = categories.chart.data.datasets[0].data;
					dataArr.map(data => {
						sum += data;
					});
					let percentage = (value * 100 / sum).toFixed(2) + "%";
					return percentage;


				},
				color: '#fff',
			}
		}
	};


	var percentBidang = document.getElementById('percent_dosen_bidang').getContext('2d');
	var myChartBidang = new Chart(percentBidang, {
		type: 'pie',
		data: {
			labels: ["Dosen Sesuai Bidang", "Dosen Tidak Sesuai Bidang"],
			datasets: data
		},
		options: options
	});
</script>

<script>
	const percent_tetap_sesuai = <?php echo $tetap_sesuai ?>;
	const percent_tetap_tidak_sesuai = <?php echo $tetap_tidak_sesuai ?>;
	var data = [{
		data: [percent_tetap_sesuai, percent_tetap_tidak_sesuai],
		labels: ["Dosen Tetap Sesuai Bidang", "Dosen Tetap Tidak Sesuai Bidang"],
		backgroundColor: [
			"#4b77a9",
			"#5f255f",
		],
		borderColor: "#fff"
	}];

	var options = {
		tooltips: {
			enabled: false
		},
		plugins: {
			datalabels: {
				formatter: (value, categories) => {

					let sum = 0;
					let dataArr = categories.chart.data.datasets[0].data;
					dataArr.map(data => {
						sum += data;
					});
					let percentage = (value * 100 / sum).toFixed(2) + "%";
					return percentage;


				},
				color: '#fff',
			}
		}
	};


	var percentTetapBidang = document.getElementById('percent_dosen_tetap_sesuai').getContext('2d');
	var myChartTetapBidang = new Chart(percentTetapBidang, {
		type: 'pie',
		data: {
			labels: ["Dosen Tetap Sesuai Bidang", "Dosen Tetap Tidak Sesuai Bidang"],
			datasets: data
		},
		options: options
	});
</script>

<script>
	const percent_tidak_tetap_sesuai = <?php echo $tidak_tetap_sesuai ?>;
	const percent_tidak_tetap_tidak_sesuai = <?php echo $tidak_tetap_tidak_sesuai ?>;
	var data = [{
		data: [percent_tidak_tetap_sesuai, percent_tidak_tetap_tidak_sesuai],
		labels: ["Dosen Tidak Tetap Sesuai Bidang", "Dosen Tidak Tetap Tidak Sesuai Bidang"],
		backgroundColor: [
			"#4b77a9",
			"#5f255f",
		],
		borderColor: "#fff"
	}];

	var options = {
		tooltips: {
			enabled: false
		},
		plugins: {
			datalabels: {
				formatter: (value, categories) => {

					let sum = 0;
					let dataArr = categories.chart.data.datasets[0].data;
					dataArr.map(data => {
						sum += data;
					});
					let percentage = (value * 100 / sum).toFixed(2) + "%";
					return percentage;


				},
				color: '#fff',
			}
		},
	};


	var percentTidakTetapBidang = document.getElementById('percent_dosen_tidak_bidang').getContext('2d');
	var myChartTidakTetapBidang = new Chart(percentTidakTetapBidang, {
		type: 'pie',
		data: {
			labels: ["Dosen Tidak Tetap Sesuai Bidang", "Dosen Tidak Tetap Tidak Sesuai Bidang"],
			datasets: data
		},
		options: options
	});
</script>

<?php $this->load->view('dist/_partials/footer'); ?>