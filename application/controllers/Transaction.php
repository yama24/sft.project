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
        $data['product'] = $this->m_product->getActiveProduct();
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
        $data['label'] = $this->m_transaction->getLabelByKey();
        $data['allProduct'] = $this->m_transaction->getAllProduct();
        $data['transactionItems'] = $this->m_transaction->getTransactionByKey();
        $total = count($data['transactionItems']);
        $productId = [];

        for ($i = 0; $i < $total; $i++) {
            $items = $this->m_transaction->getTransactionByKey();
            $item = $items[$i];
            array_push($productId, $item['item']);
        }

        $data['products'] = [];

        for ($i = 0; $i < count($productId); $i++) {
            $product = $this->m_transaction->getProductById($productId[$i]);
            array_push($data['products'], $product);
        }

        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('hppengirim', 'No. Hp Pengirim', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/v_header', $data);
            $this->load->view('transaction/v_transaction_edit', $data);
            $this->load->view('temp/v_footer');
        } else {
            $this->m_transaction->editTransaction();
            $this->session->set_flashdata('add', 'Transaksi berhasil diedit!');
            redirect('transaction');
        }
    }
    public function delete($key)
    {
        $this->m_transaction->deleteTransaction($key);
        $this->session->set_flashdata('del', 'Transaksi dihapus!');
        redirect('transaction');
    }
    public function show()
    {
        $data['page'] = "Show Transaction";
        $data['label'] = $this->m_transaction->getLabelByKey();
        $data['transaction'] = $this->m_transaction->getTransactionProductByKey();

        $this->load->view('temp/v_header', $data);
        $this->load->view('transaction/v_transaction_show', $data);
        $this->load->view('temp/v_footer');
    }
}
