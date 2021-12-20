<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdiController extends CI_Controller
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
				'title' => "Program Studi"
			);
			$data['prodi']	 	= $this->db->query("SELECT * FROM prodi")->result();
			$this->load->view('pages/Admin/prodi/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Program Studi"
			);
			$this->load->view('pages/Admin/prodi/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$code           	= $this->input->post('code');
		$name  	            = $this->input->post('name');

		$data = array(
			'kode_prodi'	=> $code,
			'nama_prodi'	=> $name
		);

		$this->db->insert('prodi', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/prodi');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Program Studi"
			);
			$where = array('id' => $id);
			$data['prodi'] = $this->db->query("SELECT * FROM prodi WHERE id='$id'")->result();
			$this->load->view('pages/Admin/prodi/edit', $data);
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
			'kode_prodi'		=> $code,
			'nama_prodi'		=> $name
		);

		$where = array('id' => $id);
		$this->db->update('prodi', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/prodi');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('prodi', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/prodi');
	}
}
