<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SeminarController extends CI_Controller
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
				'title' => "Data Seminar"
			);
			$id = $this->session->userdata('id');
			$data['seminar']	 	= $this->db->query("SELECT *, seminar_pegawai.id as id FROM seminar_pegawai INNER JOIN tingkatan ON seminar_pegawai.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
			$this->load->view('pages/Pegawai/seminar/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Data Seminar"
			);
			$data['tingkatan'] 	= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Pegawai/seminar/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$judul  	            = $this->input->post('judul');
		$tahun  	           	= $this->input->post('tahun');
		$kota  	        		= $this->input->post('kota');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$max_size				= 3000000;

		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/pegawai/sertif_seminar/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('pegawai/pelatihan/seminar/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'tahun'				=> $tahun,
			'id_tingkatan'		=> $id_tingkatan,
			'kota'				=> $kota,
			'sertifikat'		=> $file_name,
		);

		$this->db->insert('seminar_pegawai', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('pegawai/pelatihan/seminar');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Data Seminar"
			);
			$data['seminar'] 		= $this->db->query("SELECT * FROM seminar_pegawai WHERE id='$id'")->result();
			$data['tingkatan'] 			= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/pegawai/seminar/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$judul  	            = $this->input->post('judul');
		$tahun  	           	= $this->input->post('tahun');
		$kota  	        		= $this->input->post('kota');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$max_size				= 3000000;

		$result					= $this->M_Dosen->check($id, 'seminar_pegawai');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['sertifikat'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/pegawai/sertif_seminar/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/pegawai/sertif_seminar/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 	= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'sertifikat'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('seminar_pegawai', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('pegawai/pelatihan/seminar/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'tahun'				=> $tahun,
			'id_tingkatan'		=> $id_tingkatan,
			'kota'				=> $kota,
		);

		$where = array('id' => $id);
		$this->db->update('seminar_pegawai', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('pegawai/pelatihan/seminar');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'seminar_pegawai');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['sertifikat'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/pegawai/sertif_seminar/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('seminar_pegawai', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('pegawai/pelatihan/seminar');
	}
}
