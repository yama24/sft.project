<?php

class M_transaction extends CI_Model
{
	public function getAllTransactionLabel()
	{
		// $this->db->order_by('id', 'DESC');
		// return $this->db->get('product')->result_array();
		return $this->db->get_where('label', ['type' => 1])->result_array();
	}
	public function getLabelByID()
	{
		$id_uri = $this->uri->segment(3);
		return $this->db->get_where('label', ['id' => $id_uri])->row_array();
	}
	public function getProductById()
	{
		$id_uri = $this->uri->segment(3);
		return $this->db->get_where('product', ['id' => $id_uri])->row_array();
	}
	public function insertTransaction()
	{
		$pengirim = $this->input->post('pengirim');
		$hppengirim = $this->input->post('hppengirim');
		$penerima = $this->input->post('penerima');
		$hppenerima = $this->input->post('hppenerima');
		$kurir = $this->input->post('kurir');
		$alamat = $this->input->post('alamat');
		$date = time();
		$key = "sft" . $date . "project";

		$idProduk = $this->input->post('produk');
		$jumlah = $this->input->post('jumlah');

		$total = count($idProduk);

		$dataLabel = [
			'transaction_key_label' => $key,
			'type' => 1,
			'sender' => $pengirim,
			'num_sender' => $hppengirim,
			'receiver' => $penerima,
			'num_receiver' => $hppenerima,
			'address_receiver' => $alamat,
			'courier' => $kurir,
			'date_int' => $date,
		];
		$this->db->insert('label', $dataLabel);

		for ($i = 0; $i < $total; $i++) {
			$id = $idProduk[$i];
			$jml = $jumlah[$i];
			$harga = $this->db->get_where('product', ['id' => $id])->row_array();
			$price = $harga['jual_product'] * $jml;
			$dataTransaction = [
				'transaction_key' => $key,
				'item' => $id,
				'amount' => $jumlah[$i],
				'price' => $price,
				'date' => $date,
			];
			$this->db->insert('transaction', $dataTransaction);
		}
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
