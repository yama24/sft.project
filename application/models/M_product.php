<?php

class M_product extends CI_Model
{
	public function getAllProduct()
	{
		$this->db->order_by('id', 'DESC');
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
		$this->session->set_flashdata('add', 'Produk berhasil diedit!');
		redirect('product');
	}
	public function deleteProduct($id)
	{
		$gambar = $this->db->get_where('product', ['id' => $id])->row_array();
		unlink(FCPATH . 'assets/dist/img/product/' . $gambar['gambar_product']);
		$this->db->where('id', $id);
		$this->db->delete('product');
	}
}
