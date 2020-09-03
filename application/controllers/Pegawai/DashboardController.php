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
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Dashboard"
			);
			$id = $this->session->userdata('id');
			$data['admin']	 					= $this->db->query("SELECT * FROM jabatan INNER JOIN pegawai ON jabatan.id_jabatan = pegawai.id_jabatan INNER JOIN gaji ON pegawai.id_pegawai = gaji.id_pegawai WHERE pegawai.id_pegawai = '$id' ORDER BY tanggal DESC LIMIT 6")->result();
			$data['jabatan']					= $this->db->query("SELECT nama_jabatan FROM jabatan INNER JOIN pegawai ON jabatan.id_jabatan = pegawai.id_jabatan WHERE pegawai.id_pegawai = '$id'")->result();
			$this->load->view('pages/Pegawai/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
