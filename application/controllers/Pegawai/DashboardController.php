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
			$data['tetap'] 				= $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen=1")->num_rows();
			$data['tidak_tetap'] 		= $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen=2")->num_rows();
			$data['sesuai'] 			= $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen_skills=1")->num_rows();
			$data['tidak_sesuai'] 		= $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen_skills=2")->num_rows();
			$data['teknisi'] 			= $this->db->query("SELECT * FROM personal_pegawai WHERE id_kategori=5")->num_rows();
			$data['laboran'] 			= $this->db->query("SELECT * FROM personal_pegawai WHERE id_kategori=6")->num_rows();
			$data['administrasi'] 		= $this->db->query("SELECT * FROM personal_pegawai WHERE id_kategori=7")->num_rows();
			$data['arsiparis'] 			= $this->db->query("SELECT * FROM personal_pegawai WHERE id_kategori=8")->num_rows();

			$data['tetap_sesuai'] 		= $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen=1 AND id_dosen_skills=1")->num_rows();
			$data['tetap_tidak_sesuai'] = $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen=1 AND id_dosen_skills=2")->num_rows();

			$data['tidak_tetap_sesuai'] = $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen=2 AND id_dosen_skills=1")->num_rows();
			$data['tidak_tetap_tidak_sesuai'] = $this->db->query("SELECT * FROM personal_dosen WHERE id_dosen=2 AND id_dosen_skills=2")->num_rows();
			$this->load->view('pages/Pegawai/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
