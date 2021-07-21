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
	function getAllSell()
	{
		return $this->db->get('transaction')->result_array();
	}
	function getMonth()
	{
		$monthName = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'];
		$today = date('n');
		$year = date('Y');
		$b = [];
		for ($i = 1; $i <= 12; $i++) {
			$m = $today - $i;
			if ($m < 0) {
				$m += 12;
				$y = $year - 1;
			} else {
				$y = $year;
			}
			$mo = $monthName[$m] . ' ' . $y;
			array_push($b, $mo);
		}
		return $b;
	}
	function dashboardChartModal()
	{
		$today = date('n');
		$year = date('Y');
		$b = [];
		for ($i = 0; $i < 12; $i++) {
			$m = $today - $i;
			if ($m < 1) {
				$m += 12;
				$y = $year - 1;
			} else {
				$y = $year;
			}
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
		$today = date('n');
		$year = date('Y');
		$b = [];
		for ($i = 0; $i < 12; $i++) {
			$m = $today - $i;
			if ($m < 1) {
				$m += 12;
				$y = $year - 1;
			} else {
				$y = $year;
			}
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
	function dashboardChartUntung()
	{
		$today = date('n');
		$year = date('Y');
		$b = [];
		for ($i = 0; $i < 12; $i++) {
			$m = $today - $i;
			if ($m < 1) {
				$m += 12;
				$y = $year - 1;
			} else {
				$y = $year;
			}
			$this->db->select('(price_sell - price_buy) AS untung');
			$this->db->where('month', $m);
			$this->db->where('year', $y);
			$transaction = $this->db->get('transaction')->result_array();
			if (!$transaction) {
				array_push($b, 0);
			} else {
				$a = [];
				for ($j = 0; $j < count($transaction); $j++) {
					array_push($a, $transaction[$j]['untung']);
				}
				array_push($b, array_sum($a));
			}
		}
		return $b;
	}
}
