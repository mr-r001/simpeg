<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WorkshopController extends CI_Controller
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
                'title' => "Data Workshop"
            );
            $id = $this->session->userdata('id');
            $data['workshop']         = $this->db->query("SELECT *, workshop_dosen.id as id FROM workshop_dosen INNER JOIN tingkatan ON workshop_dosen.id_tingkatan = tingkatan.id WHERE id_user = $id")->result();
            $this->load->view('pages/Dosen/workshop/index.php', $data);
        } else {
            redirect('/');
        }
    }

    public function create()
    {
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Workshop"
            );
            $data['tingkatan']     = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Dosen/workshop/add', $data);
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
            $upload_path            = './assets/img/dosen/sertif_workshop/';
            $dname                  = explode(".", $_FILES['doc']['name']);
            $ext                    = end($dname);
            $file_name              = rand(100, 10000) . "." . $ext;
            move_uploaded_file($tmp_name, "$upload_path/$file_name");
        } else {
            $this->session->set_flashdata('error', 'File terlalu besar');
            redirect('dosen/pelatihan/workshop/create');
        }

        $data = array(
            'id_user'               => $this->session->userdata('id'),
            'judul'                 => $judul,
            'tahun'                 => $tahun,
            'id_tingkatan'          => $id_tingkatan,
            'kota'                  => $kota,
            'sertifikat'            => $file_name,
        );

        $this->db->insert('workshop_dosen', $data);
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('dosen/pelatihan/workshop');
    }

    public function edit($id)
    {
        if ($this->session->userdata('role') === '2') {
            $data = array(
                'title' => "Data Workshop"
            );
            $data['workshop']               = $this->db->query("SELECT * FROM workshop_dosen WHERE id='$id'")->result();
            $data['tingkatan']              = $this->db->query("SELECT * FROM tingkatan")->result();
            $this->load->view('pages/Dosen/workshop/edit', $data);
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

        $result                     = $this->M_Dosen->check($id, 'workshop_dosen');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($_FILES['doc']['size'] > 0) {
            if ($_FILES['doc']['size'] < $max_size) {
                if ($doc != 'default.png') {
                    $target_file    = './assets/img/dosen/sertif_workshop/' . $doc;
                    unlink($target_file);
                }

                $tmp_name               = $_FILES['doc']['tmp_name'];
                $upload_path            = './assets/img/dosen/sertif_workshop/';
                $dname                  = explode(".", $_FILES['doc']['name']);
                $ext                    = end($dname);
                $file_name              = rand(100, 10000) . "." . $ext;
                move_uploaded_file($tmp_name, "$upload_path/$file_name");

                $data = array(
                    'sertifikat'            => $file_name,
                );
                $where = array('id' => $id);
                $this->db->update('workshop_dosen', $data, $where);
            } else {
                $this->session->set_flashdata('error', 'File terlalu besar');
                redirect('dosen/pelatihan/workshop/create');
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
        $this->db->update('workshop_dosen', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('dosen/pelatihan/workshop');
    }

    public function delete($id)
    {
        $result                    = $this->M_Dosen->check($id, 'workshop_dosen');
        if ($result->num_rows() > 0) {
            $data               = $result->row_array();
            $doc                = $data['sertifikat'];
        }

        if ($doc != 'default.png') {
            $target_file    = './assets/img/dosen/sertif_workshop/' . $doc;
            unlink($target_file);
        }

        $where = array('id' => $id);
        $this->db->delete('workshop_dosen', $data, $where);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('dosen/pelatihan/workshop');
    }
}
