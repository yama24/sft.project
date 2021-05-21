<?php

class M_label extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	function getLabel()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get_where('label', ['type' => 0])->result_array();
	}
	function insertLabel()
	{
		$sender = $this->input->post('sender');
		$num_sender = $this->input->post('num_sender');
		$receiver = $this->input->post('receiver');
		$num_receiver = $this->input->post('num_receiver');
		$address_receiver = $this->input->post('address_receiver');
		$courier = $this->input->post('courier');
		$order = $this->input->post('order');
		$date = date('Y-m-d H:i:s');
		$time = time();

		$data = array(
			'sender' => $sender,
			'num_sender' => $num_sender,
			'receiver' => $receiver,
			'num_receiver' => $num_receiver,
			'address_receiver' => $address_receiver,
			'courier' => $courier,
			'order' => $order,
			'date_datetime' => $date,
			'date_int' => $time,
			'date' => date('j', $time),
			'month' => date('n', $time),
			'year' => date('Y', $time),
		);

		$this->db->insert('label', $data);
	}
	function editLabel()
	{
		$id = $this->input->post('id');
		$sender = $this->input->post('sender');
		$num_sender = $this->input->post('num_sender');
		$receiver = $this->input->post('receiver');
		$num_receiver = $this->input->post('num_receiver');
		$address_receiver = $this->input->post('address_receiver');
		$courier = $this->input->post('courier');
		$order = $this->input->post('order');
		$data = array(
			'sender' => $sender,
			'num_sender' => $num_sender,
			'receiver' => $receiver,
			'num_receiver' => $num_receiver,
			'address_receiver' => $address_receiver,
			'courier' => $courier,
			'order' => $order,
		);
		$this->db->where('id', $id);
		$this->db->update('label', $data);
	}
	function deleteLabel($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('label');
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
