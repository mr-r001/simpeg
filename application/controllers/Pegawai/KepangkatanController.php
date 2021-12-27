<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KepangkatanController extends CI_Controller
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
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Data Kepangkatan"
			);
			$id = $this->session->userdata('id');
			$data['kepangkatan'] 	= $this->db->query("SELECT * FROM kepangkatan_pegawai WHERE id_user='$id'")->result();
			$data['golongan']		= $this->db->query("SELECT * FROM golongan")->result();
			$data['kategori']		= $this->db->query("SELECT * FROM kategori")->result();

			$this->load->view('pages/Pegawai/kepangkatan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id					= $this->input->post('id');
		$no_karpeg  	    = $this->input->post('no_karpeg');
		$tmt_pns  	        = $this->input->post('tmt_pns');
		$id_golongan  	    = $this->input->post('id_golongan');
		$tmt_golongan  	    = $this->input->post('tmt_golongan');
		$jabatan  	        = $this->input->post('jabatan');
		$tmt_jabatan  		= $this->input->post('tmt_jabatan');
		$id_kategori  	    = $this->input->post('id_kategori');


		$data = array(
			'no_karpeg'		=> $no_karpeg,
			'tmt_pns'		=> $tmt_pns,
			'id_golongan'	=> $id_golongan,
			'tmt_golongan'	=> $tmt_golongan,
			'jabatan'		=> $jabatan,
			'tmt_jabatan' 	=> $tmt_jabatan,
			'id_kategori'	=> $id_kategori,
		);
		$where = array('id' => $id);
		$this->db->update('kepangkatan_pegawai', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('pegawai/kepangkatan');
	}
}
