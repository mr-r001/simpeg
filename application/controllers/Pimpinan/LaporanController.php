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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Laporan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pegawai INNER JOIN gaji ON pegawai.id_pegawai = gaji.id_pegawai")->result();
			$this->load->view('pages/Pimpinan/laporan/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
