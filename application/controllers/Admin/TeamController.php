<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeamController extends CI_Controller
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
				'title' => "Status didalam tim"
			);
			$data['team']	 	= $this->db->query("SELECT * FROM team")->result();
			$this->load->view('pages/Admin/team/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status didalam tim"
			);
			$this->load->view('pages/Admin/team/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'team'	=> $name
		);

		$this->db->insert('team', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/team');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status didalam tim"
			);
			$where = array('id' => $id);
			$data['team'] = $this->db->query("SELECT * FROM team WHERE id='$id'")->result();
			$this->load->view('pages/Admin/team/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'team'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('team', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/team');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('team', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/team');
	}
}
