<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JabatanController extends CI_Controller
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
				'title' => "Data Jabatan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM jabatan")->result();
			$this->load->view('pages/Admin/jabatan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Jabatan"
			);

			$table = "jabatan";
			$field = "id_jabatan";

			$prefix = "JA";

			$lastCode = $this->M_Kode->generate($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_jabatan'], -2, 2);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%02s', $noUrut);

			$this->load->view('pages/Admin/jabatan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id              		= $this->input->post('id');
		$name  	            	= $this->input->post('name');
		$gaji           	   	= $this->input->post('gaji');

		$data = array(
			'id_jabatan'		=> $id,
			'nama_jabatan'		=> $name,
			'gaji_pokok'		=> $gaji
		);

		$this->db->insert('jabatan', $data);
		redirect('admin/jabatan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Jabatan"
			);
			$where = array('id' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM jabatan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/jabatan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_jabatan             = $this->input->post('id_jabatan');
		$name  	            	= $this->input->post('name');
		$gaji              		= $this->input->post('gaji');

		$data = array(
			'id_jabatan'		=> $id_jabatan,
			'nama_jabatan'		=> $name,
			'gaji_pokok'		=> $gaji,
		);

		$where = array('id' => $id);
		$this->db->update('jabatan', $data, $where);
		redirect('admin/jabatan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('jabatan', $where);
		redirect('admin/jabatan');
	}
}
