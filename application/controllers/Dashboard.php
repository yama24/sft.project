<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');
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
		$data['index'] = $this->m_data->get_data('label')->result();

		$data['page'] = "Dashboard";
		if ($this->session->userdata('level') == "admin") {
			$this->load->view('temp/v_header', $data);
			$this->load->view('dashboard/v_index', $data);
			$this->load->view('temp/v_footer', $data);
		} else {
			redirect(base_url('dashboard'));
		}
	}
	public function tambah()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('sender', 'Pengirim', 'required');
		$this->form_validation->set_rules('num_sender', 'No. Hp Pengirim', 'required');
		$this->form_validation->set_rules('receiver', 'Penerima', 'required');
		$this->form_validation->set_rules('num_receiver', 'No. Hp Penerima', 'required');
		$this->form_validation->set_rules('address_receiver', 'Alamat Penerima', 'required');
		$this->form_validation->set_rules('courier', 'Kurir', 'required');
		$this->form_validation->set_rules('order', 'Pesanan', 'required');
		//PHONE BELUM DI STANDARISASI
		if ($this->form_validation->run() != false) {
			$sender = $this->input->post('sender');
			$num_sender = $this->input->post('num_sender');
			$receiver = $this->input->post('receiver');
			$num_receiver = $this->input->post('num_receiver');
			$address_receiver = $this->input->post('address_receiver');
			$courier = $this->input->post('courier');
			$order = $this->input->post('order');
			$date = date('Y-m-d H:i:s');

			$data = array(
				'sender' => $sender,
				'num_sender' => $num_sender,
				'receiver' => $receiver,
				'num_receiver' => $num_receiver,
				'address_receiver' => $address_receiver,
				'courier' => $courier,
				'order' => $order,
				'date' => $date,
			);
			$this->m_data->insert_data($data, 'label');
			$this->session->set_flashdata('add', 'Data berhasil diinput!');
			redirect('dashboard');
		} else {
			// Ini tak terpakai
			$this->session->set_flashdata('fail', 'Data gagal diinput!');
			redirect('dashboard');
		}
	}
	public function edit()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('sender', 'Pengirim', 'required');
		$this->form_validation->set_rules('num_sender', 'No. Hp Pengirim', 'required');
		$this->form_validation->set_rules('receiver', 'Penerima', 'required');
		$this->form_validation->set_rules('num_receiver', 'No. Hp Penerima', 'required');
		$this->form_validation->set_rules('address_receiver', 'Alamat Penerima', 'required');
		$this->form_validation->set_rules('courier', 'Kurir', 'required');
		$this->form_validation->set_rules('order', 'Pesanan', 'required');
		//PHONE BELUM DI STANDARISASI
		if ($this->form_validation->run() != false) {
			$id = $this->input->post('id');
			$sender = $this->input->post('sender');
			$num_sender = $this->input->post('num_sender');
			$receiver = $this->input->post('receiver');
			$num_receiver = $this->input->post('num_receiver');
			$address_receiver = $this->input->post('address_receiver');
			$courier = $this->input->post('courier');
			$order = $this->input->post('order');
			$where = array(
				'id' => $id
			);

			$data = array(
				'sender' => $sender,
				'num_sender' => $num_sender,
				'receiver' => $receiver,
				'num_receiver' => $num_receiver,
				'address_receiver' => $address_receiver,
				'courier' => $courier,
				'order' => $order,
			);
			$this->m_data->update_data($where, $data, 'label');
			$this->session->set_flashdata('update', 'Data berhasil diupdate!');
			redirect('dashboard');
		} else {
			// Ini tak terpakai
			$this->session->set_flashdata('fail', 'Data gagal diinput!');
			redirect('dashboard');
		}
	}
	public function hapus($id)
	{
		$where = array(
			'id' => $id
		);
		$this->m_data->delete_data($where, 'label');
		$this->session->set_flashdata('del', 'Data berhasil dihapus!');
		redirect('dashboard');
	}

	public function print_thermal($slug)
	{
		$getLinks = $this->m_data->getLinksBySlug($slug);
		if ($this->session->userdata('level') == "admin") {
			if ($getLinks == NULL) {
				redirect(base_url('dashboard'));
			} else {
				$data['page'] = "Print Thermal";
				$data['label'] = $getLinks;
				$this->load->view('dashboard/v_print_thermal', $data);
			}
		} else {
			redirect(base_url() . '404');
		}
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
