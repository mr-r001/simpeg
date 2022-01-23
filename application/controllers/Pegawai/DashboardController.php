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
			$id		= $this->session->userdata('id');

			$data['pribadi'] 			= $this->db->query("SELECT * FROM personal_pegawai INNER JOIN users ON users.id = personal_pegawai.id_user  INNER JOIN fakultas ON personal_pegawai.id_fakultas = fakultas.id INNER JOIN prodi ON personal_pegawai.id_prodi = prodi.id  WHERE id_user = $id")->result();

			$data['pendidikan']	 	= $this->db->query("SELECT *, pendidikan_pegawai.id as id  FROM pendidikan_pegawai INNER JOIN jenjang_pendidikan ON pendidikan_pegawai.id_pendidikan = jenjang_pendidikan.id WHERE id_user = $id")->result();

			$data['kepangkatan']	 	= $this->db->query("SELECT *, golongan.name as golname, kategori.name as katname FROM kepangkatan_pegawai INNER JOIN golongan ON golongan.id = kepangkatan_pegawai.id_golongan INNER JOIN kategori ON kategori.id = kepangkatan_pegawai.id_kategori WHERE id_user = $id")->result();

			$this->load->view('pages/Pegawai/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
