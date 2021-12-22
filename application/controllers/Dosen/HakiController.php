<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakiController extends CI_Controller
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
				'title' => "Data HAKI"
			);
			$id = $this->session->userdata('id');
			$data['haki']	 	= $this->db->query("SELECT *, haki_dosen.id as id FROM haki_dosen INNER JOIN tingkatan ON haki_dosen.id_tingkatan = tingkatan.id INNER JOIN haki ON haki_dosen.id_kategori = haki.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/haki/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data HAKI"
			);
			$data['kategori'] 	= $this->db->query("SELECT * FROM haki")->result();
			$data['tingkatan'] 	= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/haki/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id_kategori  	    	= $this->input->post('id_kategori');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$judul  	            = $this->input->post('judul');
		$tahun  	           	= $this->input->post('tahun');
		$max_size				= 2000000;

		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/dosen/doc_haki/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 	= "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/tridharma/haki/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'id_kategori'		=> $id_kategori,
			'id_tingkatan'		=> $id_tingkatan,
			'judul'				=> $judul,
			'tahun'				=> $tahun,
			'doc'				=> $file_name,
		);

		$this->db->insert('haki_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/tridharma/haki');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data HAKI"
			);
			$data['haki'] 				= $this->db->query("SELECT * FROM haki_dosen WHERE id='$id'")->result();
			$data['kategori'] 			= $this->db->query("SELECT * FROM haki")->result();
			$data['tingkatan'] 			= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/haki/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_kategori  	    	= $this->input->post('id_kategori');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$judul  	            = $this->input->post('judul');
		$tahun  	           	= $this->input->post('tahun');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'haki_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/dosen/doc_haki/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/dosen/doc_haki/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 	= "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'doc'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('haki_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/tridharma/haki/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'id_kategori'		=> $id_kategori,
			'id_tingkatan'		=> $id_tingkatan,
			'judul'				=> $judul,
			'tahun'				=> $tahun,
		);

		$where = array('id' => $id);
		$this->db->update('haki_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/tridharma/haki');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'haki_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/dosen/doc_haki/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('haki_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/tridharma/haki');
	}
}
