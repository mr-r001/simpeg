<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PanitiaController extends CI_Controller
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
				'title' => "Panitia Kegiatan"
			);
			$id = $this->session->userdata('id');
			$data['panitia']	 	= $this->db->query("SELECT *, panitia_dosen.id as id FROM panitia_dosen INNER JOIN kepanitiaan ON panitia_dosen.id_status = kepanitiaan.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/panitia/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Panitia Kegiatan"
			);
			$data['status'] 	= $this->db->query("SELECT * FROM kepanitiaan")->result();
			$this->load->view('pages/Dosen/panitia/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$nama  	            	= $this->input->post('nama');
		$id_status  	    	= $this->input->post('id_status');
		$tahun  	           	= $this->input->post('tahun');
		$penyelenggara  	    = $this->input->post('penyelenggara');
		$max_size				= 2000000;

		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/dosen/doc_panitia/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 			= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/penunjang/panitia/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'nama'				=> $nama,
			'id_status'			=> $id_status,
			'tahun'				=> $tahun,
			'penyelenggara'		=> $penyelenggara,
			'doc'				=> $file_name,
		);

		$this->db->insert('panitia_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/penunjang/panitia');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Panitia Kegiatan"
			);
			$data['panitia'] 			= $this->db->query("SELECT * FROM panitia_dosen WHERE id='$id'")->result();
			$data['status'] 			= $this->db->query("SELECT * FROM kepanitiaan")->result();
			$this->load->view('pages/Dosen/panitia/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$nama  	            	= $this->input->post('nama');
		$id_status  	    	= $this->input->post('id_status');
		$tahun  	           	= $this->input->post('tahun');
		$penyelenggara  	    = $this->input->post('penyelenggara');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'panitia_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/dosen/doc_panitia/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/dosen/doc_panitia/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 			= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'doc'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('panitia_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/penunjang/panitia/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'nama'				=> $nama,
			'id_status'			=> $id_status,
			'tahun'				=> $tahun,
			'penyelenggara'		=> $penyelenggara,
		);

		$where = array('id' => $id);
		$this->db->update('panitia_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/penunjang/panitia');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'panitia_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/dosen/doc_panitia/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('panitia_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/penunjang/panitia');
	}
}
