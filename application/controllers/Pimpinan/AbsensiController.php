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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Absensi"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pegawai INNER JOIN absensi ON pegawai.id_pegawai = absensi.id_pegawai")->result();
			$this->load->view('pages/Pimpinan/absensi/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
