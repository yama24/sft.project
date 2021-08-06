<?php

class M_transaction extends CI_Model
{
	var $table = 'label'; //nama tabel dari database
	var $column_order = array(null, 'date_int', 'transaction_key_label', 'sender', 'receiver', 'courier'); //field yang ada di table user
	var $column_search = array('date_int', 'transaction_key_label', 'sender', 'receiver', 'courier'); //field yang diizin untuk pencarian 
	var $order = array('id' => 'desc'); // default order 

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
	public function getProvinces()
	{
		$this->db->order_by('name');
		return $this->db->get('provinces')->result_array();
	}
	public function getRegencyByProvince()
	{
		$province = $this->m_transaction->getLabelByKey();
		return $this->db->get_where('regencies', ['province_id' => $province['province_id']])->result_array();
	}
	public function getDistrictByRegency()
	{
		$regency = $this->m_transaction->getLabelByKey();
		return $this->db->get_where('districts', ['regency_id' => $regency['regency_id']])->result_array();
	}
	public function getVillageByDistrict()
	{
		$district = $this->m_transaction->getLabelByKey();
		return $this->db->get_where('villages', ['district_id' => $district['district_id']])->result_array();
	}
	public function getPostalcodeByVillage()
	{
		$village = $this->m_transaction->getLabelByKey();
		return $this->db->get_where('postalcodes', ['village_id' => $village['village_id']])->result_array();
	}
	public function insertTransaction()
	{
		$tanggal = $this->input->post('tanggal');
		$pengirim = $this->input->post('pengirim');
		$hppengirim = $this->input->post('hppengirim');
		$penerima = $this->input->post('penerima');
		$hppenerima = $this->input->post('hppenerima');
		$province = $this->input->post('provinsi');
		$regency = $this->input->post('kabupaten');
		$district = $this->input->post('kecamatan');
		$village = $this->input->post('desa');
		$postalcode = $this->input->post('postalcode');
		$alamat = $this->input->post('alamat');
		$kurir = $this->input->post('kurir');
		$ongkir = $this->input->post('ongkir');
		$resi = $this->input->post('resi');
		$date = strtotime($tanggal);
		$key = "SFT" . $date;
		$idProduk = $this->input->post('produk');
		$jumlah = $this->input->post('jumlah');
		$berat = $this->input->post('berat');
		$total = count($idProduk);
		$dataLabel = [
			'transaction_key_label' => $key,
			'type' => 1,
			'sender' => $pengirim,
			'num_sender' => $hppengirim,
			'receiver' => $penerima,
			'num_receiver' => $hppenerima,
			'courier' => $kurir,
			'ongkir' => $ongkir,
			'resi' => $resi,
			'province_id' => $province,
			'regency_id' => $regency,
			'district_id' => $district,
			'village_id' => $village,
			'postalcode_id' => $postalcode,
			'address_receiver_transaction' => $alamat,
			'date_int' => $date,
			'date' => date('j', $date),
			'month' => date('n', $date),
			'year' => date('Y', $date),
		];
		$this->db->insert('label', $dataLabel);
		for ($i = 0; $i < $total; $i++) {
			$id = $idProduk[$i];
			$jml = $jumlah[$i];
			$brt = $berat[$i];
			$harga = $this->db->get_where('product', ['id' => $id])->row_array();
			$price_buy = $harga['modal_product'] * $jml;
			$price_sell = $harga['jual_product'] * $jml;
			$beratTotal = $brt * $jml;
			$dataTransaction = [
				'transaction_key' => $key,
				'item' => $id,
				'amount' => $jumlah[$i],
				'price_buy' => $price_buy,
				'price_sell' => $price_sell,
				'weight' => $beratTotal,
				'date_int' => $date,
				'date' => date('j', $date),
				'month' => date('n', $date),
				'year' => date('Y', $date),
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
		$province = $this->input->post('provinsi');
		$regency = $this->input->post('kabupaten');
		$district = $this->input->post('kecamatan');
		$village = $this->input->post('desa');
		$postalcode = $this->input->post('postalcode');
		$alamat = $this->input->post('alamat');
		$kurir = $this->input->post('kurir');
		$ongkir = $this->input->post('ongkir');
		$resi = $this->input->post('resi');
		$idProduk = $this->input->post('produk');
		$jumlah = $this->input->post('jumlah');
		$berat = $this->input->post('berat');
		$total = count($idProduk);
		$dataLabel = [
			'sender' => $pengirim,
			'num_sender' => $hppengirim,
			'receiver' => $penerima,
			'num_receiver' => $hppenerima,
			'courier' => $kurir,
			'ongkir' => $ongkir,
			'resi' => $resi,
			'province_id' => $province,
			'regency_id' => $regency,
			'district_id' => $district,
			'village_id' => $village,
			'postalcode_id' => $postalcode,
			'address_receiver_transaction' => $alamat,
		];
		$this->db->where('transaction_key_label', $key);
		$this->db->update('label', $dataLabel);
		$this->db->where('transaction_key', $key);
		$this->db->delete('transaction');
		for ($i = 0; $i < $total; $i++) {
			$id = $idProduk[$i];
			$jml = $jumlah[$i];
			$brt = $berat[$i];
			$harga = $this->db->get_where('product', ['id' => $id])->row_array();
			$price_buy = $harga['modal_product'] * $jml;
			$price_sell = $harga['jual_product'] * $jml;
			$beratTotal = $brt * $jml;
			$dataTransaction = [
				'transaction_key' => $key,
				'item' => $id,
				'amount' => $jumlah[$i],
				'price_buy' => $price_buy,
				'price_sell' => $price_sell,
				'weight' => $beratTotal,
				'date_int' => $date,
				'date' => date('j', $date),
				'month' => date('n', $date),
				'year' => date('Y', $date),
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
	public function getLinksBySlug($slug)
	{
		return $this->db->get_where('label', ['id' => $slug])->row_array();
	}
	private function _get_datatables_query()
	{

		$this->db->where('type', 1);
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
