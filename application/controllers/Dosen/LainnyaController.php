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
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Pelatihan Lainnya"
            );
            $id = $this->session->userdata('id');
            $data['lainnya']         = $this->db->query("SELECT *, lainnya_dosen.id as id FROM lainnya_dosen INNER JOIN tingkatan ON lainnya_dosen.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
            $this->load->view('pages/Dosen/lainnya/index.php', $data);
        } else {
            redirect('/');
        }
    }

    public function create()
    {
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Pelatihan Lainnya"
            );
            $data['tingkatan']     = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Dosen/lainnya/add', $data);
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
            $upload_path            = './assets/img/dosen/sertif_lainnya/';
            $dname                  = explode(".", $_FILES['doc']['name']);
            $ext                    = end($dname);
            $file_name              = "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
            move_uploaded_file($tmp_name, "$upload_path/$file_name");
        } else {
            $this->session->set_flashdata('error', 'File terlalu besar');
            redirect('dosen/pelatihan/lainnya/create');
        }

        $data = array(
            'id_user'               => $this->session->userdata('id'),
            'judul'                 => $judul,
            'tahun'                 => $tahun,
            'id_tingkatan'          => $id_tingkatan,
            'kota'                  => $kota,
            'sertifikat'            => $file_name,
        );

        $this->db->insert('lainnya_dosen', $data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('dosen/pelatihan/lainnya');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Pelatihan Lainnya"
            );
            $data['lainnya']                 = $this->db->query("SELECT * FROM lainnya_dosen WHERE id='$id'")->result();
            $data['tingkatan']              = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Dosen/lainnya/edit', $data);
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

        $result                     = $this->M_Dosen->check($id, 'lainnya_dosen');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($_FILES['doc']['size'] > 0) {
            if ($_FILES['doc']['size'] < $max_size) {
                if ($doc != 'default.png') {
                    $target_file    = './assets/img/dosen/sertif_lainnya/' . $doc;
                    unlink($target_file);
                }

                $tmp_name               = $_FILES['doc']['tmp_name'];
                $upload_path            = './assets/img/dosen/sertif_lainnya/';
                $dname                  = explode(".", $_FILES['doc']['name']);
                $ext                    = end($dname);
                $file_name              = "doc_" . strtolower($this->session->userdata('nama')) . "." . $ext;
                move_uploaded_file($tmp_name, "$upload_path/$file_name");

                $data = array(
                    'sertifikat'            => $file_name,
                );
                $where = array('id' => $id);
                $this->db->update('lainnya_dosen', $data, $where);
            } else {
                $this->session->set_flashdata('error', 'File terlalu besar');
                redirect('dosen/pelatihan/lainnya/create');
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
        $this->db->update('lainnya_dosen', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('dosen/pelatihan/lainnya');
    }

    public function delete($id)
    {
        $result                    = $this->M_Dosen->check($id, 'lainnya_dosen');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($doc != 'default.png') {
            $target_file    = './assets/img/dosen/sertif_lainnya/' . $doc;
            unlink($target_file);
        }

        $where = array('id' => $id);
        $this->db->delete('lainnya_dosen', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('dosen/pelatihan/lainnya');
    }
}
