<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GolonganController extends CI_Controller
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
				'title' => "Data Golongan"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM golongan")->result();
			$this->load->view('pages/Admin/golongan/index.php', $data);
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

			$table = "golongan";
			$field = "id_golongan";

			$prefix = "GO";

			$lastCode = $this->M_Kode->generate_golongan($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_golongan'], -2, 2);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%02s', $noUrut);

			$this->load->view('pages/Admin/golongan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id              		= $this->input->post('id');
		$name  	            	= $this->input->post('name');
		$golongan           	= $this->input->post('golongan');
		$pasutri           		= $this->input->post('pasutri');
		$anak        		   	= $this->input->post('anak');
		$jabatan        		= $this->input->post('jabatan');
		$makan        		   	= $this->input->post('makan');

		$data = array(
			'id_golongan'				=> $id,
			'nama_golongan'				=> $name,
			'tunjangan_golongan'		=> $golongan,
			'tunjangan_pasutri'			=> $pasutri,
			'tunjangan_anak'			=> $anak,
			'tunjangan_jabatan'			=> $jabatan,
			'tunjangan_makan'			=> $makan
		);

		$this->db->insert('golongan', $data);
		redirect('admin/golongan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Golongan"
			);
			$where = array('id' => $id);
			$data['admin'] = $this->db->query("SELECT * FROM golongan WHERE id='$id'")->result();
			$this->load->view('pages/Admin/golongan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_golongan            = $this->input->post('id_golongan');
		$name  	            	= $this->input->post('name');
		$golongan           	= $this->input->post('golongan');
		$pasutri           		= $this->input->post('pasutri');
		$anak        		   	= $this->input->post('anak');
		$jabatan           		= $this->input->post('jabatan');
		$makan           		= $this->input->post('makan');

		$data = array(
			'id_golongan'				=> $id_golongan,
			'nama_golongan'				=> $name,
			'tunjangan_golongan'		=> $golongan,
			'tunjangan_pasutri'			=> $pasutri,
			'tunjangan_anak'			=> $anak,
			'tunjangan_jabatan'			=> $jabatan,
			'tunjangan_makan'			=> $makan
		);

		$where = array('id' => $id);
		$this->db->update('golongan', $data, $where);
		redirect('admin/golongan');
	}

	public function delete($id)
	{
		$where = array('id' => $id);
		$this->db->delete('golongan', $where);
		redirect('admin/golongan');
	}
}
