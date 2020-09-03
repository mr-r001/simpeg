<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PegawaiController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in' !== TRUE)) {
			redirect('/auth');
		}
	}

	public function index()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Pegawai"
			);
			$data['admin']	 	= $this->db->query("SELECT * FROM pegawai INNER JOIN hak_akses ON pegawai.role=hak_akses.id_role")->result();
			$this->load->view('pages/Admin/pegawai/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '1') {
			$data = array(
				'title' => "Data Pegawai"
			);

			$table = "pegawai";
			$field = "id_pegawai";

			$prefix = "PE";

			$lastCode = $this->M_Kode->generate_pegawai($prefix, $table, $field);

			$noUrut = (int) substr($lastCode['id_pegawai'], -2, 2);
			$noUrut++;

			$data['newCode'] = $prefix . sprintf('%02s', $noUrut);

			$data['hak_akses'] 		= $this->M_Role->get_data()->result();
			$data['jabatan']	 	= $this->db->query("SELECT * FROM jabatan")->result();
			$data['golongan']	 	= $this->db->query("SELECT * FROM golongan")->result();
			$data['tunjangan']	 	= $this->db->query("SELECT * FROM tunjangan")->result();
			$data['potongan']	 	= $this->db->query("SELECT * FROM potongan")->result();
			$this->load->view('pages/Admin/pegawai/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$id         	          = $this->input->post('id');
		$nip         	          = $this->input->post('nip');
		$name         	          = $this->input->post('name');
		$jabatan         	      = $this->input->post('jabatan');
		$golongan         	      = $this->input->post('golongan');
		$jk         	     	  = $this->input->post('jk');
		$alamat         	      = $this->input->post('alamat');
		$telp       	  	      = $this->input->post('telp');
		$status_kawin       	  = $this->input->post('status_kawin');
		$jumlah     		  	  = $this->input->post('jumlah');
		$tunjangan     		  	  = $this->input->post('tunjangan');
		$potongan     		  	  = $this->input->post('potongan');
		$bank     		  		  = $this->input->post('bank');
		$norek     		  		  = $this->input->post('norek');
		$username     		  	  = $this->input->post('username');
		$password     		  	  = $this->input->post('password');
		$role   	  		  	  = $this->input->post('role');
		$img 				      = $_FILES['img'];

		foreach ($tunjangan as $x) {
			$data = array(
				'id_pegawai'		=> $id,
				'id_tunjangan'		=> $x
			);

			$this->db->insert('tunjangan_pegawai', $data);
		}

		foreach ($potongan as $y) {
			$data = array(
				'id_pegawai'		=> $id,
				'id_potongan'		=> $y
			);

			$this->db->insert('potongan_pegawai', $data);
		}
		if ($jk == NULL) {
			$jk = "L";
		} else {
			$jk = "P";
		}

		if ($img = '') {
			// Jika Field Kosong
			$img = 'default.png';
		} else {
			// Jika Field Ada
			$config['upload_path']		= './assets/img/avatar';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img')) {
				$img = $this->upload->data('file_name');
			} else {
				$img = 'default.png';
			}
		}
		$data = array(
			'id_pegawai'	=> $id,
			'nip'			=> $nip,
			'nama'			=> $name,
			'id_jabatan'	=> $jabatan,
			'id_golongan'	=> $golongan,
			'jenis_kelamin'	=> $jk,
			'alamat'		=> $alamat,
			'no_hp'			=> $telp,
			'status_kawin'	=> $status_kawin,
			'jumlah_anak'	=> $jumlah,
			'bank'			=> $bank,
			'no_rekening'	=> $norek,
			'username'		=> $username,
			'password'		=> sha1($password),
			'img'			=> $img,
			'role'			=> $role
		);

		$this->db->insert('pegawai', $data);
		redirect('admin/pegawai');
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '1') {
			$result				= $this->db->query("SELECT * FROM pegawai WHERE id='$id'");

			if ($result->num_rows() > 0) {
				$data	= $result->row_array();
				// Ambil data dari Database 
				$id_pegawai				= $data['id_pegawai'];
			}

			$data = array(
				'title' => "Data Pegawai"
			);
			$where = array('id' => $id);
			$data['hak_akses'] 		= $this->M_Role->get_data()->result();
			$data['jabatan']	 	= $this->db->query("SELECT * FROM jabatan")->result();
			$data['golongan']	 	= $this->db->query("SELECT * FROM golongan")->result();
			$data['tunjangan']	 	= $this->db->query("SELECT * FROM tunjangan")->result();
			$data['potongan']	 	= $this->db->query("SELECT * FROM potongan")->result();
			$data['tunjangan_pegawai']	 	= $this->db->query("SELECT * FROM tunjangan_pegawai INNER JOIN tunjangan ON tunjangan_pegawai.id_tunjangan = tunjangan.id_tunjangan WHERE tunjangan_pegawai.id_pegawai = '$id_pegawai'")->result();
			$data['potongan_pegawai']	 	= $this->db->query("SELECT * FROM potongan_pegawai WHERE id_pegawai = '$id_pegawai'")->result();
			$data['admin'] 			= $this->db->query("SELECT * FROM pegawai WHERE id='$id'")->result();
			$this->load->view('pages/Admin/pegawai/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id		    		      = $this->input->post('id');
		$id_pegawai         	  = $this->input->post('id_pegawai');
		$nip         	          = $this->input->post('nip');
		$name         	          = $this->input->post('name');
		$jabatan         	      = $this->input->post('jabatan');
		$golongan         	      = $this->input->post('golongan');
		$jk         	     	  = $this->input->post('jk');
		$alamat         	      = $this->input->post('alamat');
		$telp       	  	      = $this->input->post('telp');
		$status_kawin       	  = $this->input->post('status_kawin');
		$jumlah     		  	  = $this->input->post('jumlah');
		$tunjangan     		  	  = $this->input->post('tunjangan');
		$potongan     		  	  = $this->input->post('potongan');
		$bank     		  		  = $this->input->post('bank');
		$norek     		  		  = $this->input->post('norek');
		$username     		  	  = $this->input->post('username');
		$password     		  	  = $this->input->post('password');
		$role   	  		  	  = $this->input->post('role');

		if ($tunjangan > 0) {
			$where = array('id_pegawai' => $id_pegawai);
			$this->db->delete('tunjangan_pegawai', $where);
			foreach ($tunjangan as $x) {

				$data = array(
					'id_pegawai'		=> $id_pegawai,
					'id_tunjangan'		=> $x
				);

				$this->db->insert('tunjangan_pegawai', $data);
			}
		} else {
			$where = array('id_pegawai' => $id_pegawai);
			$this->db->delete('tunjangan_pegawai', $where);
		}

		if ($potongan > 0) {
			$where = array('id_pegawai' => $id_pegawai);
			$this->db->delete('potongan_pegawai', $where);
			foreach ($potongan as $y) {
				$data = array(
					'id_pegawai'		=> $id_pegawai,
					'id_potongan'		=> $y
				);

				$this->db->insert('potongan_pegawai', $data);
			}
		} else {
			$where = array('id_pegawai' => $id_pegawai);
			$this->db->delete('potongan_pegawai', $where);
		}

		if ($jk == NULL) {
			$jk = "L";
		} else {
			$jk = "P";
		}
		$img 				= $_FILES['img'];
		$result				= $this->M_Admin->check_img($id);

		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
			$passwordLama		= $data['password'];
		}

		if ($password == '') {
			// Jika Kosong
			$password  			= $passwordLama;
		} else {
			// Jika Ada
			$password           = sha1($password);
		}

		if ($img) {
			// Jika Field ada
			$config['upload_path']		= './assets/img/avatar';
			$config['allowed_types']	= 'jpg|png|jpeg';
			$config['max_size']			= 2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('img')) {
				$img = $this->upload->data('file_name');
				$this->db->set('img', $img);
				if ($foto != 'default.png') {
					$target_file	= './assets/img/avatar/' . $foto;
					unlink($target_file);
				}
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = array(
			'id_pegawai'	=> $id_pegawai,
			'nip'			=> $nip,
			'nama'			=> $name,
			'id_jabatan'	=> $jabatan,
			'id_golongan'	=> $golongan,
			'jenis_kelamin'	=> $jk,
			'alamat'		=> $alamat,
			'no_hp'			=> $telp,
			'status_kawin'	=> $status_kawin,
			'jumlah_anak'	=> $jumlah,
			'bank'			=> $bank,
			'no_rekening'	=> $norek,
			'username'		=> $username,
			'password'		=> $password,
			'role'			=> $role
		);

		$where = array('id' => $id);
		$this->db->update('pegawai', $data, $where);
		redirect('admin/pegawai');
	}

	public function delete($id)
	{
		$result				= $this->M_Admin->check_img($id);
		$result2				= $this->db->query("SELECT * FROM pegawai WHERE id='$id'");

		if ($result2->num_rows() > 0) {
			$data	= $result2->row_array();
			// Ambil data dari Database 
			$id_pegawai				= $data['id_pegawai'];
		}

		$where = array('id_pegawai' => $id_pegawai);
		$this->db->delete('tunjangan_pegawai', $where);

		$where = array('id_pegawai' => $id_pegawai);
		$this->db->delete('potongan_pegawai', $where);

		if ($result->num_rows() > 0) {
			$data	= $result->row_array();
			// Ambil data dari Database 
			$foto				= $data['img'];
		}

		if ($foto != 'default.png') {
			$target_file	= './assets/img/avatar/' . $foto;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('pegawai', $where);
		redirect('admin/pegawai');
	}
}
