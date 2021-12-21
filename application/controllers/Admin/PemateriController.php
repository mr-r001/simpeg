<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemateriController extends CI_Controller
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
				'title' => "Status Pemateri"
			);
			$data['pemateri']	 	= $this->db->query("SELECT * FROM pemateri")->result();
			$this->load->view('pages/Admin/pemateri/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Pemateri"
			);
			$this->load->view('pages/Admin/pemateri/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'pemateri'	=> $name
		);

		$this->db->insert('pemateri', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/pemateri');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Pemateri"
			);
			$where = array('id' => $id);
			$data['pemateri'] = $this->db->query("SELECT * FROM pemateri WHERE id='$id'")->result();
			$this->load->view('pages/Admin/pemateri/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'pemateri'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('pemateri', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/pemateri');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('pemateri', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/pemateri');
	}
}
