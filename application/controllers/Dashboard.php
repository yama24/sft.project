<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		// cek session yang login,
		// jika session status tidak sama dengan session telah_login, berarti pengguna belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if ($this->session->userdata('status') != "telah_login") {
			$this->session->set_flashdata('belum_login', 'Anda Harus Login Dulu!');
			redirect('login');
		}
	}
	public function index()
	{
		$this->load->model('m_dashboard');
		$data['product'] = $this->m_dashboard->getAllProduct();
		$data['transaction'] = $this->m_dashboard->getAllTransaction();
		$data['modalChart'] = $this->m_dashboard->dashboardChartModal();
		$data['jualChart'] = $this->m_dashboard->dashboardChartJual();
		$data['page'] = "Dashboard";
		$data['monthChart'] = $this->m_dashboard->getMonth();
		// var_dump($data['modalChart']);
		// die;
		$this->load->view('templ/v_header', $data);
		$this->load->view('dashboard/v_dashboard', $data);
		$this->load->view('templ/v_footer', $data);
	}

	public function notfound()
	{
		$this->load->view('404');
	}
	public function keluar()
	{
		$this->session->unset_userdata('status');
		$this->session->set_flashdata('logout', 'Anda berhasil logout!');
		redirect('login');
	}
	// public function ganti_password()
	// {
	// 	$this->load->view('dashboard/v_ganti_password');
	// }
	// public function ganti_password_aksi()
	// {
	// 	// form validasi
	// 	$this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
	// 	$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|min_length[8]');
	// 	$this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password Baru', 'required|matches[password_baru]');
	// 	// cek validasi
	// 	if ($this->form_validation->run() != false) {
	// 		// menangkap data dari form
	// 		$password_lama = $this->input->post('password_lama');
	// 		$password_baru = $this->input->post('password_baru');
	// 		$konfirmasi_password = $this->input->post('konfirmasi_password');
	// 		// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
	// 		$where = array(
	// 			'pengguna_id' => $this->session->userdata('id'),
	// 			'pengguna_password' => md5($password_lama)
	// 		);
	// 		$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();
	// 		// cek kesesuaikan password lama
	// 		if ($cek > 0) {
	// 			// update data password pengguna
	// 			$w = array(
	// 				'pengguna_id' => $this->session->userdata('id')
	// 			);
	// 			$data = array(
	// 				'pengguna_password' => md5($password_baru)
	// 			);
	// 			$this->m_data->update_data($where, $data, 'pengguna');
	// 			// alihkan halaman kembali ke halaman ganti password
	// 			redirect('dashboard/ganti_password?alert=sukses');
	// 		} else {
	// 			// alihkan halaman kembali ke halaman ganti password
	// 			redirect('dashboard/ganti_password?alert=gagal');
	// 		}
	// 	} else {
	// 		$this->load->view('dashboard/v_ganti_password');
	// 	}
	// }
}
