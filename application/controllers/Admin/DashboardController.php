<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
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
				'title' => "Dashboard"
			);

			$data['pegawai'] 					= $this->db->query('SELECT * FROM pegawai')->num_rows();
			$data['jabatan'] 					= $this->db->query('SELECT * FROM jabatan')->num_rows();
			$data['absensi']		 			= $this->db->query('SELECT * FROM absensi')->num_rows();
			$data['laporan']		 			= $this->db->query('SELECT * FROM gaji')->num_rows();
			$data['periode']	 				= $this->db->query("SELECT bulan, tahun, count(id_pegawai) as jumlah_karyawan, sum(gaji_bersih) as total FROM gaji GROUP BY bulan LIMIT 6")->result();
			$this->load->view('pages/Admin/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
