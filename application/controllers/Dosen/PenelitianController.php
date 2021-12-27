<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenelitianController extends CI_Controller
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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Penelitian"
			);
			$id = $this->session->userdata('id');
			$data['penelitian']	 	= $this->db->query("SELECT *, penelitian_dosen.id as id FROM penelitian_dosen INNER JOIN tingkatan ON penelitian_dosen.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/penelitian/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data penelitian"
			);
			$data['tingkatan'] 	= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/penelitian/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$jenis  	            = $this->input->post('jenis');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$judul  	            = $this->input->post('judul');
		$tahun  	            = $this->input->post('tahun');
		$publikasi  	        = $this->input->post('publikasi');
		$max_size				= 2000000;


		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/dosen/doc_penelitian/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/tridharma/penelitian/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'jenis'				=> $jenis,
			'id_tingkatan'		=> $id_tingkatan,
			'judul'				=> $judul,
			'tahun'				=> $tahun,
			'publikasi'			=> $publikasi,
			'doc'				=> $file_name,
		);

		$this->db->insert('penelitian_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/tridharma/penelitian');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data penelitian"
			);
			$data['penelitian'] 		= $this->db->query("SELECT * FROM penelitian_dosen WHERE id='$id'")->result();
			$data['tingkatan'] 			= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/penelitian/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$jenis  	            = $this->input->post('jenis');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$judul  	            = $this->input->post('judul');
		$tahun  	            = $this->input->post('tahun');
		$publikasi  	        = $this->input->post('publikasi');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'penelitian_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/dosen/doc_penelitian/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/dosen/doc_penelitian/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 	= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'doc'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('penelitian_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/tridharma/penelitian/edit');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'jenis'				=> $jenis,
			'id_tingkatan'		=> $id_tingkatan,
			'judul'				=> $judul,
			'tahun'				=> $tahun,
			'publikasi'			=> $publikasi,
		);
		$where = array('id' => $id);
		$this->db->update('penelitian_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/tridharma/penelitian');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'penelitian_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/dosen/doc_penelitian/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('penelitian_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/tridharma/penelitian');
	}
}
