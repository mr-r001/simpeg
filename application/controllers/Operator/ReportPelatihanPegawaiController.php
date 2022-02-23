<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportPelatihanPegawaiController extends CI_Controller
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
			$seminar 	= $this->db->query("SELECT * FROM seminar_pegawai 
			INNER JOIN users ON seminar_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON seminar_pegawai.id_tingkatan = tingkatan.id")->result_array();

			$workshop 	= $this->db->query("SELECT * FROM workshop_pegawai 
			INNER JOIN users ON workshop_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON workshop_pegawai.id_tingkatan = tingkatan.id")->result_array();

			$kursus 	= $this->db->query("SELECT * FROM kursus_pegawai 
			INNER JOIN users ON kursus_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON kursus_pegawai.id_tingkatan = tingkatan.id")->result_array();

			$pelatihan 	= $this->db->query("SELECT * FROM pelatihan_pegawai 
			INNER JOIN users ON pelatihan_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON pelatihan_pegawai.id_tingkatan = tingkatan.id")->result_array();

			$lainnya 	= $this->db->query("SELECT * FROM lainnya_pegawai 
			INNER JOIN users ON lainnya_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON lainnya_pegawai.id_tingkatan = tingkatan.id")->result_array();



			$data['pelatihan'] = (object) array_merge(
				(array) $seminar,
				(array) $workshop,
				(array) $kursus,
				(array) $pelatihan,
				(array) $lainnya,
			);

			$this->load->view('pages/Operator/report-pelatihan-pegawai/index.php', $data);
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

			$this->load->view('pages/Operator/report-pelatihan-pegawai/filter.php', $data);
		} else {
			redirect('/');
		}
	}

	public function download()
	{
		$from 	= (int)$this->input->post('from');
		$to 	= (int)$this->input->post('to');

		$seminar 	= $this->db->query("SELECT * FROM seminar_pegawai 
			INNER JOIN users ON seminar_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON seminar_pegawai.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$workshop 	= $this->db->query("SELECT * FROM workshop_pegawai 
			INNER JOIN users ON workshop_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON workshop_pegawai.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$kursus 	= $this->db->query("SELECT * FROM kursus_pegawai 
			INNER JOIN users ON kursus_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON kursus_pegawai.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$pelatihan 	= $this->db->query("SELECT * FROM pelatihan_pegawai 
			INNER JOIN users ON pelatihan_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON pelatihan_pegawai.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();

		$lainnya 	= $this->db->query("SELECT * FROM lainnya_pegawai 
			INNER JOIN users ON lainnya_pegawai.id_user = users.id 
			INNER JOIN tingkatan ON lainnya_pegawai.id_tingkatan = tingkatan.id
			WHERE tahun >= $from and tahun <= $to")->result_array();



		$data['pelatihan'] = (object) array_merge(
			(array) $seminar,
			(array) $workshop,
			(array) $kursus,
			(array) $pelatihan,
			(array) $lainnya,
		);

		$this->load->library('mypdf');
		$this->mypdf->generate('pages/Operator/report-pelatihan-pegawai/pdf', $data, 'laporan', 'A4', 'landscape');
	}
}
