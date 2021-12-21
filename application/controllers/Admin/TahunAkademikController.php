<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TahunAkademikController extends CI_Controller
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
			$data['tahun_akademik']	 	= $this->db->query("SELECT * FROM tahun_akademik")->result();
			$this->load->view('pages/Admin/tahun_akademik/index.php', $data);
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
			$this->load->view('pages/Admin/tahun_akademik/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$code           	= $this->input->post('code');
		$name  	            = $this->input->post('name');

		$data = array(
			'kode_TA'		 => $code,
			'tahun_akademik' => $name
		);

		$this->db->insert('tahun_akademik', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('admin/tahun_akademik');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Program Studi"
			);
			$where = array('id' => $id);
			$data['tahun_akademik'] = $this->db->query("SELECT * FROM tahun_akademik WHERE id='$id'")->result();
			$this->load->view('pages/Admin/tahun_akademik/edit', $data);
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
			'kode_TA'			=> $code,
			'tahun_akademik'	=> $name
		);

		$where = array('id' => $id);
		$this->db->update('tahun_akademik', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('admin/tahun_akademik');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('tahun_akademik', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('admin/tahun_akademik');
	}
}
