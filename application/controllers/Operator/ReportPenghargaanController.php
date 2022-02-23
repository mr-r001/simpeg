<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPenghargaanController extends CI_Controller
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
				'title' => "Laporan Data Penghargaan"
			);
			$data['penghargaan'] 	= $this->db->query("SELECT *, penghargaan_dosen.nama as nama_penghargaan FROM penghargaan_dosen 
			INNER JOIN users ON penghargaan_dosen.id_user = users.id 
			INNER JOIN tingkatan ON penghargaan_dosen.id_tingkatan = tingkatan.id")->result_array();

			$this->load->view('pages/Operator/report-penghargaan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Penghargaan"
			);

			$this->load->view('pages/Operator/report-penghargaan/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$from 	= (int)$this->input->post('from');
		$to 	= (int)$this->input->post('to');

		$data['penghargaan'] 	= $this->db->query("SELECT *, penghargaan_dosen.nama as nama_penghargaan FROM penghargaan_dosen 
			INNER JOIN users ON penghargaan_dosen.id_user = users.id 
			INNER JOIN tingkatan ON penghargaan_dosen.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$this->load->library('mypdf');
		$this->mypdf->generate('pages/Operator/report-penghargaan/pdf', $data, 'laporan', 'A4', 'landscape');
	}
}
