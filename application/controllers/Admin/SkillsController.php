<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SkillsController extends CI_Controller
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
				'title' => "Status Dosen sesuai bidang keahlian"
			);
			$data['dosen_skills']	 	= $this->db->query("SELECT * FROM dosen_skills")->result();
			$this->load->view('pages/Admin/skills/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Dosen sesuai bidang keahlian"
			);
			$this->load->view('pages/Admin/skills/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'status'	=> $name
		);

		$this->db->insert('dosen_skills', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/skills');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Status Dosen sesuai bidang keahlian"
			);
			$where = array('id' => $id);
			$data['dosen_skills'] = $this->db->query("SELECT * FROM dosen_skills WHERE id='$id'")->result();
			$this->load->view('pages/Admin/skills/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'status'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('dosen_skills', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/skills');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('dosen_skills', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/skills');
	}
}
