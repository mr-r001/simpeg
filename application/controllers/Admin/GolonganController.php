<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GolonganController extends CI_Controller
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
				'title' => "Golongan"
			);
			$data['golongan']	 	= $this->db->query("SELECT * FROM golongan")->result();
			$this->load->view('pages/Admin/golongan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Golongan"
			);
			$this->load->view('pages/Admin/golongan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'name'	=> $name
		);

		$this->db->insert('golongan', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/golongan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Golongan"
			);
			$where = array('id' => $id);
			$data['golongan'] = $this->db->query("SELECT * FROM golongan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/golongan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'name'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('golongan', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/golongan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('golongan', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/golongan');
	}
}
