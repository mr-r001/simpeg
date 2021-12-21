<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepanitiaanController extends CI_Controller
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
				'title' => "Status Kepanitiaan"
			);
			$data['kepanitiaan']	 	= $this->db->query("SELECT * FROM kepanitiaan")->result();
			$this->load->view('pages/Admin/kepanitiaan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Kepanitiaan"
			);
			$this->load->view('pages/Admin/kepanitiaan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'kepanitiaan'	=> $name
		);

		$this->db->insert('kepanitiaan', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/kepanitiaan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Kepanitiaan"
			);
			$where = array('id' => $id);
			$data['kepanitiaan'] = $this->db->query("SELECT * FROM kepanitiaan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/kepanitiaan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'kepanitiaan'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('kepanitiaan', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/kepanitiaan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('kepanitiaan', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/kepanitiaan');
	}
}
