<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportDosenController extends CI_Controller
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
				'title' => "Laporan Data Dosen"
			);
			$data['pribadi'] 			= $this->db->query("SELECT * FROM personal_dosen
			INNER JOIN users ON personal_dosen.id_user = users.id
			INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id
			INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id
			INNER JOIN dosen ON personal_dosen.id_dosen = dosen.id
			INNER JOIN dosen_skills ON personal_dosen.id_dosen_skills = dosen_skills.id")->result();

			$this->load->view('pages/Operator/report-dosen/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Dosen"
			);

			$this->load->view('pages/Operator/report-dosen/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$filter = $this->input->post('filter');
		if ($filter === "0") {
			$data['dosen'] 	= $this->db->query("SELECT * FROM personal_dosen INNER JOIN users ON users.id = personal_dosen.id_user  INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id INNER JOIN dosen ON dosen.id = personal_dosen.id_dosen INNER JOIN dosen_skills ON dosen_skills.id = personal_dosen.id_dosen_skills")->result();
		} elseif ($filter === "1") {
			$data['dosen'] 	= $this->db->query("SELECT * FROM personal_dosen INNER JOIN users ON users.id = personal_dosen.id_user  INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id INNER JOIN dosen ON dosen.id = personal_dosen.id_dosen INNER JOIN dosen_skills ON dosen_skills.id = personal_dosen.id_dosen_skills WHERE id_dosen=1")->result();
		} elseif ($filter === "2") {
			$data['dosen'] 	= $this->db->query("SELECT * FROM personal_dosen INNER JOIN users ON users.id = personal_dosen.id_user  INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id INNER JOIN dosen ON dosen.id = personal_dosen.id_dosen INNER JOIN dosen_skills ON dosen_skills.id = personal_dosen.id_dosen_skills WHERE id_dosen=2")->result();
		} elseif ($filter === "3") {
			$data['dosen'] 	= $this->db->query("SELECT * FROM personal_dosen INNER JOIN users ON users.id = personal_dosen.id_user  INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id INNER JOIN dosen ON dosen.id = personal_dosen.id_dosen INNER JOIN dosen_skills ON dosen_skills.id = personal_dosen.id_dosen_skills WHERE id_dosen=1 AND id_dosen_skills=1")->result();
		} elseif ($filter === "4") {
			$data['dosen'] 	= $this->db->query("SELECT * FROM personal_dosen INNER JOIN users ON users.id = personal_dosen.id_user  INNER JOIN fakultas ON personal_dosen.id_fakultas = fakultas.id INNER JOIN prodi ON personal_dosen.id_prodi = prodi.id INNER JOIN dosen ON dosen.id = personal_dosen.id_dosen INNER JOIN dosen_skills ON dosen_skills.id = personal_dosen.id_dosen_skills WHERE id_dosen=1 AND id_dosen_skills=2")->result();
		}

		$this->load->library('mypdf');
		$this->mypdf->generate('pages/Operator/report-dosen/pdf', $data, 'laporan', 'A4', 'landscape');
	}
}
