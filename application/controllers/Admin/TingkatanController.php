<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TingkatanController extends CI_Controller
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
				'title' => "Tingkatan"
			);
			$data['tingkatan']	 	= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Admin/tingkatan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Tingkatan"
			);
			$this->load->view('pages/Admin/tingkatan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$name  	            = $this->input->post('name');

		$data = array(
			'tingkatan'	=> $name
		);

		$this->db->insert('tingkatan', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/tingkatan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Tingkatan"
			);
			$where = array('id' => $id);
			$data['tingkatan'] = $this->db->query("SELECT * FROM tingkatan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/tingkatan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$name  	            	= $this->input->post('name');

		$data = array(
			'tingkatan'			=> $name
		);

		$where = array('id' => $id);
		$this->db->update('tingkatan', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/tingkatan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('tingkatan', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/tingkatan');
	}
}
