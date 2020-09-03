<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Laporan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pegawai INNER JOIN gaji ON pegawai.id_pegawai = gaji.id_pegawai")->result();
			$this->load->view('pages/Admin/laporan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function find()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Laporan"
			);
			$this->load->view('pages/Admin/laporan/find.php', $data);
		} else {
			redirect('/');
		}
	}

	public function find_()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');


		if ($bulan && $tahun) {
			$data = array(
				'title' => "Data Laporan"
			);
			$data['bulan']				= $bulan;
			$data['tahun']				= $tahun;
			$data['admin']	 			= $this->db->query("SELECT * FROM pegawai INNER JOIN gaji ON pegawai.id_pegawai = gaji.id_pegawai WHERE gaji.bulan = '$bulan' AND gaji.tahun = $tahun")->result();

			$this->load->view('pages/Admin/laporan/index.php', $data);
		}
	}

	public function print()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if ($bulan && $tahun) {
			$data	 			= $this->db->query("SELECT * FROM gaji INNER JOIN pegawai ON gaji.id_pegawai = pegawai.id_pegawai WHERE bulan = '$bulan' AND tahun = $tahun")->result();
		}
		$pdf = new Pdf5(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
		$pdf->SetPrintFooter(false);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetHeaderData(0, 0, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage();
		$pdf->setCellPaddings(1, 1, 1, 1);
		$pdf->setCellMargins(1, 1, 1, 1);
		$pdf->SetFillColor(255, 255, 127);
		$pdf->WriteHTMLCell(0, 0, '', '', '', 0, 1, 0, true, 'C', true);
		$html = 'Periode : ' . $bulan . ' / ' . $tahun;
		$pdf->writeHTML($html, true, false, true, false, '');
		$table = '<table stripped style="border:1px solid #ddd;padding:2px;">';
		$table .= '<tr>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="70px">Periode</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="70px">Nama Pegawai</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Gaji Pokok</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="65px">Tunjangan</th>						
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="65px">Potongan</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="70px">Gaji Bersih</th>
						<th style="border:1px solid #ddd;background-color:#B8DAFF" width="80px">Potongan Absen</th>
					</tr>';
		if (!empty($data)) {
			foreach ($data as $row) {
				$table .= '<tr align="left">
							<td style="border:1px solid #ddd;">' . $row->bulan . ' / ' . $row->tahun . '</td>
							<td style="border:1px solid #ddd;">' . $row->nama . '</td>						
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->gaji_pokok) . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->tunjangan + $row->golongan) . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->potongan) . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->gaji_bersih) . '</td>
							<td style="border:1px solid #ddd;">' . 'Rp. ' . rupiah($row->potongan_absen) . '</td>
						</tr>';
			}
		} else {
			echo "
				<script>
					alert('Data Kosong');
					history.go(-1);
				</script>
			";
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 15, '', $table, 0, 1, 0, true, 'C', true);
		$subtotal	 	= $this->db->query("SELECT * FROM gaji INNER JOIN pegawai ON gaji.id_pegawai = pegawai.id_pegawai WHERE bulan = '$bulan' AND tahun = $tahun")->num_rows();
		$subtotal1 = 0;
		$subtotal2 = 0;
		$subtotal3 = 0;
		$subtotal4 = 0;
		$subtotal5 = 0;
		foreach ($data as $row) {
			$subtotal1 += $row->gaji_pokok;
			$subtotal2 += $row->tunjangan + $row->golongan;
			$subtotal3 += $row->potongan;
			$subtotal4 += $row->gaji_bersih;
			$subtotal5 += $row->potongan_absen;
			$table = '<table style="padding:2px;">';
			$table .= '<tr>
							<th style="" align="right">Total Pegawai</th>
							<td>' . $subtotal . '</td>
						</tr>';
			$table .= '<tr>
							<th style="" align="right">Total Gaji Pokok</th>
							<td>' . 'Rp. ' . rupiah($subtotal1) . '</td>
						</tr>';
			$table .= '<tr>
							<th style="" align="right">Total Tunjangan</th>
							<td>' . 'Rp. ' . rupiah($subtotal2) . '</td>
						</tr>';
			$table .= '<tr>
							<th style="" align="right">Total Potongan</th>
							<td>' . 'Rp. ' . rupiah($subtotal3) . '</td>
						</tr>';
			$table .= '<tr>
							<th>Total Gaji Bersih</th>
							<td>' . 'Rp. ' . rupiah($subtotal4) . '</td>
						</tr>';
			$table .= '<tr>
							<th >Total Potongan Absen</th>
							<td>' . 'Rp. ' . rupiah($subtotal5) . '</td>
						</tr>';
			$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		$pdf->lastPage();
		// ob_clean();
		$pdf->Output('Laporan-' . $bulan . '.pdf', 'I');
	}
}
