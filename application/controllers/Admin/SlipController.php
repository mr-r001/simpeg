<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SlipController extends CI_Controller
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
				'title' => "Data Slip Gaji"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pegawai INNER JOIN gaji ON pegawai.id_pegawai = gaji.id_pegawai")->result();
			$this->load->view('pages/Admin/slip/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Slip Gaji"
			);

			$table = "gaji";
			$field = "id_gaji";

			$prefix = "GA";

			$lastCode = $this->M_Kode->generate_gaji($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_gaji'], -5, 5);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%05s', $noUrut);
			$data['pegawai']	 	= $this->db->query("SELECT * FROM pegawai")->result();
			$this->load->view('pages/Admin/slip/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id         	          = $this->input->post('id');
		$bulan         	          = $this->input->post('_bulan');
		$tahun         	          = $this->input->post('_tahun');
		$nip    	     	      = $this->input->post('nip');
		$golongan         	      = $this->input->post('golongan');
		$gaji_pokok         	  = $this->input->post('gaji_pokok');
		$tunjangan         	      = $this->input->post('tunjangan');
		$potongan       	  	  = $this->input->post('potongan');
		$gaji_bersih       	  	  = $this->input->post('gaji_bersih');
		$potongan_absen       	  = $this->input->post('potongan_absensi');

		$data = array(
			'id_gaji'			=> $id,
			'tanggal'			=> date('Y-m-d'),
			'bulan'				=> $bulan,
			'tahun'				=> $tahun,
			'id_pegawai'		=> $nip,
			'golongan'			=> $golongan,
			'gaji_pokok'		=> $gaji_pokok,
			'tunjangan'			=> $tunjangan,
			'potongan'			=> $potongan,
			'gaji_bersih'		=> $gaji_bersih,
			'potongan_absen'	=> $potongan_absen
		);

		$this->db->insert('gaji', $data);
		redirect('admin/slip');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('gaji', $where);
		redirect('admin/slip');
	}

	public function search()
	{
		$id_pegawai = $_GET['id_pegawai'];
		$tanggal 	= $_GET['tanggal'];

		$result['pegawai']					= $this->db->query("SELECT * FROM golongan INNER JOIN pegawai ON golongan.id_golongan = pegawai.id_golongan INNER JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan WHERE id_pegawai = '$id_pegawai'")->result();
		$result['tunjangan_pegawai']	 	= $this->db->query("SELECT * FROM tunjangan_pegawai INNER JOIN tunjangan ON tunjangan_pegawai.id_tunjangan = tunjangan.id_tunjangan WHERE tunjangan_pegawai.id_pegawai = '$id_pegawai'")->result();
		$result['potongan_pegawai']	 		= $this->db->query("SELECT * FROM potongan_pegawai INNER JOIN potongan ON potongan_pegawai.id_potongan = potongan.id_potongan WHERE potongan_pegawai.id_pegawai = '$id_pegawai'")->result();
		$result['tanggal']	 				= $this->db->query("SELECT * FROM absensi WHERE id_pegawai = '$id_pegawai' AND tanggal= '$tanggal'")->result();

		echo json_encode($result);
	}

	public function download($id)
	{
		$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetTitle('Laporan');
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
		$penggajian	 			= $this->db->query("SELECT * FROM gaji WHERE id=$id")->result();
		$html = '';
		$pdf->writeHTML($html, true, false, true, false, '');
		$table = '<table stripped style="; padding:4px;">';
		foreach ($penggajian as $row) {
			$date = $row->bulan . ' / ' . $row->tahun;
			$id_pegawai 			= $row->id_pegawai;
			$karyawan	 			= $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'")->result();
			$table = '<table style="padding:4xpx;padding-top: -30px">';
			$table .= '<tr>
			<th style="" align="right"><strong>Periode</strong></th>
			<td>' . $date . '</td>
			</tr>';
			$table .= '</table>';
			$tablekiri = '<table style="padding-top: -30px">';
			$tablekiri .= '<tr>
			<th style="" align="left"><strong>DIBERIKAN KEPADA</strong></th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);
		foreach ($karyawan as $row) {
			$id_jabatan 			= $row->id_jabatan;
			$jabatan	 			= $this->db->query("SELECT * FROM jabatan WHERE id_jabatan = '$id_jabatan'")->result();
			$table = '<table style="padding:4xpx;padding-top:-23px">';
			$tablekiri = '<table style="padding-top: -22px">';
			$tablekiri .= '<tr>
			<th style="" align="left">Nama : ' . $row->nama . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($karyawan as $row) {
			$tablekiri = '<table style="padding-top: -20px">';
			$tablekiri .= '<tr>
			<th style="" align="left">NIP : ' . $row->nip . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($jabatan as $row) {
			$tablekiri = '<table style="padding-top: -18px">';
			$tablekiri .= '<tr>
			<th style="" align="left">Jabatan : ' . $row->nama_jabatan . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		$table = '<table style="; padding: 10px;">';
		foreach ($penggajian as $row) {
			$id_pegawai 		= $row->id_pegawai;
			$karyawan	 			= $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'")->result();
			$table = '<table style="padding:4xpx;padding-top: -30px">';
			$table .= '<tr>
			<th style="" align="left"><strong>Potongan</strong></th>
			</tr>';
			$table .= '</table>';
			$tablekiri = '<table style="padding-top: -30px">';
			$tablekiri .= '<tr>
			<th style="" align="left"><strong>Penghasilan</strong></th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', 90, $tablekiri, 0, 0, 0, true, 'R', true);
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		foreach ($penggajian as $row) {
			$id_pegawai 		= $row->id_pegawai;
			$tunjangan	 		= $this->db->query("SELECT * FROM tunjangan_pegawai INNER JOIN tunjangan ON tunjangan_pegawai.id_tunjangan = tunjangan.id_tunjangan WHERE tunjangan_pegawai.id_pegawai = '$id_pegawai'")->result();
			$tablekiri = '<table style="padding-top: -18px">';
			$tablekiri .= '<tr>
			<th align="left">Gaji Pokok : 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			Rp. ' . rupiah($row->gaji_pokok) . '</th>
			</tr>';
			$tablekiri .= '</table>';
		}
		$pdf->writeHTMLCell(80, '', '', '', $tablekiri, 0, 0, 0, true, 'R', true);

		$gaji_pokok			= $row->gaji_pokok;
		$id_pegawai 		= $row->id_pegawai;
		$potongan	 		= $this->db->query("SELECT * FROM potongan_pegawai INNER JOIN potongan ON potongan_pegawai.id_potongan = potongan.id_potongan WHERE potongan_pegawai.id_pegawai = '$id_pegawai'")->result();
		$tablekiri = '<table style="padding-top: -23px;">';
		foreach ($tunjangan as $row) {
			$tablekiri .= '<tr>
			<th align="left">' . $row->nama_tunjangan . ' : </th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(35, '', '', 100, $tablekiri, 0, 0, 0, true, 'R', true);

		$id_pegawai 		= $row->id_pegawai;
		$potongan	 		= $this->db->query("SELECT * FROM potongan_pegawai INNER JOIN potongan ON potongan_pegawai.id_potongan = potongan.id_potongan WHERE potongan_pegawai.id_pegawai = '$id_pegawai'")->result();
		$tablekiri = '<table style="padding-top: -23px;">';
		foreach ($tunjangan as $row) {
			$tablekiri .= '<tr>
			<th align="left">Rp. ' . rupiah($row->besar_tunjangan) . '</th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(30, '', 68, 100, $tablekiri, 0, 0, 0, true, 'R', true);

		$id_pegawai 		= $row->id_pegawai;
		$golongan	 		= $this->db->query("SELECT * FROM pegawai INNER JOIN golongan ON pegawai.id_golongan = golongan.id_golongan WHERE pegawai.id_pegawai = '$id_pegawai'")->result();
		$tablekiri = '<table style="padding-top: -35px">';
		foreach ($golongan as $row) {
			$tablekiri .= '<tr>
			<th align="left">Tunjangan Golongan : 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			Rp. ' . rupiah($row->tunjangan_golongan) . '</th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(80, '', '', 117, $tablekiri, 0, 0, 0, true, 'R', true);

		$tablekiri = '<table style="padding-top: -35px">';
		foreach ($golongan as $row) {
			$jumlah_pasutri = ($row->tunjangan_pasutri / 100) * $gaji_pokok;
			$tablekiri .= '<tr>
			<th align="left">Tunjangan Suami Istri : 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			Rp. ' . rupiah($jumlah_pasutri) . '</th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(80, '', '', 121, $tablekiri, 0, 0, 0, true, 'R', true);

		$tablekiri = '<table style="padding-top: -35px">';
		foreach ($golongan as $row) {
			$jumlah_anak = $row->jumlah_anak;
			$tunjangan_anak = $row->tunjangan_anak;
			$total_tunjangan_anak = $jumlah_anak * ($tunjangan_anak / 100) * $gaji_pokok;
			$tablekiri .= '<tr>
			<th align="left">Tunjangan Anak : 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			Rp. ' . rupiah($total_tunjangan_anak) . '</th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(80, '', '', 125, $tablekiri, 0, 0, 0, true, 'R', true);

		$tablekiri = '<table style="padding-top: -35px">';
		foreach ($golongan as $row) {
			$tablekiri .= '<tr>
			<th align="left">Tunjangan Jabatan : </th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(40, '', '', 129, $tablekiri, 0, 0, 0, true, 'R', true);

		$tablekiri = '<table style="padding-top: -35px">';
		foreach ($golongan as $row) {
			$tablekiri .= '<tr>
			<th align="left">Rp. ' . rupiah($row->tunjangan_jabatan) . '</th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(30, '', 67.5, 129, $tablekiri, 0, 0, 0, true, 'R', true);

		$tablekiri = '<table style="padding-top: -38px">';
		foreach ($golongan as $row) {
			$tablekiri .= '<tr>
			<th align="left">Tunjangan Makan : </th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(40, '', '', 134, $tablekiri, 0, 0, 0, true, 'R', true);

		$tablekiri = '<table style="padding-top: -38px">';
		foreach ($golongan as $row) {
			$tablekiri .= '<tr>
			<th align="left">Rp. ' . rupiah($row->tunjangan_makan) . '</th>
			</tr><br>';
		}
		$tablekiri .= '</table>';
		$pdf->writeHTMLCell(30, '', 67.5, 134, $tablekiri, 0, 0, 0, true, 'R', true);

		$table = '<table style="padding:4xpx;padding-top:-25px">';
		foreach ($penggajian as $row) {
			$table .= '<tr>
						<th align="left">Potongan Absensi : </th>
						<td>Rp. ' . rupiah($row->potongan_absen) . '</td>
					</tr><br>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, 95, $table, 0, 1, 0, true, 'R', true);

		$table = '<table style="padding:4xpx;padding-top:-25px">';
		foreach ($potongan as $row) {
			$jumlah_potongan = ($row->besar_potongan / 100) * $gaji_pokok;
			$table .= '<tr>
						<th align="left">' . $row->nama_potongan . ' : </th>
						<td>Rp. ' . rupiah($jumlah_potongan) . '</td>
					</tr><br>';
		}
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, 99, $table, 0, 1, 0, true, 'R', true);


		foreach ($penggajian as $row) {
			$table = '<table style="padding:4xpx;padding-top: -2px">';
			$table .= '<tr>
						<th style="" align="right"><strong>Penerimaan Bersih</strong></th>
						<td>Rp. ' . rupiah($row->gaji_bersih) . '</td>
					</tr>';
			$table .= '</table>';
		}
		$pdf->WriteHTMLCell(0, 0, 125, 135, $table, 0, 1, 0, true, 'R', true);

		$pdf->SetFont('times', 'B', 12);
		$table = '<table style="padding:4xpx;">';
		$table .= '<tr>
						<th style="font-size: 26px;color: red">Lunas</th>
					</tr>';
		$table .= '</table>';
		$pdf->WriteHTMLCell(0, 0, 125, '', $table, 0, 1, 0, true, 'R', true);

		$now = date('d-m-Y');

		$pdf->lastPage();
		// ob_clean();
		foreach ($karyawan as $row) {
			$nama = $row->nama;
		}
		$pdf->Output('SlipGaji-' . $nama . '-' . $date . '.pdf', 'I');
	}
}
