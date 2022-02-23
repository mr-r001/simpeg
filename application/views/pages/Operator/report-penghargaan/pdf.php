<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Penghargaan</title>
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
					<th style="width: 20%;">Nama</th>
					<th style="width: 32%;">Nama Penghargaan</th>
					<th style="width: 20%;">Lembaga</th>
					<th style="width: 15%;">Tingkatan</th>
					<th style="width: 10%;">Tahun</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				if (is_object($penghargaan)) {
					if (count(array($penghargaan)) > 0) {
						foreach ($penghargaan as $data) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['nama'] ?></td>
								<td><?= $data['nama_penghargaan'] ?></td>
								<td><?= $data['pemberi'] ?></td>
								<td><?= $data['tingkatan'] ?></td>
								<td><?= $data["tahun"] ?></td>
							</tr>
						<?php endforeach; ?>
					<?php } else { ?>
						<tr align=" center">
							<td colspan="10">Tidak ada data</td>
						</tr>
					<?php }
				} else { ?>
					<?php if (count($penghargaan) > 0) {
						foreach ($penghargaan as $data) : ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $data['nama'] ?></td>
								<td><?= $data['nama_penghargaan'] ?></td>
								<td><?= $data['pemberi'] ?></td>
								<td><?= $data['tingkatan'] ?></td>
								<td><?= $data["tahun"] ?></td>
							</tr>
						<?php endforeach; ?>
					<?php } else { ?>
						<tr align=" center">
							<td colspan="10">Tidak ada data</td>
						</tr>
				<?php }
				} ?>

			</tbody>
		</table>
	</div>

</body>

</html>