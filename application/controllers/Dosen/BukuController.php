<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BukuController extends CI_Controller
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
				'title' => "Data Buku"
			);
			$id = $this->session->userdata('id');
			$data['buku']	 	= $this->db->query("SELECT *, buku_dosen.id as id FROM buku_dosen INNER JOIN tingkatan ON buku_dosen.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
			$this->load->view('pages/Dosen/buku/index.php', $data);
		} else {
			redirect('/');
		}
	}

	public function create()
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Buku"
			);
			$data['tingkatan'] 	= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/buku/add', $data);
		} else {
			redirect('/');
		}
	}

	public function store()
	{
		$judul  	            = $this->input->post('judul');
		$isbn  	           		= $this->input->post('isbn');
		$penerbit  	        	= $this->input->post('penerbit');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$tahun  	            = $this->input->post('tahun');
		$max_size				= 2000000;
		$jenis_gambar 			= $_FILES['cover']['type'];

		if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/png") {
			if ($_FILES['cover']['size'] < $max_size) {
				$tmp_name 			= $_FILES['cover']['tmp_name'];
				$upload_path		= './assets/img/dosen/cover_buku/';
				$dname 				= explode(".", $_FILES['cover']['name']);
				$ext 				= end($dname);
				$file_name 			= rand(100, 10000) . "." . $ext;
				move_uploaded_file($tmp_name, "$upload_path/$file_name");

				$data = array(
					'id_user'			=> $this->session->userdata('id'),
					'judul'				=> $judul,
					'id_tingkatan'		=> $id_tingkatan,
					'isbn'				=> $isbn,
					'penerbit'			=> $penerbit,
					'tahun'				=> $tahun,
					'cover'				=> $file_name,
				);

				$this->db->insert('buku_dosen', $data);
				$this->session->set_flashdata('success', 'Data berhasil disimpan');
				redirect('dosen/tridharma/buku');
			} else {
				$this->session->set_flashdata('error', 'File terlalu besar');
				redirect('dosen/tridharma/buku/create');
			}
		} else {
			$this->session->set_flashdata('error', 'Jenis gambar yang anda kirim salah.');
			redirect('dosen/tridharma/buku/create');
		}
	}

	public function edit($id)
	{
		if ($this->session->userdata('role') === '2') {
			$data = array(
				'title' => "Data Buku"
			);
			$data['buku'] 				= $this->db->query("SELECT * FROM buku_dosen WHERE id='$id'")->result();
			$data['tingkatan'] 			= $this->db->query("SELECT * FROM tingkatan")->result();
			$this->load->view('pages/Dosen/buku/edit', $data);
		} else {
			redirect('/');
		}
	}

	public function update()
	{
		$id						= $this->input->post('id');
		$judul  	            = $this->input->post('judul');
		$isbn  	           		= $this->input->post('isbn');
		$penerbit  	        	= $this->input->post('penerbit');
		$id_tingkatan  	    	= $this->input->post('id_tingkatan');
		$tahun  	            = $this->input->post('tahun');
		$max_size				= 2000000;
		$jenis_gambar 			= $_FILES['cover']['type'];

		$result					= $this->M_Dosen->check($id, 'buku_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$cover			= $data['cover'];
		}

		if ($_FILES['cover']['size'] > 0) {
			if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/png") {
				if ($_FILES['cover']['size'] < $max_size) {
					if ($cover != 'default.png') {
						$target_file	= './assets/img/dosen/cover_buku/' . $cover;
						unlink($target_file);
					}

					$tmp_name 			= $_FILES['cover']['tmp_name'];
					$upload_path		= './assets/img/dosen/cover_buku/';
					$dname 				= explode(".", $_FILES['cover']['name']);
					$ext 				= end($dname);
					$file_name 			= rand(100, 10000) . "." . $ext;
					move_uploaded_file($tmp_name, "$upload_path/$file_name");

					$data = array(
						'cover'			=> $file_name,
					);
					$where = array('id' => $id);
					$this->db->update('buku_dosen', $data, $where);
				} else {
					$this->session->set_flashdata('error', 'File terlalu besar');
					redirect('dosen/tridharma/buku/create');
				}
			} else {
				$this->session->set_flashdata('error', 'Jenis gambar yang anda kirim salah.');
				redirect('dosen/tridharma/buku/create');
			}
		}

		$data = array(
			'id_user'			=> $this->session->userdata('id'),
			'judul'				=> $judul,
			'id_tingkatan'		=> $id_tingkatan,
			'isbn'				=> $isbn,
			'penerbit'			=> $penerbit,
			'tahun'				=> $tahun,
		);
		$where = array('id' => $id);
		$this->db->update('buku_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil diubah');
		redirect('dosen/tridharma/buku');
	}

	public function delete($id)
	{
		$result					= $this->M_Dosen->check($id, 'buku_dosen');
		if ($result->num_rows() > 0) {
			$data			= $result->row_array();
			$cover			= $data['cover'];
		}

		if ($cover != 'default.png') {
			$target_file	= './assets/img/dosen/cover_buku/' . $cover;
			unlink($target_file);
		}

		$where = array('id' => $id);
		$this->db->delete('buku_dosen', $data, $where);
		$this->session->set_flashdata('success', 'Data berhasil dihapus');
		redirect('dosen/tridharma/buku');
	}
}
