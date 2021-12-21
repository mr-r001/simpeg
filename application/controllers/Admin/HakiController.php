<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HakiController extends CI_Controller
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
				'title' => "Kategori HAKI"
			);
			$data['haki']	 	= $this->db->query("SELECT * FROM haki")->result();
			$this->load->view('pages/Admin/haki/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Kategori HAKi"
			);
			$this->load->view('pages/Admin/haki/add', $data);
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

		$this->db->insert('haki', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/haki');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Kategori HAKi"
			);
			$where = array('id' => $id);
			$data['haki'] = $this->db->query("SELECT * FROM haki WHERE id='$id'")->result();
			$this->load->view('pages/Admin/haki/edit', $data);
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
		$this->db->update('haki', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/haki');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('haki', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/haki');
	}
}
