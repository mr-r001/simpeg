<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Pegawai</title>
	<style>
		@page {
			size: A4;
			margin: 10;
		}

		#customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#customers td,
		#customers th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#customers tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		#customers tr:hover {
			background-color: #ddd;
		}

		#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #6777EE;
			color: white;
		}
	</style>
</head>

<body>

	<div class="container">
		<table align="center">
			<tr>
				<td>
					<h1>Laporan</h1>
				</td>
			</tr>
		</table>
		<br>

		<table id="customers">
			<thead>
				<tr>
					<th style="width: 3%;">No</th>
					<th style="width: 10%;">NIP</th>
					<th style="width: 17%;">Nama</th>
					<th style="width: 30%;">Program Studi</th>
					<th style="width: 28%;">Fakultas</th>
					<th style="width: 5%;">Status</th>
					<th style="width: 7%;">Kategori</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				if (count($pegawai) > 0) {
					foreach ($pegawai as $data) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $data->nip ?></td>
							<td><?= $data->nama ?></td>
							<td><?= $data->nama_prodi ?></td>
							<td><?= $data->nama_fakultas ?></td>
							<td><?= $data->status_pegawai ?></td>
							<td><?= $data->name ?></td>
						</tr>
					<?php endforeach; ?>
				<?php } else { ?>
					<tr align="center">
						<td colspan="10">Tidak ada data</td>
					</tr>
				<?php	} ?>
			</tbody>
		</table>
	</div>

</body>

</html>