<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
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
				'title' => "Dashboard"
			);

			$data['dosen'] 						= $this->db->query('SELECT * FROM users WHERE role = 2')->num_rows();
			$data['pegawai'] 					= $this->db->query('SELECT * FROM users WHERE role = 3')->num_rows();
			$data['operator']		 			= $this->db->query('SELECT * FROM users WHERE role = 4')->num_rows();
			$this->load->view('pages/Admin/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
