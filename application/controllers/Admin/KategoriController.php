<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends CI_Controller
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
				'title' => "Kategori Pegawai"
			);
			$data['kategori']	 	= $this->db->query("SELECT * FROM kategori")->result();
			$this->load->view('pages/Admin/kategori/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Kategori Pegawai"
			);
			$this->load->view('pages/Admin/kategori/add', $data);
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

		$this->db->insert('kategori', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/kategori');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Kategori Pegawai"
			);
			$where = array('id' => $id);
			$data['kategori'] = $this->db->query("SELECT * FROM kategori WHERE id='$id'")->result();
			$this->load->view('pages/Admin/kategori/edit', $data);
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
		$this->db->update('kategori', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/kategori');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('kategori', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/kategori');
	}
}
