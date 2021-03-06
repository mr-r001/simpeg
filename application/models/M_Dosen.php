<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dosen extends CI_Model
{
    public function check_img($id)
    {
        $this->db->select('*');
        $this->db->from('personal_dosen');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query;
    }
    public function check_file($id)
    {
        $this->db->select('*');
        $this->db->from('pendidikan_dosen');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query;
    }

    public function check($id, $table)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query;
    }
}
