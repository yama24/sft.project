<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Transaction extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_product');
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
        $data['index'] = $this->m_product->getAllProduct();

        $data['page'] = "Transaction";
        $this->load->view('temp/v_header', $data);
        $this->load->view('product/v_product', $data);
        $this->load->view('temp/v_footer');
    }
    public function new()
    {
        $data['page'] = "New Product";
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('modal', 'Modal', 'required|numeric');
        $this->form_validation->set_rules('jual', 'Jual', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
        $this->form_validation->set_rules('duedate', 'Due Date', 'required');
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Image', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/v_header', $data);
            $this->load->view('product/v_product_new', $data);
            $this->load->view('temp/v_footer');
        } else {

            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $this->m_product->imgProductConfig();
                if ($this->upload->do_upload('gambar')) {
                    $this->m_product->insertProduct();
                } else {
                    $this->session->set_flashdata('fail', 'Format atau ukuran gambar tidak sesuai!');
                    $this->load->view('temp/v_header', $data);
                    $this->load->view('product/v_product_new', $data);
                    $this->load->view('temp/v_footer');
                }
            } else {
                $this->session->set_flashdata('fail', 'Gambar harus diisi!');
                $this->load->view('temp/v_header', $data);
                $this->load->view('product/v_product_new', $data);
                $this->load->view('temp/v_footer');
            }
        }
    }
    public function edit()
    {
        $data['page'] = "Edit Product";
        $data['product'] = $this->m_product->getProductById();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        // $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('modal', 'Modal', 'required|numeric');
        $this->form_validation->set_rules('jual', 'Jual', 'required|numeric');
        $this->form_validation->set_rules('berat', 'Berat', 'required|numeric');
        $this->form_validation->set_rules('duedate', 'Due Date', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('temp/v_header', $data);
            $this->load->view('product/v_product_edit', $data);
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
