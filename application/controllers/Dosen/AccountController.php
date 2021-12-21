<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccountController extends CI_Controller
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
			$data['dosen'] 		= $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
			$data['fakultas'] 	= $this->db->query("SELECT * FROM fakultas")->result();
			$data['prodi'] 		= $this->db->query("SELECT * FROM prodi")->result();
			$this->load->view('pages/Dosen/account/edit.php', $data);
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
		$name  	            = $this->input->post('name');
		$username  	        = $this->input->post('username');
		$tgl  	            = $this->input->post('tgl');
		$id_fakultas  	    = $this->input->post('id_fakultas');
		$id_prodi  	    	= $this->input->post('id_prodi');

		$data = array(
			'nama'			=> $name,
			'username'		=> $username,
			'tgl_lahir'		=> $tgl,
			'id_fakultas'	=> $id_fakultas,
			'id_prodi'		=> $id_prodi,
		);

		$where = array('id' => $id);
		$this->db->update('users', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/account');
	}

	public function delete($id)
	{
		//
	}
}
