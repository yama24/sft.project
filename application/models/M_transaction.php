<?php

class M_transaction extends CI_Model
{
	public function getAllTransactionLabel()
	{
		$this->db->order_by('id', 'DESC');
		// return $this->db->get('product')->result_array();
		return $this->db->get_where('label', ['type' => 1])->result_array();
	}
	public function getLabelByKey()
	{
		$key_uri = $this->uri->segment(3);
		return $this->db->get_where('label', ['transaction_key_label' => $key_uri])->row_array();
	}
	public function getTransactionByKey()
	{
		$key_uri = $this->uri->segment(3);
		// $this->db->select('item');
		// $this->db->where('transaction_key', $key_uri);
		// return $this->db->get('transaction')->result_array();
		return $this->db->get_where('transaction', ['transaction_key' => $key_uri])->result_array();
	}
	public function getTransactionProductByKey()
	{
		$key_uri = $this->uri->segment(3);

		$this->db->select('*');
		$this->db->from("transaction");
		$this->db->join('product', 'transaction.item = product.id');
		$this->db->where('transaction.transaction_key', $key_uri);
		$this->db->order_by("transaction.id", "asc");
		return $this->db->get()->result_array();
	}
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
	public function getInactiveCheckedProduct($arrayProduct)
	{
		$total = count($arrayProduct);
		$inactiveCheckedProduct = [];
		for ($i = 0; $i < $total; $i++) {
			if ($arrayProduct[$i]['due_date_product'] < time()) {
				array_push($inactiveCheckedProduct, $arrayProduct[$i]);
			}
		}
		return $inactiveCheckedProduct;
	}
	public function getProductById($id)
	{
		return $this->db->get_where('product', ['id' => $id])->row_array();
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
	public function editTransaction()
	{
		$key = $this->input->post('key');
		$date = $this->input->post('date');
		$pengirim = $this->input->post('pengirim');
		$hppengirim = $this->input->post('hppengirim');
		$penerima = $this->input->post('penerima');
		$hppenerima = $this->input->post('hppenerima');
		$kurir = $this->input->post('kurir');
		$alamat = $this->input->post('alamat');

		$idProduk = $this->input->post('produk');
		$jumlah = $this->input->post('jumlah');

		$total = count($idProduk);

		$dataLabel = [
			'type' => 1,
			'sender' => $pengirim,
			'num_sender' => $hppengirim,
			'receiver' => $penerima,
			'num_receiver' => $hppenerima,
			'address_receiver' => $alamat,
			'courier' => $kurir,
		];
		$this->db->where('transaction_key_label', $key);
		$this->db->update('label', $dataLabel);

		$this->db->where('transaction_key', $key);
		$this->db->delete('transaction');

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
	public function deleteTransaction($key)
	{
		$this->db->where('transaction_key', $key);
		$this->db->delete('transaction');

		$this->db->where('transaction_key_label', $key);
		$this->db->delete('label');
	}
}
