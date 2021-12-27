<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajaranController extends CI_Controller
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
				'title' => "Data Pengajaran"
			);
			$id = $this->session->userdata('id');
			$data['pengajaran']	 	= $this->db->query("SELECT *, pengajaran_dosen.id as id FROM pengajaran_dosen INNER JOIN tahun_akademik ON pengajaran_dosen.id_tahun = tahun_akademik.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/pengajaran/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Pengajaran"
			);
			$data['tahun'] 	= $this->db->query("SELECT * FROM tahun_akademik")->result();
			$this->load->view('pages/Dosen/pengajaran/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id_tahun  	    		= $this->input->post('id_tahun');
		$matkul  	            = $this->input->post('matkul');
		$sks  	            	= $this->input->post('sks');
		$max_size				= 2000000;


		if ($_FILES['sk']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sk']['tmp_name'];
			$upload_path		= './assets/img/dosen/sk_pengajaran/';
			$dname 				= explode(".", $_FILES['sk']['name']);
			$ext 				= end($dname);
			$file_name_ijazah 	= "sk_" . rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_ijazah");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/tridharma/pengajaran/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'id_tahun'			=> $id_tahun,
			'matkul'			=> $matkul,
			'sks'				=> $sks,
			'sk'				=> $file_name_ijazah,
		);

		$this->db->insert('pengajaran_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/tridharma/pengajaran');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Pengajaran"
			);
			$data['pengajaran'] 	= $this->db->query("SELECT * FROM pengajaran_dosen WHERE id='$id'")->result();
			$data['tahun'] 			= $this->db->query("SELECT * FROM tahun_akademik")->result();
			$this->load->view('pages/Dosen/pengajaran/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_tahun  	    		= $this->input->post('id_tahun');
		$matkul  	            = $this->input->post('matkul');
		$sks  	            	= $this->input->post('sks');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'pengajaran_dosen');
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$sk			= $data['sk'];
		}

		if ($_FILES['sk']['size'] > 0) {
			if ($_FILES['sk']['size'] < $max_size) {
				if ($sk != 'default.png') {
					$target_file	= './assets/img/dosen/sk_pengajaran/' . $sk;
					unlink($target_file);
				}
				$tmp_name 			= $_FILES['sk']['tmp_name'];
				$upload_path		= './assets/img/dosen/sk_pengajaran/';
				$dname 				= explode(".", $_FILES['sk']['name']);
				$ext 				= end($dname);
				$file_name_ijazah 	= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name_ijazah");

				$data = array(
					'sk'			=> $file_name_ijazah,
				);
				$where = array('id' => $id);
				$this->db->update('pengajaran_dosen', $data, $where);
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/tridharma/pengajaran/edit');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'id_tahun'			=> $id_tahun,
			'matkul'			=> $matkul,
			'sks'				=> $sks,
		);
		$where = array('id' => $id);
		$this->db->update('pengajaran_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/tridharma/pengajaran');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'pengajaran_dosen');
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$sk			= $data['sk'];
		}

		if ($sk != 'default.png') {
			$target_file	= './assets/img/dosen/sk_pengajaran/' . $sk;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('pengajaran_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/tridharma/pengajaran');
	}
}
