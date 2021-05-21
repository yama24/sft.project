<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Label extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_label');
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
		$data['index'] = $this->m_label->getLabel();

		$data['page'] = "Label";
		$this->load->view('templ/v_header', $data);
		$this->load->view('label/v_label', $data);
		$this->load->view('templ/v_footer', $data);
	}
	public function new()
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
			$this->m_label->insertLabel();
			$this->session->set_flashdata('add', 'Label berhasil diinput!');
			redirect('label');
		} else {
			// Ini tak terpakai
			$this->session->set_flashdata('fail', 'Label gagal diinput!');
			redirect('label');
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
			$this->m_label->editLabel();
			$this->session->set_flashdata('update', 'Label berhasil diupdate!');
			redirect('label');
		} else {
			// Ini tak terpakai
			$this->session->set_flashdata('fail', 'Label gagal diinput!');
			redirect('label');
		}
	}
	public function delete($id)
	{
		$this->m_label->deleteLabel($id);
		$this->session->set_flashdata('del', 'Label berhasil dihapus!');
		redirect('label');
	}

	public function print_thermal($slug)
	{
		$getLinks = $this->m_label->getLinksBySlug($slug);
		if ($getLinks == NULL) {
			redirect(base_url('dashboard'));
		} else {
			$data['page'] = "Print Thermal";
			$data['label'] = $getLinks;
			$this->load->view('label/v_print_thermal', $data);
		}
	}
}
