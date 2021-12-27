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
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Kepangkatan"
			);
			$id = $this->session->userdata('id');
			$data['kepangkatan'] 	= $this->db->query("SELECT * FROM kepangkatan_dosen WHERE id_user='$id'")->result();
			$data['golongan']		= $this->db->query("SELECT * FROM golongan")->result();

			$this->load->view('pages/Dosen/kepangkatan/data/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id					= $this->input->post('id');
		$nidn  	            = $this->input->post('nidn');
		$no_karpeg  	    = $this->input->post('no_karpeg');
		$status  	        = $this->input->post('status');
		$nomor_serdos  		= $this->input->post('nomor_serdos');
		$tmt_pns  	        = $this->input->post('tmt_pns');
		$id_golongan  	    = $this->input->post('id_golongan');
		$tmt_golongan  	    = $this->input->post('tmt_golongan');
		$jabatan  	        = $this->input->post('jabatan');
		$tmt_jabatan  		= $this->input->post('tmt_jabatan');


		$data = array(
			'nidn'			=> $nidn,
			'no_karpeg'		=> $no_karpeg,
			'status'		=> $status,
			'nomor_serdos' 	=> $nomor_serdos,
			'tmt_pns'		=> $tmt_pns,
			'id_golongan'	=> $id_golongan,
			'tmt_golongan'	=> $tmt_golongan,
			'jabatan'		=> $jabatan,
			'tmt_jabatan' 	=> $tmt_jabatan,
		);
		$where = array('id' => $id);
		$this->db->update('kepangkatan_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/kepangkatan/data');
	}

	public function doc_index()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Doc Kepangkatan"
			);
			$id = $this->session->userdata('id');
			$data['kepangkatan'] 	= $this->db->query("SELECT * FROM doc_kepangkatan_dosen WHERE id_user='$id'")->result();

			$this->load->view('pages/Dosen/kepangkatan/doc/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Doc Kepangkatan"
			);
			$this->load->view('pages/Dosen/kepangkatan/doc/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$max_size				= 2000000;

		if ($_FILES['sk_cpns']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sk_cpns']['tmp_name'];
			$upload_path		= './assets/img/dosen/sk_cpns/';
			$dname 				= explode(".", $_FILES['sk_cpns']['name']);
			$ext 				= end($dname);
			$file_name_cpns 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_cpns");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/doc/create');
		}

		if ($_FILES['sk_pns']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sk_pns']['tmp_name'];
			$upload_path		= './assets/img/dosen/sk_pns/';
			$dname 				= explode(".", $_FILES['sk_pns']['name']);
			$ext 				= end($dname);
			$file_name_pns 		= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_pns");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/doc/create');
		}

		if ($_FILES['sk_kontrak']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sk_kontrak']['tmp_name'];
			$upload_path		= './assets/img/dosen/sk_kontrak/';
			$dname 				= explode(".", $_FILES['sk_kontrak']['name']);
			$ext 				= end($dname);
			$file_name_kontrak	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_kontrak");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/doc/create');
		}

		if ($_FILES['karpeg']['size'] < $max_size) {
			$tmp_name 			= $_FILES['karpeg']['tmp_name'];
			$upload_path		= './assets/img/dosen/karpeg/';
			$dname 				= explode(".", $_FILES['karpeg']['name']);
			$ext 				= end($dname);
			$file_name_karpeg 	= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_karpeg");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/doc/create');
		}

		if ($_FILES['sertifikat']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sertifikat']['tmp_name'];
			$upload_path		= './assets/img/dosen/sertifikat/';
			$dname 				= explode(".", $_FILES['sertifikat']['name']);
			$ext 				= end($dname);
			$file_name_sertifikat = rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_sertifikat");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/doc/create');
		}

		if ($_FILES['sk_jabatan']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sk_jabatan']['tmp_name'];
			$upload_path		= './assets/img/dosen/sk_jabatan/';
			$dname 				= explode(".", $_FILES['sk_jabatan']['name']);
			$ext 				= end($dname);
			$file_name_jabatan 			= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_jabatan");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/doc/create');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'sk_cpns'			=> $file_name_cpns,
			'sk_pns'			=> $file_name_pns,
			'sk_kontrak'		=> $file_name_kontrak,
			'karpeg'			=> $file_name_karpeg,
			'sertifikat'		=> $file_name_sertifikat,
			'sk_jabatan'		=> $file_name_jabatan,
		);

		$this->db->insert('doc_kepangkatan_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/kepangkatan/doc');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'doc_kepangkatan_dosen');
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$sk_cpns	= $data['sk_cpns'];
			$sk_pns		= $data['sk_pns'];
			$sk_kontrak	= $data['sk_kontrak'];
			$karpeg		= $data['karpeg'];
			$sertifikat	= $data['sertifikat'];
			$sk_jabatan	= $data['sk_jabatan'];
		}


		if ($sk_cpns != 'default.png') {
			$target_file	=  './assets/img/dosen/sk_cpns/' . $sk_cpns;
			unlink($target_file);
		}

		if ($sk_pns != 'default.png') {
			$target	= './assets/img/dosen/sk_pns/' . $sk_pns;
			unlink($target);
		}

		if ($sk_kontrak != 'default.png') {
			$target	= './assets/img/dosen/sk_kontrak/' . $sk_kontrak;
			unlink($target);
		}
		if ($karpeg != 'default.png') {
			$target	= './assets/img/dosen/karpeg/' . $karpeg;
			unlink($target);
		}
		if ($sertifikat != 'default.png') {
			$target	= './assets/img/dosen/sertifikat/' . $sertifikat;
			unlink($target);
		}
		if ($sk_jabatan != 'default.png') {
			$target	= './assets/img/dosen/sk_jabatan/' . $sk_jabatan;
			unlink($target);
		}

		$where = array('id' => $id);
		$this->db->delete('doc_kepangkatan_dosen', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/kepangkatan/doc');
	}

	public function riwayat_index()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Riwayat Struktural"
			);
			$id = $this->session->userdata('id');
			$data['riwayat']	 	= $this->db->query("SELECT * FROM riwayat_dosen WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/kepangkatan/riwayat/index', $data);
		} else {
			redirect('/');
		}
	}

	public function riwayat_create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Riwayat Struktural"
			);
			$this->load->view('pages/Dosen/kepangkatan/riwayat/add', $data);
		} else {
			redirect('/');
		}
	}

	public function riwayat_store()
	{
		$nama_jabatan  	        = $this->input->post('nama_jabatan');
		$periode  	    		= $this->input->post('periode');
		$tahun  	            = $this->input->post('tahun');
		$max_size				= 2000000;

		if ($_FILES['sk']['size'] < $max_size) {
			$tmp_name 			= $_FILES['sk']['tmp_name'];
			$upload_path		= './assets/img/dosen/sk_riwayat/';
			$dname 				= explode(".", $_FILES['sk']['name']);
			$ext 				= end($dname);
			$file_name_sk 		= rand(100, 10000) . "." . $ext;
			move_uploaded_file($tmp_name, "$upload_path/$file_name_sk");
		} else {
			$this->session->set_flashdata('error', 'File terlalu besar');
			redirect('dosen/kepangkatan/riwayat/create', 'refresh');
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'nama_jabatan'		=> $nama_jabatan,
			'periode'			=> $periode,
			'tahun'				=> $tahun,
			'sk'				=> $file_name_sk,
		);

		$this->db->insert('riwayat_dosen', $data);
		$this->session->set_flashdata('success', 'Data berhasil disimpan');
		redirect('dosen/kepangkatan/riwayat');
	}

	public function riwayat_edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Riwayat Struktural"
			);
			$data['riwayat'] = $this->db->query("SELECT * FROM riwayat_dosen WHERE id='$id'")->result();
			$this->load->view('pages/Dosen/kepangkatan/riwayat/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function riwayat_update()
	{
		$id						= $this->input->post('id');
		$nama_jabatan  	        = $this->input->post('nama_jabatan');
		$periode  	    		= $this->input->post('periode');
		$tahun  	            = $this->input->post('tahun');
		$max_size				= 2000000;

		$result					= $this->M_Dosen->check($id, 'riwayat_dosen');
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$sk			= $data['sk'];
		}


		if ($_FILES['sk']['size'] > 0) {
			// Jika Foto ada
			if ($_FILES['sk']['size'] > 0) {
				if ($_FILES['sk']['size'] < $max_size) {
					if ($sk != 'default.png') {
						$target_file	= './assets/img/dosen/sk_riwayat/' . $sk;
						unlink($target_file);
					}
					$tmp_name 			= $_FILES['sk']['tmp_name'];
					$upload_path		= './assets/img/dosen/sk_riwayat/';
					$dname 				= explode(".", $_FILES['sk']['name']);
					$ext 				= end($dname);
					$file_name_ijazah 	= rand(100, 10000) . "." . $ext;
					move_uploaded_file($tmp_name, "$upload_path/$file_name_ijazah");

					$data = array(
						'sk'			=> $file_name_ijazah,
					);
					$where = array('id' => $id);
					$this->db->update('riwayat_dosen', $data, $where);
				} else {
					$this->session->set_flashdata('error', 'File terlalu besar');
					redirect('dosen/kepangkatan/riwayat/edit');
				}
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'nama_jabatan'		=> $nama_jabatan,
			'periode'			=> $periode,
			'tahun'				=> $tahun,
		);

		$where = array('id' => $id);
		$this->db->update('riwayat_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/kepangkatan/riwayat');
	}

	public function riwayat_delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'riwayat_dosen');
		if ($result->num_rows() > 0) {
			$data		= $result->row_array();
			$sk		= $data['sk'];
		}


		if ($sk != 'default.png') {
			$target_file	=  './assets/img/dosen/sk_riwayat/' . $sk;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('riwayat_dosen', $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/kepangkatan/riwayat');
	}
}
