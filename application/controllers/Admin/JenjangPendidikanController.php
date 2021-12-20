<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenjangPendidikanController extends CI_Controller
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
				'title' => "Jenjang Pendidikan"
			);
			$data['jenjang_pendidikan']	 	= $this->db->query("SELECT * FROM jenjang_pendidikan")->result();
			$this->load->view('pages/Admin/jenjang_pendidikan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Jenjang Pendidikan"
			);
			$this->load->view('pages/Admin/jenjang_pendidikan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'jenjang_pendidikan'	=> $name
		);

		$this->db->insert('jenjang_pendidikan', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/jenjang_pendidikan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Jenjang Pendidikan"
			);
			$where = array('id' => $id);
			$data['jenjang_pendidikan'] = $this->db->query("SELECT * FROM jenjang_pendidikan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/jenjang_pendidikan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'jenjang_pendidikan'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('jenjang_pendidikan', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/jenjang_pendidikan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('jenjang_pendidikan', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/jenjang_pendidikan');
	}
}
