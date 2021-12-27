<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemateriController extends CI_Controller
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
				'title' => "Pemateri/Narasumber"
			);
			$id = $this->session->userdata('id');
			$data['pemateri']	 	= $this->db->query("SELECT *, pemateri_dosen.id as id FROM pemateri_dosen INNER JOIN pemateri ON pemateri_dosen.id_pemateri = pemateri.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/pemateri/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Pemateri/Narasumber"
			);
			$data['status'] 	= $this->db->query("SELECT * FROM pemateri")->result();
			$this->load->view('pages/Dosen/pemateri/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$judul  	            = $this->input->post('judul');
		$penyelenggara  	    = $this->input->post('penyelenggara');
		$id_pemateri  	    	= $this->input->post('id_pemateri');
		$tahun  	           	= $this->input->post('tahun');
		$max_size				= 2000000;

		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/dosen/doc_pemateri/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/tridharma/pemateri/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'penyelenggara'		=> $penyelenggara,
			'id_pemateri'		=> $id_pemateri,
			'tahun'				=> $tahun,
			'doc'				=> $file_name,
		);

		$this->db->insert('pemateri_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/tridharma/pemateri');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Pemateri/Narasumber"
			);
			$data['pemateri'] 			= $this->db->query("SELECT * FROM pemateri_dosen WHERE id='$id'")->result();
			$data['status'] 			= $this->db->query("SELECT * FROM pemateri")->result();
			$this->load->view('pages/Dosen/pemateri/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$judul  	            = $this->input->post('judul');
		$penyelenggara  	    = $this->input->post('penyelenggara');
		$id_pemateri  	    	= $this->input->post('id_pemateri');
		$tahun  	           	= $this->input->post('tahun');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'pemateri_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/dosen/doc_pemateri/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/dosen/doc_pemateri/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 	= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'doc'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('pemateri_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/tridharma/pemateri/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'penyelenggara'		=> $penyelenggara,
			'id_pemateri'		=> $id_pemateri,
			'tahun'				=> $tahun,
		);

		$where = array('id' => $id);
		$this->db->update('pemateri_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/tridharma/pemateri');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'pemateri_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/dosen/doc_pemateri/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('pemateri_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/tridharma/pemateri');
	}
}
