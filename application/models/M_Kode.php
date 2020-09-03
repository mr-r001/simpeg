<?php

class M_Kode extends CI_Model
{

    public function generate($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_jabatan');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }

    public function generate_golongan($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_golongan');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }

    public function generate_potongan($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_potongan');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }

    public function generate_tunjangan($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_tunjangan');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }

    public function generate_pegawai($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_pegawai');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }

    public function generate_absensi($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_absensi');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }

    public function generate_gaji($prefix =  null, $table = null, $field = null)
    {
        $this->db->select('id_gaji');
        $this->db->like($field, $prefix, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);

        return $this->db->get($table)->row_array();
    }
}
