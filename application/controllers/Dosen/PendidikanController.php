<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendidikanController extends CI_Controller
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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Pendidikan"
			);
			$id = $this->session->userdata('id');
			$data['pendidikan']	 	= $this->db->query("SELECT *, pendidikan_dosen.id as id  FROM pendidikan_dosen INNER JOIN jenjang_pendidikan ON pendidikan_dosen.id_pendidikan = jenjang_pendidikan.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/pendidikan/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Pendidikan"
			);
			$data['pendidikan'] 	= $this->db->query("SELECT * FROM jenjang_pendidikan")->result();
			$this->load->view('pages/Dosen/pendidikan/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id_pendidikan  	    = $this->input->post('id_pendidikan');
		$nama_pt  	            = $this->input->post('nama_pt');
		$tahun  	            = $this->input->post('tahun');
		$judul_ta  	    		= $this->input->post('judul_ta');
		$ipk  	    			= $this->input->post('ipk');
		$max_size				= 2000000;


		if ($_FILES['ijazah']['size'] < $max_size) {
			$tmp_name 			= $_FILES['ijazah']['tmp_name'];
			$upload_path		= './assets/img/dosen/ijazah/';
			$dname 				= explode(".", $_FILES['ijazah']['name']);
			$ext 				= end($dname);
			$file_name_ijazah 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_ijazah");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/pendidikan/create');
		}

		if ($_FILES['transkrip']['size'] < $max_size) {
			$tmp_name 			= $_FILES['transkrip']['tmp_name'];
			$upload_path		= './assets/img/dosen/transkrip/';
			$dname 				= explode(".", $_FILES['transkrip']['name']);
			$ext 				= end($dname);
			$file_name_transkrip = rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_transkrip");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/pendidikan/create', 'refresh');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'id_pendidikan'		=> $id_pendidikan,
			'nama_pt'			=> $nama_pt,
			'tahun'				=> $tahun,
			'judul_ta'			=> $judul_ta,
			'ipk'				=> $ipk,
			'ijazah'			=> $file_name_ijazah,
			'transkrip'			=> $file_name_transkrip,
		);

		$this->db->insert('pendidikan_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/pendidikan');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Pendidikan"
			);
			$data['pendidikan'] = $this->db->query("SELECT * FROM pendidikan_dosen WHERE id='$id'")->result();
			$data['jenjang_pendidikan'] 	= $this->db->query("SELECT * FROM jenjang_pendidikan")->result();
			$this->load->view('pages/Dosen/pendidikan/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$id_pendidikan  	    = $this->input->post('id_pendidikan');
		$nama_pt  	            = $this->input->post('nama_pt');
		$tahun  	            = $this->input->post('tahun');
		$judul_ta  	    		= $this->input->post('judul_ta');
		$ipk  	    			= $this->input->post('ipk');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check_file($id);
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$ijazah		= $data['ijazah'];
			$transkrip	= $data['transkrip'];
		}


		if ($_FILES['ijazah']['size'] > 0 || $_FILES['transkrip']['size'] > 0) {
			// Jika Foto ada
			if ($_FILES['ijazah']['size'] > 0) {
				if ($_FILES['ijazah']['size'] < $max_size) {
					if ($ijazah != 'default.png') {
						$target_file	= './assets/img/dosen/ijazah/' . $ijazah;
						unlink($target_file);
					}
					$tmp_name 			= $_FILES['ijazah']['tmp_name'];
					$upload_path		= './assets/img/dosen/ijazah/';
					$dname 				= explode(".", $_FILES['ijazah']['name']);
					$ext 				= end($dname);
					$file_name_ijazah 	= rand(100, 10000) . "." . $ext;
					move_uploaded_file($tmp_name, "$upload_path/$file_name_ijazah");

					$data = array(
						'ijazah'			=> $file_name_ijazah,
					);
					$where = array('id' => $id);
					$this->db->update('pendidikan_dosen', $data, $where);
				} else {
					$this->session->set_flashdata('error', 'File terlalu besar');
					redirect('dosen/pendidikan/edit');
				}
			}

			if ($_FILES['transkrip']['size'] > 0) {
				if ($_FILES['transkrip']['size'] < $max_size) {
					if ($transkrip != 'default.png') {
						$target_file	= './assets/img/dosen/transkrip/' . $transkrip;
						unlink($target_file);
					}
					$tmp_name 			= $_FILES['transkrip']['tmp_name'];
					$upload_path		= './assets/img/dosen/transkrip/';
					$dname 				= explode(".", $_FILES['transkrip']['name']);
					$ext 				= end($dname);
					$file_name_transkrip = rand(100, 10000) . "." . $ext;
					move_uploaded_file($tmp_name, "$upload_path/$file_name_transkrip");

					$data = array(
						'transkrip'			=> $file_name_transkrip,
					);
					$where = array('id' => $id);
					$this->db->update('pendidikan_dosen', $data, $where);
				} else {
					$this->session->set_flashdata('error', 'File terlalu besar');
					redirect('dosen/pendidikan/edit', 'refresh');
				}
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'id_pendidikan'		=> $id_pendidikan,
			'nama_pt'			=> $nama_pt,
			'tahun'				=> $tahun,
			'judul_ta'			=> $judul_ta,
			'ipk'				=> $ipk,
		);
		$where = array('id' => $id);
		$this->db->update('pendidikan_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/pendidikan');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check_file($id);
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$ijazah		= $data['ijazah'];
			$transkrip	= $data['transkrip'];
		}


		if ($ijazah != 'default.png') {
			$target_file	=  './assets/img/dosen/ijazah/' . $ijazah;
			unlink($target_file);
		}

		if ($transkrip != 'default.png') {
			$target	= './assets/img/dosen/transkrip/' . $transkrip;
			unlink($target);
		}

		$where = array('id' => $id);
		$this->db->delete('pendidikan_dosen', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/pendidikan');
	}
}
