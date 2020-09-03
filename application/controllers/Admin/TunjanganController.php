<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TunjanganController extends CI_Controller
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
				'title' => "Data Tunjangan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM tunjangan")->result();
			$this->load->view('pages/Admin/tunjangan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Tunjangan"
			);

			$table = "tunjangan";
			$field = "id_tunjangan";

			$prefix = "TU";

			$lastCode = $this->M_Kode->generate_tunjangan($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_tunjangan'], -2, 2);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%02s', $noUrut);

			$this->load->view('pages/Admin/tunjangan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id              		= $this->input->post('id');
		$name  	            	= $this->input->post('name');
		$tunjangan           	= $this->input->post('tunjangan');

		$data = array(
			'id_tunjangan'		=> $id,
			'nama_tunjangan'	=> $name,
			'besar_tunjangan'	=> $tunjangan
		);

		$this->db->insert('tunjangan', $data);
		redirect('admin/tunjangan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Tunjangan"
			);
			$where = array('id' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM tunjangan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/tunjangan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_tunjangan           = $this->input->post('id_tunjangan');
		$name  	            	= $this->input->post('name');
		$tunjangan              = $this->input->post('tunjangan');

		$data = array(
			'id_tunjangan'				=> $id_tunjangan,
			'nama_tunjangan'			=> $name,
			'besar_tunjangan'			=> $tunjangan
		);

		$where = array('id' => $id);
		$this->db->update('tunjangan', $data, $where);
		redirect('admin/tunjangan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('tunjangan', $where);
		redirect('admin/tunjangan');
	}
}
