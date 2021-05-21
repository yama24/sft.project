<?php

class M_dashboard extends CI_Model
{
	function getAllProduct()
	{
		return $this->db->get('product')->result_array();
	}
	function getAllTransaction()
	{
		return $this->db->get_where('label', ['type' => 1])->result_array();
	}
	function getMonth()
	{
		$data['today'] = time();
		$data['d31'] = 2678400;
		$b = [];
		for ($i = 0; $i < 12; $i++) {
			$m = date('M y', ($data['today'] - ($data['d31'] * $i)));
			array_push($b, $m);
		}
		return $b;
	}
	function dashboardChartModal()
	{
		$data['today'] = time();
		$data['d31'] = 2678400;
		$b = [];
		for ($i = 0; $i < 12; $i++) {
			$m = date('m', ($data['today'] - ($data['d31'] * $i)));
			$y = date('Y', ($data['today'] - ($data['d31'] * $i)));
			$this->db->select('price_buy');
			$this->db->where('month', $m);
			$this->db->where('year', $y);
			$transaction = $this->db->get('transaction')->result_array();
			if (!$transaction) {
				array_push($b, 0);
			} else {
				$a = [];
				for ($j = 0; $j < count($transaction); $j++) {
					array_push($a, $transaction[$j]['price_buy']);
				}
				array_push($b, array_sum($a));
			}
		}
		return $b;
	}
	function dashboardChartJual()
	{
		$data['today'] = time();
		$data['d31'] = 2678400;
		$b = [];
		for ($i = 0; $i < 12; $i++) {
			$m = date('m', ($data['today'] - ($data['d31'] * $i)));
			$y = date('Y', ($data['today'] - ($data['d31'] * $i)));
			$this->db->select('price_sell');
			$this->db->where('month', $m);
			$this->db->where('year', $y);
			$transaction = $this->db->get('transaction')->result_array();
			if (!$transaction) {
				array_push($b, 0);
			} else {
				$a = [];
				for ($j = 0; $j < count($transaction); $j++) {
					array_push($a, $transaction[$j]['price_sell']);
				}
				array_push($b, array_sum($a));
			}
		}
		return $b;
	}
}
