<?php

class M_data extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk mengupdate atau mengubah data di database
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	// fungsi untuk mengambil data dari database
	function get_data($table)
	{
		return $this->db->get($table);
	}
	// fungsi untuk menginput data ke database
	function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	// fungsi untuk mengedit data
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	// fungsi untuk menghapus data dari database
	function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	public function getLinksBySlug($slug)
	{
		$this->db->select("
		*,
		label.id AS Id, 
		label.sender AS Sender,
		label.num_sender AS Num_sender,
		label.receiver AS Receiver,
		label.num_receiver AS Num_receiver,
		label.address_receiver AS Address_receiver,
		label.courier AS Courier,
		label.order AS Order
		");
		$this->db->from("label");
		$this->db->order_by("label.id", "asc");
		$this->db->where('label.id', $slug);
		return $this->db->get()->row_array();
	}

	// AKHIR FUNGSI CRUD
}
