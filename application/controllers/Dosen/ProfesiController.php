<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfesiController extends CI_Controller
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
				'title' => "Organisasi Profesi"
			);
			$id = $this->session->userdata('id');
			$data['profesi']	 	= $this->db->query("SELECT * FROM profesi_dosen WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/profesi/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Organisasi Profesi"
			);
			$this->load->view('pages/Dosen/profesi/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$nama  	            	= $this->input->post('nama');
		$tahun  	           	= $this->input->post('tahun');
		$penyelenggara  	    = $this->input->post('penyelenggara');
		$periode  	    		= $this->input->post('periode');
		$max_size				= 2000000;

		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/dosen/doc_profesi/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/penunjang/profesi/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'nama'				=> $nama,
			'tahun'				=> $tahun,
			'penyelenggara'		=> $penyelenggara,
			'periode'			=> $periode,
			'doc'				=> $file_name,
		);

		$this->db->insert('profesi_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/penunjang/profesi');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Organisasi Profesi"
			);
			$data['profesi'] 			= $this->db->query("SELECT * FROM profesi_dosen WHERE id='$id'")->result();
			$this->load->view('pages/Dosen/profesi/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$nama  	            	= $this->input->post('nama');
		$tahun  	           	= $this->input->post('tahun');
		$penyelenggara  	    = $this->input->post('penyelenggara');
		$periode  	    		= $this->input->post('periode');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'profesi_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/dosen/doc_profesi/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/dosen/doc_profesi/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 	= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'doc'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('profesi_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/penunjang/profesi/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'nama'				=> $nama,
			'tahun'				=> $tahun,
			'penyelenggara'		=> $penyelenggara,
			'periode'			=> $periode,
		);

		$where = array('id' => $id);
		$this->db->update('profesi_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/penunjang/profesi');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'profesi_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/dosen/doc_profesi/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('profesi_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/penunjang/profesi');
	}
}
