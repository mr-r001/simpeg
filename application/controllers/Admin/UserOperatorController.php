<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserOperatorController extends CI_Controller
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
				'title' => "Manage User Operator"
			);
			$data['operator']	 	= $this->db->query("SELECT *, fakultas.name AS nama_fakultas, users.id AS id_operator FROM users INNER JOIN fakultas ON users.id_fakultas = fakultas.id INNER JOIN prodi ON users.id_prodi = prodi.id WHERE role = 4")->result();
			$this->load->view('pages/Admin/user-operator/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Manage User Operator"
			);
			$data['fakultas'] 	= $this->db->query("SELECT * FROM fakultas")->result();
			$data['prodi'] 		= $this->db->query("SELECT * FROM prodi")->result();
			$this->load->view('pages/Admin/user-operator/add', $data);
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
		$id_fakultas  	    = $this->input->post('id_fakultas');
		$id_prodi  	    	= $this->input->post('id_prodi');

		$data = array(
			'nip'			=> $nip,
			'nama'			=> $name,
			'password'		=> $password,
			'tgl_lahir'		=> $tgl,
			'id_fakultas'	=> $id_fakultas,
			'id_prodi'		=> $id_prodi,
			'role'			=> 4,
		);

		$this->db->insert('users', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/user-operator');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Manage User Operator"
			);
			$where = array('id' => $id);
			$data['operator'] 	= $this->db->query("SELECT * FROM users WHERE id='$id'")->result();
			$data['fakultas'] 	= $this->db->query("SELECT * FROM fakultas")->result();
			$data['prodi'] 		= $this->db->query("SELECT * FROM prodi")->result();
			$this->load->view('pages/Admin/user-operator/edit', $data);
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
		$id_fakultas  	    = $this->input->post('id_fakultas');
		$id_prodi  	    	= $this->input->post('id_prodi');

		$data = array(
			'nip'			=> $nip,
			'nama'			=> $name,
			'password'		=> $password,
			'tgl_lahir'		=> $tgl,
			'id_fakultas'	=> $id_fakultas,
			'id_prodi'		=> $id_prodi,
			'role'			=> 4,
		);

		$where = array('id' => $id);
		$this->db->update('users', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/user-operator');
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
		redirect('admin/user-operator');
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
			'password'		=> sha1($tgl),
		);
		$where = array('id' => $id);
		$this->db->update('users', $data, $where);

		$this->session->set_flashdata('success', 'Password berhasil direset');
		redirect('admin/user-operator');
	}
}
