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
		if ($this->session->userdata('role') === '3') {
			$data = array(
				'title' => "Dashboard"
			);
			$id = $this->session->userdata('id');
			$this->load->view('pages/Pegawai/dashboard/index.php', $data);
		} else {
			redirect('/');
		}
	}
}
