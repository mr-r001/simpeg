<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LainnyaController extends CI_Controller
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
                'title' => "Data Pelatihan Lainnya"
            );
            $id = $this->session->userdata('id');
            $data['lainnya']         = $this->db->query("SELECT *, lainnya_pegawai.id as id FROM lainnya_pegawai INNER JOIN tingkatan ON lainnya_pegawai.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
            $this->load->view('pages/Pegawai/lainnya/index.php', $data);
        } else {
            redirect('/');
        }
    }

    public function create()
    {
        if ($this->session->userdata('role') === '3') {
            $data = array(
                'title' => "Data Pelatihan Lainnya"
            );
            $data['tingkatan']     = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Pegawai/lainnya/add', $data);
        } else {
            redirect('/');
        }
    }

    public function store()
    {
        $judul                     = $this->input->post('judul');
        $tahun                     = $this->input->post('tahun');
        $kota                      = $this->input->post('kota');
        $id_tingkatan              = $this->input->post('id_tingkatan');
        $max_size                  = 3000000;

        if ($_FILES['doc']['size'] < $max_size) {
            $tmp_name               = $_FILES['doc']['tmp_name'];
            $upload_path            = './assets/img/pegawai/sertif_lainnya/';
            $dname                  = explode(".", $_FILES['doc']['name']);
            $ext                    = end($dname);
            $file_name              = rand(100, 10000) . "." . $ext;
            move_uploaded_file($tmp_name, "$upload_path/$file_name");
        } else {
            $this->session->set_flashdata('error', 'File terlalu besar');
            redirect('pegawai/pelatihan/lainnya/create');
        }

        $data = array(
            'id_user'               => $this->session->userdata('id'),
            'judul'                 => $judul,
            'tahun'                 => $tahun,
            'id_tingkatan'          => $id_tingkatan,
            'kota'                  => $kota,
            'sertifikat'            => $file_name,
        );

        $this->db->insert('lainnya_pegawai', $data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('pegawai/pelatihan/lainnya');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') === '3') {
            $data = array(
                'title' => "Data Pelatihan Lainnya"
            );
            $data['lainnya']                = $this->db->query("SELECT * FROM lainnya_pegawai WHERE id='$id'")->result();
            $data['tingkatan']              = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Pegawai/lainnya/edit', $data);
        } else {
            redirect('/');
        }
    }

    public function update()
    {
        $id                         = $this->input->post('id');
        $judul                      = $this->input->post('judul');
        $tahun                      = $this->input->post('tahun');
        $kota                       = $this->input->post('kota');
        $id_tingkatan               = $this->input->post('id_tingkatan');
        $max_size                   = 3000000;

        $result                     = $this->M_Dosen->check($id, 'lainnya_pegawai');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($_FILES['doc']['size'] > 0) {
            if ($_FILES['doc']['size'] < $max_size) {
                if ($doc != 'default.png') {
                    $target_file    = './assets/img/pegawai/sertif_lainnya/' . $doc;
                    unlink($target_file);
                }

                $tmp_name               = $_FILES['doc']['tmp_name'];
                $upload_path            = './assets/img/pegawai/sertif_lainnya/';
                $dname                  = explode(".", $_FILES['doc']['name']);
                $ext                    = end($dname);
                $file_name              = rand(100, 10000) . "." . $ext;
                move_uploaded_file($tmp_name, "$upload_path/$file_name");

                $data = array(
                    'sertifikat'            => $file_name,
                );
                $where = array('id' => $id);
                $this->db->update('lainnya_pegawai', $data, $where);
            } else {
                $this->session->set_flashdata('error', 'File terlalu besar');
                redirect('pegawai/pelatihan/lainnya/create');
            }
        }

        $data = array(
            'id_user'               => $this->session->userdata('id'),
            'judul'                 => $judul,
            'tahun'                 => $tahun,
            'id_tingkatan'          => $id_tingkatan,
            'kota'                  => $kota,
        );

        $where = array('id' => $id);
        $this->db->update('lainnya_pegawai', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('pegawai/pelatihan/lainnya');
    }

    public function delete($id)
    {
        $result                    = $this->M_Dosen->check($id, 'lainnya_pegawai');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($doc != 'default.png') {
            $target_file    = './assets/img/pegawai/sertif_lainnya/' . $doc;
            unlink($target_file);
        }

        $where = array('id' => $id);
        $this->db->delete('lainnya_pegawai', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('pegawai/pelatihan/lainnya');
    }
}
