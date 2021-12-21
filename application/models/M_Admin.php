<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Admin extends CI_Model
{

	public function get_data($id = NULL)
	{
		$this->db->from('auth');
		if ($id != NULL) {
			$this->db->where('id_auth', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	// ------------------------------------------------------------------------
	public function store($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}
	// ------------------------------------------------------------------------

	public function delete($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function check_img($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query;
	}
}
