<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_product');
        $this->load->model('m_transaction');
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
        $data['index'] = $this->m_transaction->getAllTransactionLabel();

        $data['page'] = "Transaction";
        $this->load->view('temp/v_header', $data);
        $this->load->view('transaction/v_transaction', $data);
        $this->load->view('temp/v_footer');
    }
    public function new()
    {
        $data['page'] = "New Transaction";
        $data['product'] = $this->m_product->getAllProduct();
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('hppengirim', 'No. Hp Pengirim', 'required|numeric');
        // $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        // $this->form_validation->set_rules('hppenerima', 'No. Hp Penerima', 'required|numeric');
        // $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('kurir', 'Kurir', 'required');
        // $this->form_validation->set_rules('produk', 'Produk', 'required');
        // $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/v_header', $data);
            $this->load->view('transaction/v_transaction_new', $data);
            $this->load->view('temp/v_footer');
        } else {
            $this->m_transaction->insertTransaction();
            $this->session->set_flashdata('add', 'Transaksi berhasil diinput!');
            redirect('transaction');
        }
    }
    public function edit()
    {
        $data['page'] = "Edit Transaction";
        $data['label'] = $this->m_transaction->getLabelById();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('modal', 'Modal', 'required|numeric');
        $this->form_validation->set_rules('jual', 'Jual', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
        $this->form_validation->set_rules('duedate', 'Due Date', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/v_header', $data);
            $this->load->view('transaction/v_transaction_edit', $data);
            $this->load->view('temp/v_footer');
        } else {

            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $this->m_product->imgProductConfig();
                if ($this->upload->do_upload('gambar')) {
                    $this->m_product->editProductImg();
                } else {
                    $this->session->set_flashdata('fail', 'Format atau ukuran gambar tidak sesuai!');
                    redirect('product/edit/' . $this->input->post('id'));
                    die;
                }
            }
            $this->m_product->editProduct();
        }
    }
    public function delete($id)
    {
        $this->m_product->deleteProduct($id);
        $this->session->set_flashdata('del', 'Produk dihapus!');
        redirect('product');
    }
}
