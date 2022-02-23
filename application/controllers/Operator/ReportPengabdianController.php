<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPengabdianController extends CI_Controller
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
				'title' => "Laporan Data Pengabdian"
			);
			$pengabdian 	= $this->db->query("SELECT * FROM pengabdian_dosen 
			INNER JOIN users ON pengabdian_dosen.id_user = users.id 
			INNER JOIN team ON pengabdian_dosen.id_status = team.id")->result_array();

			$pemateri 		= $this->db->query("SELECT *, pemateri.pemateri as team FROM pemateri_dosen 
			INNER JOIN users ON pemateri_dosen.id_user = users.id 
			INNER JOIN pemateri ON pemateri_dosen.id_pemateri = pemateri.id")->result_array();


			$data['penelitian'] = (object) array_merge(
				(array) $pengabdian,
				(array) $pemateri
			);

			$this->load->view('pages/Operator/report-pengabdian/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Pengabdian"
			);

			$this->load->view('pages/Operator/report-pengabdian/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$filter = $this->input->post('filter');
		if ($filter === "0") {
			$pengabdian 	= $this->db->query("SELECT * FROM pengabdian_dosen 
			INNER JOIN users ON pengabdian_dosen.id_user = users.id 
			INNER JOIN team ON pengabdian_dosen.id_status = team.id")->result_array();

			$pemateri 		= $this->db->query("SELECT *, pemateri.pemateri as team FROM pemateri_dosen 
			INNER JOIN users ON pemateri_dosen.id_user = users.id 
			INNER JOIN pemateri ON pemateri_dosen.id_pemateri = pemateri.id")->result_array();


			$data['penelitian'] = (object) array_merge(
				(array) $pengabdian,
				(array) $pemateri
			);
			$this->load->library('mypdf');
			$this->mypdf->generate('pages/Operator/report-pengabdian/pdf', $data, 'laporan', 'A4', 'landscape');
		} else {
			if ($filter === "1") {
				$data['penelitian'] 	= $this->db->query("SELECT * FROM pengabdian_dosen 
				INNER JOIN users ON pengabdian_dosen.id_user = users.id 
				INNER JOIN team ON pengabdian_dosen.id_status = team.id")->result_array();
			} elseif ($filter === "2") {
				$data['penelitian'] 		= $this->db->query("SELECT *, pemateri.pemateri as team FROM pemateri_dosen 
				INNER JOIN users ON pemateri_dosen.id_user = users.id 
				INNER JOIN pemateri ON pemateri_dosen.id_pemateri = pemateri.id")->result_array();
			}

			$this->load->library('mypdf');
			$this->mypdf->generate('pages/Operator/report-pengabdian/pdf', $data, 'laporan', 'A4', 'landscape');
		}
	}
}
