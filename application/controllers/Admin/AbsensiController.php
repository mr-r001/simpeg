<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AbsensiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Absensi"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pegawai INNER JOIN absensi ON pegawai.id_pegawai = absensi.id_pegawai")->result();
			$this->load->view('pages/Admin/absensi/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Absensi"
			);

			$table = "absensi";
			$field = "id_absensi";

			$prefix = "AB";

			$lastCode = $this->M_Kode->generate_absensi($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_absensi'], -5, 5);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%05s', $noUrut);

			$data['pegawai']	 	= $this->db->query("SELECT * FROM pegawai")->result();
			$this->load->view('pages/Admin/absensi/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id              		= $this->input->post('id');
		$bulan  	            = $this->input->post('bulan');
		$tahun           		= $this->input->post('tahun');
		$id_pegawai           	= $this->input->post('nip');
		$hadir           		= $this->input->post('hadir');
		$sakit           		= $this->input->post('sakit');
		$ijin           		= $this->input->post('ijin');
		$tanpa           		= $this->input->post('tanpa');

		if ($bulan == 01) {
			$bulan = "Januari";
		} elseif ($bulan == 02) {
			$bulan = "Februari";
		}
		elseif ($bulan == 03) {
			$bulan = "Maret";
		}
		elseif ($bulan == 04) {
			$bulan = "April";
		}
		elseif ($bulan == 05) {
			$bulan = "Mei";
		}
		elseif ($bulan == 06) {
			$bulan = "Juni";
		}
		elseif ($bulan == 07) {
			$bulan = "Juli";
		}
		elseif ($bulan == 8) {
			$bulan = "Agustus";
		}
		elseif ($bulan == 9) {
			$bulan = "September";
		}
		elseif ($bulan == 10) {
			$bulan = "Oktober";
		}
		elseif ($bulan == 11) {
			$bulan = "November";
		}
		elseif ($bulan == 12) {
			$bulan = "Desember";
		}

		$data = array(
			'id_absensi'				=> $id,
			'tanggal'					=> $bulan . ' / ' . $tahun,
			'id_pegawai'				=> $id_pegawai,
			'hadir'						=> $hadir,
			'sakit'						=> $sakit,
			'ijin'						=> $ijin,
			'tanpa_keterangan'			=> $tanpa,
			'potongan'					=> $tanpa * 150000
		);

		$this->db->insert('absensi', $data);
		redirect('admin/absensi');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Absensi"
			);
			$where = array('id' => $id);
			$data['pegawai']	 	= $this->db->query("SELECT * FROM pegawai")->result();
			$data['admin'] = $this->db->query("SELECT SUBSTRING_INDEX(tanggal, ' ',1) AS bulan, RIGHT(tanggal, 4) AS tahun, absensi.id, absensi.id_absensi, absensi.id_pegawai, pegawai.nama FROM absensi INNER JOIN pegawai ON absensi.id_pegawai = pegawai.id_pegawai WHERE absensi.id='$id'")->result();
			$data['sakit'] = $this->db->query("SELECT sakit FROM absensi WHERE id='$id'")->result();
			$data['ijin'] = $this->db->query("SELECT ijin FROM absensi WHERE id='$id'")->result();
			$data['tanpa'] = $this->db->query("SELECT tanpa_keterangan FROM absensi WHERE id='$id'")->result();
			$data['hadir'] = $this->db->query("SELECT hadir FROM absensi WHERE id='$id'")->result();
			$this->load->view('pages/Admin/absensi/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_absensi             = $this->input->post('id_absensi');
		$bulan  	            = $this->input->post('bulan');
		$tahun              	= $this->input->post('tahun');
		$nip           		   	= $this->input->post('nip');
		$nama       	       	= $this->input->post('nama');
		$sakit       	       	= $this->input->post('sakit');
		$ijin       	       	= $this->input->post('ijin');
		$tanpa       	       	= $this->input->post('tanpa');
		$hadir       	       	= $this->input->post('hadir');

		if ($bulan == 01) {
			$bulan = "Januari";
		} elseif ($bulan == 02) {
			$bulan = "Februari";
		}
		elseif ($bulan == 03) {
			$bulan = "Maret";
		}
		elseif ($bulan == 04) {
			$bulan = "April";
		}
		elseif ($bulan == 05) {
			$bulan = "Mei";
		}
		elseif ($bulan == 06) {
			$bulan = "Juni";
		}
		elseif ($bulan == 07) {
			$bulan = "Juli";
		}
		elseif ($bulan == 8) {
			$bulan = "Agustus";
		}
		elseif ($bulan == 9) {
			$bulan = "September";
		}
		elseif ($bulan == 10) {
			$bulan = "Oktober";
		}
		elseif ($bulan == 11) {
			$bulan = "November";
		}
		elseif ($bulan == 12) {
			$bulan = "Desember";
		}

		$data = array(
			'id_absensi'				=> $id_absensi,
			'tanggal'					=> $bulan . ' / ' . $tahun,
			'id_pegawai'				=> $nip,
			'hadir'						=> $hadir,
			'sakit'						=> $sakit,
			'ijin'						=> $ijin,
			'tanpa_keterangan'			=> $tanpa,
			'potongan'					=> $tanpa * 150000
		);

		$where = array('id' => $id);
		$this->db->update('absensi', $data, $where);
		redirect('admin/absensi');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('absensi', $where);
		redirect('admin/absensi');
	}

	public function search()
	{
		$id_pegawai = $_GET['id_pegawai'];

		$result				= $this->db->query("SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'")->row_array();

		echo json_encode($result);
	}

	public function auto()
	{
		$bulan = $_GET['bulan'];
		$tahun = $_GET['tahun'];

		$result = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

		echo json_encode($result);
	}
}
