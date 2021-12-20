<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FakultasController extends CI_Controller
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
				'title' => "Fakultas"
			);
			$data['fakultas']	 	= $this->db->query("SELECT * FROM fakultas")->result();
			$this->load->view('pages/Admin/fakultas/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Fakultas"
			);
			$this->load->view('pages/Admin/fakultas/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$code           	= $this->input->post('code');
		$name  	            = $this->input->post('name');

		$data = array(
			'code'			=> $code,
			'name'			=> $name
		);

		$this->db->insert('fakultas', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/fakultas');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Fakultas"
			);
			$where = array('id' => $id);
			$data['fakultas'] = $this->db->query("SELECT * FROM fakultas WHERE id='$id'")->result();
			$this->load->view('pages/Admin/fakultas/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$code               	= $this->input->post('code');
		$name  	            	= $this->input->post('name');

		$data = array(
			'code'				=> $code,
			'name'				=> $name
		);

		$where = array('id' => $id);
		$this->db->update('fakultas', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/fakultas');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('fakultas', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/fakultas');
	}
}
