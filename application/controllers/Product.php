<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
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

        $data['page'] = "Product";
        $this->load->view('templ/v_header', $data);
        $this->load->view('product/v_product', $data);
        $this->load->view('templ/v_footer');
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
            $this->load->view('templ/v_header', $data);
            $this->load->view('product/v_product_new', $data);
            $this->load->view('templ/v_footer');
        } else {

            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $this->m_product->imgProductConfig();
                if ($this->upload->do_upload('gambar')) {
                    $this->m_product->insertProduct();
                } else {
                    $this->session->set_flashdata('fail', 'Format atau ukuran gambar tidak sesuai!');
                    $this->load->view('templ/v_header', $data);
                    $this->load->view('product/v_product_new', $data);
                    $this->load->view('templ/v_footer');
                }
            } else {
                $this->session->set_flashdata('fail', 'Gambar harus diisi!');
                $this->load->view('templ/v_header', $data);
                $this->load->view('product/v_product_new', $data);
                $this->load->view('templ/v_footer');
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
            $this->load->view('templ/v_header', $data);
            $this->load->view('product/v_product_edit', $data);
            $this->load->view('templ/v_footer');
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
    public function dataServer()
    {
        $list = $this->m_product->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            if ($field->due_date_product > time()) {
                $badge = '<span class="badge badge-success">Active</span>';
            } else {
                $badge = '<span class="badge badge-danger">Inactive</span>';
            };
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('d M y H:i:s', $field->date);
            $row[] = $field->nama_product;
            $row[] = '<img src="' . base_url('assets/dist/img/product/') . $field->gambar_product . '" alt="" width="100px" class="img-thumbnail">';
            $row[] = 'Rp.' . number_format($field->modal_product, 0, ",", ".");
            $row[] = 'Rp.' . number_format($field->jual_product, 0, ",", ".");
            $row[] = number_format($field->berat_product, 0, ",", ".") . ' gr';
            $row[] = date('d M y H:i:s', $field->due_date_product) . ' ' . $badge;
            $row[] = '<a href="' . base_url('product/edit/') . $field->id . '" class="btn btn-outline-success">
            <i class="fas fa-edit"></i>
        </a>
        <button data-toggle="modal" data-target="#modal-hapus' . $field->id . '" class="btn btn-outline-danger">
            <i class="fas fa-trash"></i>
        </button>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->m_product->count_all(),
            "recordsFiltered" => $this->m_product->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
}
