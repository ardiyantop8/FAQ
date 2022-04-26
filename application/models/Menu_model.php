<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

	public function getSubMenu()
	{
		$query = "SELECT `user_sub_menu` .*, `user_menu` . `menu` 
				  FROM   `user_sub_menu` JOIN  `user_menu`
				  ON 	 `user_sub_menu`. `menu_id` = `user_menu` . `id`
				 ";
		return $this->db->query($query)->result_array();
	}


	public function proses_download()
	{
		$hasil = $this->db->query("SELECT * FROM user WHERE role_id = 2");

		return $hasil;
		// echo "<pre>";print_r($hasil);die;    
	}

	public function getDataPemilih()

	{
		$hasil = $this->db->query("SELECT * FROM user WHERE role_id = 3");

		return $hasil;
	}

	public function getDataKandidat()

	{
		$hasil = $this->db->query("SELECT * FROM user WHERE role_id = 2");

		return $hasil;
	}

	public function lihatkandidat($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function hapus_data_pemilih($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_data_kandidat($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function hapus_role($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function detail_data_pemilih($id_user = NULL)
	{
		$query 			= $this->db->get_where('user', array('id_user' => $id_user))->row();
		return $query;
	}

	// test vue //
	public function showAll()
	{
		$query = $this->db->get('tes');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
	public function addUser($data)
	{
		return $this->db->insert('tes', $data);
	}
	public function updateUser($id, $field)
	{
		$this->db->where('id', $id);
		$this->db->update('tes', $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tes');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	public function searchUser($match)
	{
		$field = array('firstname', 'lastname', 'gender', 'birthday', 'email', 'contact', 'address');
		$this->db->like('concat(' . implode(',', $field) . ')', $match);
		$query = $this->db->get('tes');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}
}
