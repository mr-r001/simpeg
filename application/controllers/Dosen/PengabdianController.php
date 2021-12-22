<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengabdianController extends CI_Controller
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
				'title' => "Kegiatan Pengabdian"
			);
			$id = $this->session->userdata('id');
			$data['pengabdian']	 	= $this->db->query("SELECT *, pengabdian_dosen.id as id FROM pengabdian_dosen INNER JOIN tingkatan ON pengabdian_dosen.id_tingkatan = tingkatan.id INNER JOIN team ON pengabdian_dosen.id_status = team.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/pengabdian/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Kegiatan Pengabdian"
			);
			$data['status'] 	= $this->db->query("SELECT * FROM team")->result();
			$data['tingkatan'] 	= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/pengabdian/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$judul  	            = $this->input->post('judul');
		$id_status  	    	= $this->input->post('id_status');
		$tahun  	           	= $this->input->post('tahun');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$publikasi  	        = $this->input->post('publikasi');
		$max_size				= 2000000;

		if ($_FILES['doc']['size'] < $max_size) {
			$tmp_name 			= $_FILES['doc']['tmp_name'];
			$upload_path		= './assets/img/dosen/doc_pengabdian/';
			$dname 				= explode(".", $_FILES['doc']['name']);
			$ext 				= end($dname);
			$file_name 	= "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/tridharma/pengabdian/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'id_status'			=> $id_status,
			'tahun'				=> $tahun,
			'id_tingkatan'		=> $id_tingkatan,
			'publikasi'			=> $publikasi,
			'doc'				=> $file_name,
		);

		$this->db->insert('pengabdian_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/tridharma/pengabdian');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Kegiatan Pengabdian"
			);
			$data['pengabdian'] 		= $this->db->query("SELECT * FROM pengabdian_dosen WHERE id='$id'")->result();
			$data['status'] 			= $this->db->query("SELECT * FROM team")->result();
			$data['tingkatan'] 			= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/pengabdian/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$judul  	            = $this->input->post('judul');
		$id_status  	    	= $this->input->post('id_status');
		$tahun  	           	= $this->input->post('tahun');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$publikasi  	        = $this->input->post('publikasi');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'pengabdian_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($_FILES['doc']['size'] > 0) {
			if ($_FILES['doc']['size'] < $max_size) {
				if ($doc != 'default.png') {
					$target_file	= './assets/img/dosen/doc_pengabdian/' . $doc;
					unlink($target_file);
				}

				$tmp_name 			= $_FILES['doc']['tmp_name'];
				$upload_path		= './assets/img/dosen/doc_pengabdian/';
				$dname 				= explode(".", $_FILES['doc']['name']);
				$ext 				= end($dname);
				$file_name 	= "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'doc'			=> $file_name,
				);
				$where = array('id' => $id);
				$this->db->update('pengabdian_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/tridharma/pengabdian/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'id_status'			=> $id_status,
			'tahun'				=> $tahun,
			'id_tingkatan'		=> $id_tingkatan,
			'publikasi'			=> $publikasi,
		);

		$where = array('id' => $id);
		$this->db->update('pengabdian_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/tridharma/pengabdian');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'pengabdian_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$doc			= $data['doc'];
		}

		if ($doc != 'default.png') {
			$target_file	= './assets/img/dosen/doc_pengabdian/' . $doc;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('pengabdian_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/tridharma/pengabdian');
	}
}
