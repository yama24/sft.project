<?php

class M_label extends CI_Model
{
	var $table = 'label'; //nama tabel dari database
	var $column_order = array(null, 'sender', 'num_sender', 'receiver', 'num_receiver', 'address_receiver', 'courier', 'order'); //field yang ada di table user
	var $column_search = array('sender', 'num_sender', 'receiver', 'num_receiver', 'address_receiver', 'courier', 'order'); //field yang diizin untuk pencarian 
	var $order = array('id' => 'desc'); // default order 

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

	private function _get_datatables_query()
	{

		$this->db->where('type', 0);
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item) // loop column 
		{
			if ($_POST['search']['value']) // if datatable send POST for search
			{

				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	// AKHIR FUNGSI CRUD
}
