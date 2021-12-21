<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DosenController extends CI_Controller
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
				'title' => "Status Dosen"
			);
			$data['dosen']	 	= $this->db->query("SELECT * FROM dosen")->result();
			$this->load->view('pages/Admin/dosen/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Dosen"
			);
			$this->load->view('pages/Admin/dosen/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'status_dosen'	=> $name
		);

		$this->db->insert('dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/dosen');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Dosen"
			);
			$where = array('id' => $id);
			$data['dosen'] = $this->db->query("SELECT * FROM dosen WHERE id='$id'")->result();
			$this->load->view('pages/Admin/dosen/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'status_dosen'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/dosen');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('dosen', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/dosen');
	}
}
