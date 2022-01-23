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
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Dashboard"
			);
			$id = $this->session->userdata('id');
			$user 							= $this->db->query("SELECT * FROM users INNER JOIN prodi ON prodi.id = users.id_prodi WHERE users.id = $id")->result();

			$prodi							= $user[0]->id_prodi;
			$data['prodi']					= $user[0]->nama_prodi;
			$data['dosen'] 					= $this->db->query("SELECT * FROM personal_dosen WHERE id_prodi = $prodi")->num_rows();
			$data['pegawai'] 				= $this->db->query("SELECT * FROM personal_pegawai WHERE id_prodi = $prodi")->num_rows();

			$this->load->view('pages/Operator/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
