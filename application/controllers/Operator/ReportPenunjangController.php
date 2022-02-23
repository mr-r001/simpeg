<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPenunjangController extends CI_Controller
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
				'title' => "Laporan Data Penunjang"
			);
			$panitia 	= $this->db->query("SELECT *, panitia_dosen.nama as nama_kegiatan FROM panitia_dosen 
			INNER JOIN users ON panitia_dosen.id_user = users.id")->result_array();

			$profesi 		= $this->db->query("SELECT *, profesi_dosen.nama as nama_kegiatan FROM profesi_dosen 
			INNER JOIN users ON profesi_dosen.id_user = users.id")->result_array();

			$nonprofesi 	= $this->db->query("SELECT *, nonprofesi_dosen.nama as nama_kegiatan FROM nonprofesi_dosen 
			INNER JOIN users ON nonprofesi_dosen.id_user = users.id")->result_array();

			$data['penelitian'] = (object) array_merge(
				(array) $panitia,
				(array) $profesi,
				(array) $nonprofesi
			);

			$this->load->view('pages/Operator/report-penunjang/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Penunjang"
			);

			$this->load->view('pages/Operator/report-penunjang/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$from 	= (int)$this->input->post('from');
		$to 	= (int)$this->input->post('to');

		$panitia 	= $this->db->query("SELECT *, panitia_dosen.nama as nama_kegiatan FROM panitia_dosen 
			INNER JOIN users ON panitia_dosen.id_user = users.id WHERE tahun >= $from and tahun <= $to ")->result_array();

		$profesi 		= $this->db->query("SELECT *, profesi_dosen.nama as nama_kegiatan FROM profesi_dosen 
			INNER JOIN users ON profesi_dosen.id_user = users.id WHERE tahun >= $from and tahun <= $to")->result_array();

		$nonprofesi 	= $this->db->query("SELECT *, nonprofesi_dosen.nama as nama_kegiatan FROM nonprofesi_dosen 
			INNER JOIN users ON nonprofesi_dosen.id_user = users.id WHERE tahun >= $from and tahun <= $to")->result_array();



		$data['penelitian'] = (object) array_merge(
			(array) $panitia,
			(array) $profesi,
			(array) $nonprofesi
		);

		$this->load->library('mypdf');
		$this->mypdf->generate('pages/Operator/report-penunjang/pdf', $data, 'laporan', 'A4', 'landscape');
	}
}
