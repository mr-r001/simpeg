<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KursusController extends CI_Controller
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
                'title' => "Data Kursus"
            );
            $id = $this->session->userdata('id');
            $data['kursus']         = $this->db->query("SELECT *, kursus_dosen.id as id FROM kursus_dosen INNER JOIN tingkatan ON kursus_dosen.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
            $this->load->view('pages/Dosen/kursus/index.php', $data);
        } else {
            redirect('/');
        }
    }

    public function create()
    {
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Kursus"
            );
            $data['tingkatan']     = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Dosen/kursus/add', $data);
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
        $max_size                  = 2000000;

        if ($_FILES['doc']['size'] < $max_size) {
            $tmp_name               = $_FILES['doc']['tmp_name'];
            $upload_path            = './assets/img/dosen/sertif_kursus/';
            $dname                  = explode(".", $_FILES['doc']['name']);
            $ext                    = end($dname);
            $file_name              = "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
            move_uploaded_file($tmp_name, "$upload_path/$file_name");
        } else {
            $this->session->set_flashdata('error', 'File terlalu besar');
            redirect('dosen/pelatihan/kursus/create');
        }

        $data = array(
            'id_user'               => $this->session->userdata('id'),
            'judul'                 => $judul,
            'tahun'                 => $tahun,
            'id_tingkatan'          => $id_tingkatan,
            'kota'                  => $kota,
            'sertifikat'            => $file_name,
        );

        $this->db->insert('kursus_dosen', $data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('dosen/pelatihan/kursus');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Kursus"
            );
            $data['kursus']                 = $this->db->query("SELECT * FROM kursus_dosen WHERE id='$id'")->result();
            $data['tingkatan']              = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Dosen/kursus/edit', $data);
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
        $max_size                   = 2000000;

        $result                     = $this->M_Dosen->check($id, 'kursus_dosen');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($_FILES['doc']['size'] > 0) {
            if ($_FILES['doc']['size'] < $max_size) {
                if ($doc != 'default.png') {
                    $target_file    = './assets/img/dosen/sertif_kursus/' . $doc;
                    unlink($target_file);
                }

                $tmp_name               = $_FILES['doc']['tmp_name'];
                $upload_path            = './assets/img/dosen/sertif_kursus/';
                $dname                  = explode(".", $_FILES['doc']['name']);
                $ext                    = end($dname);
                $file_name              = "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
                move_uploaded_file($tmp_name, "$upload_path/$file_name");

                $data = array(
                    'sertifikat'            => $file_name,
                );
                $where = array('id' => $id);
                $this->db->update('kursus_dosen', $data, $where);
            } else {
                $this->session->set_flashdata('error', 'File terlalu besar');
                redirect('dosen/pelatihan/kursus/create');
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
        $this->db->update('kursus_dosen', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('dosen/pelatihan/kursus');
    }

    public function delete($id)
    {
        $result                    = $this->M_Dosen->check($id, 'kursus_dosen');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($doc != 'default.png') {
            $target_file    = './assets/img/dosen/sertif_kursus/' . $doc;
            unlink($target_file);
        }

        $where = array('id' => $id);
        $this->db->delete('kursus_dosen', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('dosen/pelatihan/kursus');
    }
}
