<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPegawaiController extends CI_Controller
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
				'title' => "Laporan Data Pegawai"
			);
			$data['pribadi'] 			= $this->db->query("SELECT *, fakultas.name as nama_fakultas FROM personal_pegawai 
			INNER JOIN users ON users.id = personal_pegawai.id_user 
			INNER JOIN fakultas ON personal_pegawai.id_fakultas = fakultas.id 
			INNER JOIN prodi ON personal_pegawai.id_prodi = prodi.id 
			INNER JOIN pegawai ON personal_pegawai.id_pegawai = pegawai.id 
			INNER JOIN kategori ON personal_pegawai.id_kategori = kategori.id")->result();

			$this->load->view('pages/Operator/report-pegawai/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Pegawai"
			);

			$this->load->view('pages/Operator/report-pegawai/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$filter = $this->input->post('filter');
		$data = [];
		if ($filter === "0") {
			$data['pegawai'] 	= $this->db->query("SELECT *, fakultas.name as nama_fakultas FROM personal_pegawai 
			INNER JOIN users ON users.id = personal_pegawai.id_user 
			INNER JOIN fakultas ON personal_pegawai.id_fakultas = fakultas.id 
			INNER JOIN prodi ON personal_pegawai.id_prodi = prodi.id 
			INNER JOIN pegawai ON personal_pegawai.id_pegawai = pegawai.id 
			INNER JOIN kategori ON personal_pegawai.id_kategori = kategori.id")->result();
		} else {
			$data['pegawai'] 	= $this->db->query("SELECT *, fakultas.name as nama_fakultas FROM personal_pegawai 
			INNER JOIN users ON users.id = personal_pegawai.id_user 
			INNER JOIN fakultas ON personal_pegawai.id_fakultas = fakultas.id 
			INNER JOIN prodi ON personal_pegawai.id_prodi = prodi.id 
			INNER JOIN pegawai ON personal_pegawai.id_pegawai = pegawai.id 
			INNER JOIN kategori ON personal_pegawai.id_kategori = kategori.id 
			WHERE id_kategori = $filter")->result();
		}

		$this->load->library('mypdf');
		$this->mypdf->generate('pages/Operator/report-pegawai/pdf', $data, 'laporan', 'A4', 'landscape');
	}
}
