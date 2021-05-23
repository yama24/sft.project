<?php

class M_product extends CI_Model
{
	var $table = 'product'; //nama tabel dari database
	var $column_order = array(null, 'date', 'nama_product', 'gambar_product', 'modal_product', 'jual_product', 'berat_product', 'due_date_product'); //field yang ada di table user
	var $column_search = array('date', 'nama_product', 'gambar_product', 'modal_product', 'jual_product', 'berat_product', 'due_date_product'); //field yang diizin untuk pencarian 
	var $order = array('id' => 'desc'); // default order 

	public function getAllProduct()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('product')->result_array();
	}
	public function getActiveProduct()
	{
		$this->db->order_by('id', 'DESC');
		$this->db->where('product.due_date_product >', time());
		return $this->db->get('product')->result_array();
	}
	public function getProductById()
	{
		$id_uri = $this->uri->segment(3);
		return $this->db->get_where('product', ['id' => $id_uri])->row_array();
	}
	public function imgProductConfig()
	{
		$config['upload_path'] = './assets/dist/img/product/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = '2048';
		$this->load->library('upload', $config);
	}
	public function insertProduct()
	{
		$gambar = $this->upload->data('file_name');
		$data = [
			'nama_product' => $this->input->post('nama'),
			'gambar_product' => $gambar,
			'modal_product' => $this->input->post('modal'),
			'jual_product' => $this->input->post('jual'),
			'berat_product' => $this->input->post('berat'),
			'due_date_product' => strtotime($this->input->post('duedate')),
			'date' => time(),
		];
		$this->db->insert('product', $data);
		$this->session->set_flashdata('add', 'Produk berhasil diinput!');
		redirect('product');
	}
	public function editProductImg()
	{
		$id = $this->input->post('id');
		$old_image = $this->db->get_where('product', ['id' => $id])->row_array();
		unlink(FCPATH . 'assets/dist/img/product/' . $old_image['gambar_product']);
		$gambar = $this->upload->data('file_name');
		$data = ['gambar_product' => $gambar];
		$this->db->where('id', $id);
		$this->db->update('product', $data);
	}
	public function editProduct()
	{
		$id = $this->input->post('id');
		$data = [
			'nama_product' => $this->input->post('nama'),
			'modal_product' => $this->input->post('modal'),
			'jual_product' => $this->input->post('jual'),
			'berat_product' => $this->input->post('berat'),
			'due_date_product' => strtotime($this->input->post('duedate')),
			'date' => time(),
		];
		$this->db->where('id', $id);
		$this->db->update('product', $data);
		$this->session->set_flashdata('update', 'Produk berhasil diedit!');
		redirect('product');
	}
	public function deleteProduct($id)
	{
		$gambar = $this->db->get_where('product', ['id' => $id])->row_array();
		unlink(FCPATH . 'assets/dist/img/product/' . $gambar['gambar_product']);
		$this->db->where('id', $id);
		$this->db->delete('product');
	}
	private function _get_datatables_query()
	{

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
}
