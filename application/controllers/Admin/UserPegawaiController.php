<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserPegawaiController extends CI_Controller
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
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Manage User Pegawai"
			);
			$data['pegawai']	 	= $this->db->query("SELECT * FROM users WHERE role = 3")->result();
			$this->load->view('pages/Admin/user-pegawai/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Manage User pegawai"
			);
			$this->load->view('pages/Admin/user-pegawai/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$nip  	            = $this->input->post('nip');
		$name  	            = $this->input->post('name');
		$tgl  	            = $this->input->post('tgl');
		$password  	        = sha1(date("dmY", strtotime($this->input->post('tgl'))));

		$data = array(
			'nip'			=> $nip,
			'nama'			=> $name,
			'password'		=> $password,
			'tgl_lahir'		=> $tgl,
			'role'			=> 3,
		);

		$this->db->insert('users', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/user-pegawai');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Manage User pegawai"
			);
			$where = array('id' => $id);
			$data['pegawai'] = $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
			$this->load->view('pages/Admin/user-pegawai/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id					= $this->input->post('id');
		$nip  	            = $this->input->post('nip');
		$name  	            = $this->input->post('name');
		$tgl  	            = $this->input->post('tgl');
		$password  	        = sha1(date("dmY", strtotime($this->input->post('tgl'))));

		$data = array(
			'nip'			=> $nip,
			'nama'			=> $name,
			'password'		=> $password,
			'tgl_lahir'		=> $tgl,
			'role'			=> 3,
		);

		$where = array('id' => $id);
		$this->db->update('users', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/user-pegawai');
	}

	public function delete($id)
	{
		$result				= $this->M_Admin->check_img($id);
		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		}

		if ($foto != 'default.png') {
			$target_file	= './assets/img/avatar/' . $foto;
			unlink($target_file);
		}
		$where = array('id' => $id);
		$this->db->delete('users', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/user-pegawai');
	}

	public function reset($id)
	{
		$result				= $this->M_Admin->check_img($id);
		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$tgl				= $data['tgl_lahir'];
		}

		$data = array(
			'password'		=> sha1(date("dmY", strtotime($tgl))),
		);
		$where = array('id' => $id);
		$this->db->update('users', $data, $where);

		$this->session->set_flashdata('success', 'Password berhasil direset');
		redirect('admin/user-pegawai');
	}
}
