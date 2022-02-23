<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPenelitianController extends CI_Controller
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
				'title' => "Laporan Data Penelitian"
			);
			$penelitian 	= $this->db->query("SELECT * FROM penelitian_dosen 
			INNER JOIN users ON penelitian_dosen.id_user = users.id 
			INNER JOIN tingkatan ON penelitian_dosen.id_tingkatan = tingkatan.id")->result_array();

			$buku 			= $this->db->query("SELECT * FROM buku_dosen 
			INNER JOIN users ON buku_dosen.id_user = users.id 
			INNER JOIN tingkatan ON buku_dosen.id_tingkatan = tingkatan.id")->result_array();

			$haki 			= $this->db->query("SELECT * FROM haki_dosen 
			INNER JOIN users ON haki_dosen.id_user = users.id 
			INNER JOIN tingkatan ON haki_dosen.id_tingkatan = tingkatan.id")->result_array();

			$data['penelitian'] = (object) array_merge(
				(array) $penelitian,
				(array) $buku,
				(array) $haki
			);

			$this->load->view('pages/Operator/report-penelitian/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Penelitian"
			);

			$this->load->view('pages/Operator/report-penelitian/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$filter = $this->input->post('filter');
		if ($filter === "0") {
			$penelitian 	= $this->db->query("SELECT * FROM penelitian_dosen 
			INNER JOIN users ON penelitian_dosen.id_user = users.id 
			INNER JOIN tingkatan ON penelitian_dosen.id_tingkatan = tingkatan.id")->result_array();

			$buku 			= $this->db->query("SELECT * FROM buku_dosen 
			INNER JOIN users ON buku_dosen.id_user = users.id 
			INNER JOIN tingkatan ON buku_dosen.id_tingkatan = tingkatan.id")->result_array();

			$haki 			= $this->db->query("SELECT * FROM haki_dosen 
			INNER JOIN users ON haki_dosen.id_user = users.id 
			INNER JOIN tingkatan ON haki_dosen.id_tingkatan = tingkatan.id")->result_array();

			$penelitian = (object) array_merge(
				(array) $penelitian,
				(array) $buku,
				(array) $haki
			);

			$data['penelitian'] = $penelitian;

			$this->load->library('mypdf');
			$this->mypdf->generate('pages/Operator/report-penelitian/pdf', $data, 'laporan', 'A4', 'landscape');
		} else {
			if ($filter === "1") {
				$data['penelitian'] 	= $this->db->query("SELECT * FROM penelitian_dosen 
				INNER JOIN users ON penelitian_dosen.id_user = users.id 
				INNER JOIN tingkatan ON penelitian_dosen.id_tingkatan = tingkatan.id")->result_array();
			} elseif ($filter === "2") {
				$data['penelitian'] 	= $this->db->query("SELECT * FROM buku_dosen 
				INNER JOIN users ON buku_dosen.id_user = users.id 
				INNER JOIN tingkatan ON buku_dosen.id_tingkatan = tingkatan.id")->result_array();
			} elseif ($filter === "3") {
				$data['penelitian'] 	= $this->db->query("SELECT * FROM haki_dosen 
				INNER JOIN users ON haki_dosen.id_user = users.id 
				INNER JOIN tingkatan ON haki_dosen.id_tingkatan = tingkatan.id")->result_array();
			}

			$this->load->library('mypdf');
			$this->mypdf->generate('pages/Operator/report-penelitian/pdf', $data, 'laporan', 'A4', 'landscape');
		}
	}
}
