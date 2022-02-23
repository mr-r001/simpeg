<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPelatihanController extends CI_Controller
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
				'title' => "Laporan Data Pelatihan"
			);
			$seminar 	= $this->db->query("SELECT * FROM seminar_dosen 
			INNER JOIN users ON seminar_dosen.id_user = users.id 
			INNER JOIN tingkatan ON seminar_dosen.id_tingkatan = tingkatan.id")->result_array();

			$workshop 	= $this->db->query("SELECT * FROM workshop_dosen 
			INNER JOIN users ON workshop_dosen.id_user = users.id 
			INNER JOIN tingkatan ON workshop_dosen.id_tingkatan = tingkatan.id")->result_array();

			$kursus 	= $this->db->query("SELECT * FROM kursus_dosen 
			INNER JOIN users ON kursus_dosen.id_user = users.id 
			INNER JOIN tingkatan ON kursus_dosen.id_tingkatan = tingkatan.id")->result_array();

			$pelatihan 	= $this->db->query("SELECT * FROM pelatihan_dosen 
			INNER JOIN users ON pelatihan_dosen.id_user = users.id 
			INNER JOIN tingkatan ON pelatihan_dosen.id_tingkatan = tingkatan.id")->result_array();

			$lainnya 	= $this->db->query("SELECT * FROM lainnya_dosen 
			INNER JOIN users ON lainnya_dosen.id_user = users.id 
			INNER JOIN tingkatan ON lainnya_dosen.id_tingkatan = tingkatan.id")->result_array();



			$data['pelatihan'] = (object) array_merge(
				(array) $seminar,
				(array) $workshop,
				(array) $kursus,
				(array) $pelatihan,
				(array) $lainnya,
			);

			$this->load->view('pages/Operator/report-pelatihan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function filter()
	{
		if ($this->session->userdata('role') === '4') {
			$data = array(
				'title' => "Laporan Data Pelatihan"
			);

			$this->load->view('pages/Operator/report-pelatihan/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$from 	= (int)$this->input->post('from');
		$to 	= (int)$this->input->post('to');

		$seminar 	= $this->db->query("SELECT * FROM seminar_dosen 
			INNER JOIN users ON seminar_dosen.id_user = users.id 
			INNER JOIN tingkatan ON seminar_dosen.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$workshop 	= $this->db->query("SELECT * FROM workshop_dosen 
			INNER JOIN users ON workshop_dosen.id_user = users.id 
			INNER JOIN tingkatan ON workshop_dosen.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$kursus 	= $this->db->query("SELECT * FROM kursus_dosen 
			INNER JOIN users ON kursus_dosen.id_user = users.id 
			INNER JOIN tingkatan ON kursus_dosen.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$pelatihan 	= $this->db->query("SELECT * FROM pelatihan_dosen 
			INNER JOIN users ON pelatihan_dosen.id_user = users.id 
			INNER JOIN tingkatan ON pelatihan_dosen.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$lainnya 	= $this->db->query("SELECT * FROM lainnya_dosen 
			INNER JOIN users ON lainnya_dosen.id_user = users.id 
			INNER JOIN tingkatan ON lainnya_dosen.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();



		$data['pelatihan'] = (object) array_merge(
			(array) $seminar,
			(array) $workshop,
			(array) $kursus,
			(array) $pelatihan,
			(array) $lainnya,
		);

		$this->load->library('mypdf');
		$this->mypdf->generate('pages/Operator/report-pelatihan/pdf', $data, 'laporan', 'A4', 'landscape');
	}
}
