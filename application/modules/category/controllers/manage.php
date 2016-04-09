<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends MX_Controller {
	public $title = "Kategori";
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_cat');
        $this->output->set_template('adminLTE/default');
        $this->output->set_title($this->title);
    }
	public function index()
    {
        $list = $this->M_cat->get_all();
        $data = array(
            'list' => $list,
            'title' => $this->title,
            'subtitle' => 'Data',
            'add_action' => site_url("category/manage/add")
        );
        $this->load->view('admin/data', $data);
    }
    public function add() 
    {
        $combobox_type = combobox_dynamic("id_type","type","type","id_type","","Pilih Tipe Kontent");
        $data = array(
            'title' => $this->title,
            'subtitle' => 'Tambah',
            'button' => 'Tambah',
            'action' => site_url('category/manage/add_proses'),
            'id_category' => set_value('id_category'),
            'combobox_type' => $combobox_type,
            'category' => set_value('category'),
            'type' => set_value('type'),

        );
        $this->output->append_title("Tambah");
        $this->load->view('admin/form', $data);
    }
    
    public function add_proses() 
    {
        $this->load->library('form_validation');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } 
        else {
            $data = array(
                'id_type' => $this->input->post('id_type',TRUE),
        		'category' => $this->input->post('category',TRUE),
    	    );
            $this->M_cat->insert($data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Tambah");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('category/manage'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->M_cat->get_by_id($id);
        if ($row) {
            $combobox_type = combobox_dynamic("id_type","type","type","id_type",$row->id_type);
            $data = array(
                'title' => $this->title,
                'subtitle' => 'Edit',
                'button' => 'Update',
                'action' => site_url('category/manage/edit_proses'),
                'id_category' => set_value('id_category', $row->id_category),
        		'category' => set_value('category', $row->category),
                'combobox_type' => $combobox_type
            );
            $this->output->append_title("Edit");
            $this->load->view('admin/form', $data);
        } else {
            $notif = notification_proses("danger","Gagal","Data Tidak di Temukan");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('category/type'));
        }
    }
    
    public function edit_proses() 
    {
        $this->load->library('form_validation');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_type', TRUE));
        } else {
            $data = array(
        		'id_type' => $this->input->post('id_type',TRUE),
                'category' => $this->input->post('category',TRUE)
    	    );

            $this->M_cat->update($this->input->post('id_category', TRUE), $data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Edit");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('category/manage'));
        }
    }
    
    public function delete($id) 
    {        
        $row = $this->M_cat->get_by_id($id);
        if ($row) {
            $this->M_cat->delete($id);
            $notif = notification_proses("success","Sukses","Data Berhasil di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('type'));
        } else {
            $notif = notification_proses("danger","Gagal","Data Gagal di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('type'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('category', 'category', 'trim|required');
    	$this->form_validation->set_rules('id_type', 'id_type', 'trim|required');
        $this->form_validation->set_rules('id_cat', 'id_cat', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file admin.php */
/* Location: ./application/modules/category/controllers/admin.php */