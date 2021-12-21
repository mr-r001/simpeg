<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/');
		}
		$this->load->model('M_Auth');
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			redirect('admin/dashboard');
		} elseif ($this->session->userdata('role') === '2') {
			redirect('dosen/dashboard');
		} elseif ($this->session->userdata('role') === '3') {
			redirect('pegawai/dashboard');
		} else {
			$data = array(
				'title' => "Login"
			);
			$data['role']	 	= $this->db->query("SELECT * FROM hak_akses")->result();
			$this->load->view('auth/auth', $data);
		}
	}
	public function admin()
	{
		if ($this->session->userdata('role') === '1') {
			redirect('admin/dashboard');
		} elseif ($this->session->userdata('role') === '2') {
			redirect('dosen/dashboard');
		} elseif ($this->session->userdata('role') === '3') {
			redirect('pegawai/dashboard');
		} else {
			$data = array(
				'title' => "Login"
			);
			$data['role']	 	= $this->db->query("SELECT * FROM hak_akses")->result();
			$this->load->view('auth/index', $data);
		}
	}

	public function login()
	{
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$result			= $this->M_Auth->check_auth($username, $password);

		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$id			= $data['id'];
			$nip		= $data['nip'];
			$nama		= $data['nama'];
			$username	= $data['username'];
			$tgl		= $data['tgl_lahir'];
			$img		= $data['img'];
			$role		= $data['role'];
			$sesdata	= array(
				'id'		=> $id,
				'nip'		=> $nip,
				'nama'		=> $nama,
				'username'	=> $username,
				'tgl_lahir'	=> $tgl,
				'img'		=> $img,
				'role'		=> $role,
				'logged_in'	=> TRUE
			);
			$this->session->set_userdata($sesdata);
			if ($role === '2') {
				redirect('dosen/dashboard');
			} elseif ($role === '3') {
				redirect('pegawai/dashboard');
			}
		} else {
			$this->session->set_flashdata('failed', 'Login Gagal! Periksa kembali NIP dan Password Anda.');
			redirect("/auth");
		}
		$data = array(
			'title' => "Login"
		);
		$data['role']	 	= $this->db->query("SELECT * FROM hak_akses")->result();
		$this->load->view('auth/index', $data);
	}

	public function login_admin()
	{
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$result			= $this->M_Auth->check_admin($username, $password);

		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$id			= $data['id'];
			$nip		= $data['nip'];
			$nama		= $data['nama'];
			$username	= $data['username'];
			$img		= $data['img'];
			$role		= $data['role'];
			$sesdata	= array(
				'id'		=> $id,
				'nip'		=> $nip,
				'nama'		=> $nama,
				'username'	=> $username,
				'img'		=> $img,
				'role'		=> $role,
				'logged_in'	=> TRUE
			);
			$this->session->set_userdata($sesdata);
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('failed', 'Login Gagal! Periksa kembali Username dan Password Anda.');
			redirect("/auth-admin");
		}
		$data = array(
			'title' => "Login"
		);
		$data['role']	 	= $this->db->query("SELECT * FROM hak_akses")->result();
		$this->load->view('auth/index', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	public function logout_admin()
	{
		$this->session->sess_destroy();
		redirect('auth-admin');
	}
}
