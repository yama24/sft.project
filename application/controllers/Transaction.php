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
        $this->load->view('templ/v_header', $data);
        $this->load->view('transaction/v_transaction', $data);
        $this->load->view('templ/v_footer');
    }
    public function new()
    {
        $data['page'] = "New Transaction";
        $data['product'] = $this->m_transaction->getActiveProduct();
        $data['provinces'] = $this->m_transaction->getProvinces();
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('hppengirim', 'No. Hp Pengirim', 'required|numeric');
        $this->form_validation->set_rules('hppenerima', 'No. Hp Penerima', 'numeric');
        $this->form_validation->set_rules('ongkir', 'Ongkir', 'numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('templ/v_header', $data);
            $this->load->view('transaction/v_transaction_new', $data);
            $this->load->view('templ/v_footer');
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
        $data['activeProduct'] = $this->m_transaction->getActiveProduct();
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
        $data['inactiveCheckedProduct'] = $this->m_transaction->getInactiveCheckedProduct($data['products']);
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('hppengirim', 'No. Hp Pengirim', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $data['provinces'] = $this->m_transaction->getProvinces();
            $data['regencies'] = $this->m_transaction->getRegencyByProvince();
            $data['districts'] = $this->m_transaction->getDistrictByRegency();
            $data['villages'] = $this->m_transaction->getVillageByDistrict();
            $data['postalcodes'] = $this->m_transaction->getPostalcodeByVillage();
            $this->load->view('templ/v_header', $data);
            $this->load->view('transaction/v_transaction_edit', $data);
            $this->load->view('templ/v_footer');
        } else {
            $this->m_transaction->editTransaction();
            $this->session->set_flashdata('update', 'Transaksi berhasil diedit!');
            redirect('transaction');
        }
    }
    function add_ajax_kab($id_prov)
    {
        $this->db->order_by('name');
        $query = $this->db->get_where('regencies', array('province_id' => $id_prov));
        $data = "<option value=''>- Pilih Kota/Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
        }
        echo $data;
    }

    function add_ajax_kec($id_kab)
    {
        $this->db->order_by('name');
        $query = $this->db->get_where('districts', array('regency_id' => $id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
        }
        echo $data;
    }

    function add_ajax_des($id_kec)
    {
        $this->db->order_by('name');
        $query = $this->db->get_where('villages', array('district_id' => $id_kec));
        $data = "<option value=''> - Pilih Desa/Kelurahan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->name)) . "</option>";
        }
        echo $data;
    }
    function add_ajax_pos($id_pos)
    {
        $this->db->order_by('postal_code');
        $query = $this->db->get_where('postalcodes', array('village_id' => $id_pos));
        $data = "<option value=''> - Pilih Kodepos - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->id . "'>" . ucwords(strtolower($value->postal_code)) . "</option>";
        }
        echo $data;
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
        $data['province'] = $this->db->get_where('provinces', ['id' => $data['label']['province_id']])->row_array();
        $data['regency'] = $this->db->get_where('regencies', ['id' => $data['label']['regency_id']])->row_array();
        $data['district'] = $this->db->get_where('districts', ['id' => $data['label']['district_id']])->row_array();
        $data['village'] = $this->db->get_where('villages', ['id' => $data['label']['village_id']])->row_array();
        $data['postalcode'] = $this->db->get_where('postalcodes', ['id' => $data['label']['postalcode_id']])->row_array();
        $this->load->view('templ/v_header', $data);
        $this->load->view('transaction/v_transaction_show', $data);
        $this->load->view('templ/v_footer');
    }
    public function print_thermal($slug)
    {
        $getLinks = $this->m_transaction->getLinksBySlug($slug);
        $data['province'] = $this->db->get_where('provinces', ['id' => $getLinks['province_id']])->row_array();
        $data['regency'] = $this->db->get_where('regencies', ['id' => $getLinks['regency_id']])->row_array();
        $data['district'] = $this->db->get_where('districts', ['id' => $getLinks['district_id']])->row_array();
        $data['village'] = $this->db->get_where('villages', ['id' => $getLinks['village_id']])->row_array();
        $data['postalcode'] = $this->db->get_where('postalcodes', ['id' => $getLinks['postalcode_id']])->row_array();
        $t = $this->db->get_where('transaction', ['transaction_key' => $getLinks['transaction_key_label']])->result_array();
        if ($getLinks == NULL) {
            redirect(base_url('dashboard'));
        } else {
            $order = [];
            for ($i = 0; $i < count($t); $i++) {
                $adat = $this->db->get_where('product', ['id' => $t[$i]['item']])->row_array();
                array_push($order, $adat);
            }
            $data['product'] = $order;
            $data['transaction'] = $t;
            $data['page'] = "Print Thermal";
            $data['label'] = $getLinks;
            // print_r($order);
            // die;
            $this->load->view('label/v_print_thermal', $data);
        }
    }
}
