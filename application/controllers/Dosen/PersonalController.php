<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonalController extends CI_Controller
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
				'title' => "Data Akun"
			);
			$id = $this->session->userdata('id');
			$data['personal'] 	= $this->db->query("SELECT * FROM personal_dosen WHERE id_user='$id'")->result();
			$data['pendidikan']	= $this->db->query("SELECT * FROM jenjang_pendidikan")->result();
			$data['status']		= $this->db->query("SELECT * FROM dosen")->result();
			$data['sesuai']		= $this->db->query("SELECT * FROM dosen_skills")->result();
			$data['fakultas'] 	= $this->db->query("SELECT * FROM fakultas")->result();
			$data['prodi'] 		= $this->db->query("SELECT * FROM prodi")->result();
			$this->load->view('pages/Dosen/personal/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update()
	{
		$id					= $this->input->post('id');
		$nik  	            = $this->input->post('nik');
		$name  	            = $this->input->post('name');
		$address  	        = $this->input->post('address');
		$jenis_kelamin  	= $this->input->post('jenis_kelamin');
		$tgl  	            = $this->input->post('tgl');
		$agama  	        = $this->input->post('agama');
		$phone  	        = $this->input->post('phone');
		$email  	        = $this->input->post('email');
		$email_institusi  	= $this->input->post('email_institusi');
		$id_pendidikan  	= $this->input->post('id_pendidikan');
		$id_dosen  			= $this->input->post('id_dosen');
		$id_dosen_skills  	= $this->input->post('id_dosen_skills');
		$id_fakultas  	    = $this->input->post('id_fakultas');
		$id_prodi  	    	= $this->input->post('id_prodi');
		$img 				= $_FILES['photo']['name'];
		$result				= $this->M_Dosen->check_img($id);
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$foto		= $data['foto'];
		}

		if ($img) {
			// Jika Field ada
			if ($foto != 'default.png') {
				$target_file	= './assets/img/avatar/' . $foto;
				unlink($target_file);
			}

			$tmp_name 				= $_FILES['photo']['tmp_name'];
			$upload_path			= './assets/img/avatar/';
			$dname = explode(".", $_FILES['photo']['name']);
			$ext = end($dname);
			$file_name = rand(0, 1000000);
			move_uploaded_file($tmp_name, "$upload_path/$file_name.$ext");


			$data = array(
				'nik'			=> $nik,
				'nama'			=> $name,
				'alamat'		=> $address,
				'jenis_kelamin' => $jenis_kelamin,
				'tgl_lahir'		=> $tgl,
				'agama'			=> $agama,
				'no_hp'			=> $phone,
				'email'			=> $email,
				'email_institusi' => $email_institusi,
				'id_pendidikan'	=> $id_pendidikan,
				'id_dosen'		=> $id_dosen,
				'id_dosen_skills' => $id_dosen_skills,
				'id_fakultas'	=> $id_fakultas,
				'id_prodi'		=> $id_prodi,
				'foto'			=> $file_name . "." . $ext
			);
			$where = array('id' => $id);
			$this->db->update('personal_dosen', $data, $where);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('dosen/personal');
		} else {
			$data = array(
				'nik'			=> $nik,
				'nama'			=> $name,
				'alamat'		=> $address,
				'jenis_kelamin' => $jenis_kelamin,
				'tgl_lahir'		=> $tgl,
				'agama'			=> $agama,
				'no_hp'			=> $phone,
				'email'			=> $email,
				'email_institusi' => $email_institusi,
				'id_pendidikan'	=> $id_pendidikan,
				'id_dosen'		=> $id_dosen,
				'id_dosen_skills' => $id_dosen_skills,
				'id_fakultas'	=> $id_fakultas,
				'id_prodi'		=> $id_prodi,
			);
			$where = array('id' => $id);
			$this->db->update('personal_dosen', $data, $where);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('dosen/personal');
		}
	}

	public function delete($id)
	{
		//
	}
}