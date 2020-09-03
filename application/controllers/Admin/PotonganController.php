<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PotonganController extends CI_Controller
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
				'title' => "Data Potongan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM potongan")->result();
			$this->load->view('pages/Admin/potongan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Potongan"
			);

			$table = "potongan";
			$field = "id_potongan";

			$prefix = "PO";

			$lastCode = $this->M_Kode->generate_potongan($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_potongan'], -2, 2);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%02s', $noUrut);

			$this->load->view('pages/Admin/potongan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id              		= $this->input->post('id');
		$name  	            	= $this->input->post('name');
		$potongan           	= $this->input->post('potongan');

		$data = array(
			'id_potongan'				=> $id,
			'nama_potongan'				=> $name,
			'besar_potongan'		=> $potongan
		);

		$this->db->insert('potongan', $data);
		redirect('admin/potongan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Potongan"
			);
			$where = array('id' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM potongan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/potongan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_potongan            = $this->input->post('id_potongan');
		$name  	            	= $this->input->post('name');
		$potongan               = $this->input->post('potongan');

		$data = array(
			'id_potongan'				=> $id_potongan,
			'nama_potongan'				=> $name,
			'besar_potongan'		=> $potongan
		);

		$where = array('id' => $id);
		$this->db->update('potongan', $data, $where);
		redirect('admin/potongan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('potongan', $where);
		redirect('admin/potongan');
	}
}
