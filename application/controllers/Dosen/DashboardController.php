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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Dashboard"
			);
			$id		= $this->session->userdata('id');

			$data['pribadi'] 			= $this->db->query("SELECT * FROM personal_dosen INNER JOIN users ON users.id = personal_dosen.id_user  INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id  WHERE id_user = $id")->result();

			$data['pendidikan']	 	= $this->db->query("SELECT *, pendidikan_dosen.id as id  FROM pendidikan_dosen INNER JOIN jenjang_pendidikan ON pendidikan_dosen.id_pendidikan = jenjang_pendidikan.id WHERE id_user = $id")->result();

			$data['kepangkatan']	 	= $this->db->query("SELECT * FROM kepangkatan_dosen INNER JOIN golongan ON golongan.id = kepangkatan_dosen.id_golongan WHERE id_user = $id")->result();

			$this->load->view('pages/Dosen/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
