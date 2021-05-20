<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') == "telah_login") {
			redirect('dashboard');
		}
	}
	public function index()
	{
		$this->load->view('v_login');
	}
	public function aksi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() != false) {
			// menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'pengguna_username' => $username,
				'pengguna_password' => md5($password),
				'pengguna_status' => 1
			);
			// cek kesesuaian login pada table pengguna
			$cek = $this->db->get_where('pengguna', $where)->row_array();
			// cek jika login benar
			if ($cek > 0) {
				// ambil data pengguna yang melakukan login
				$data = $this->db->get_where('pengguna', $where)->row_array();
				// buat session untuk pengguna yang berhasil login
				// $data_session = array(
				// 	'id' => $data->pengguna_id,
				// 	'username' => $data->pengguna_username,
				// 	'name' => $data->pengguna_nama,
				// 	'email' => $data->pengguna_email,
				// 	'photo' => $data->pengguna_foto,
				// 	'level' => $data->pengguna_level,
				// 	'status' => 'telah_login'
				// );
				$data_session = array(
					'id' => $data['pengguna_id'],
					'username' => $data['pengguna_username'],
					'name' => $data['pengguna_nama'],
					'email' => $data['pengguna_email'],
					'photo' => $data['pengguna_foto'],
					'level' => $data['pengguna_level'],
					'status' => 'telah_login'
				);

				$this->session->set_userdata($data_session);
				// alihkan halaman ke halaman dashboard pengguna
				redirect(base_url() . 'dashboard');
			} else {
				$this->session->set_flashdata('gagal_login', 'Username & Password Salah!');
				redirect('login');
			}
		} else {
			$this->load->view('v_login');
		}
	}
}
