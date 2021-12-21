<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model M_Auth
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    	Ryan Aprianto
 * @link      	https://github.com/Ryan1604/
 *
 */

class M_Auth extends CI_Model
{

	// ------------------------------------------------------------------------
	public function check_admin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		$query = $this->db->get();

		return $query;
	}

	public function check_auth($username, $password)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('nip', $username);
		$this->db->where('password', sha1($password));
		$query = $this->db->get();

		return $query;
	}

	public function update($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}
}
