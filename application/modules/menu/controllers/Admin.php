<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
    public $title = "Menu Admin Manajemen";
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_menu');
        $this->output->set_template('adminLTE/default');
        $this->output->set_title($this->title);
    }   
	public function index()
    {
        $menu = $this->M_menu->get_all();
        $data = array(
            'menu' => $menu,
            'title' => $this->title
        );
        $this->load->view('admin/data', $data);
    }
    public function add() 
    {
        $data = array(
            'title' => 'Tambah Data Menu Admin',
            'button' => 'Tambah',
            'action' => site_url('menu/admin/add_proses'),
            'id_menu' => set_value('id_menu'),
            'name' => set_value('name'),
            'link' => set_value('link'),
            'icon' => set_value('icon'),
            'is_active' => set_value('is_active'),
            'is_parent' => set_value('is_parent'),
        );
        $this->output->set_template('adminLTE/default');
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
        		'name' => $this->input->post('name',TRUE),
        		'link' => $this->input->post('link',TRUE),
        		'icon' => $this->input->post('icon',TRUE),
        		'is_active' => $this->input->post('is_active',TRUE),
        		'is_parent' => $this->input->post('is_parent',TRUE),
    	    );
            $this->M_menu->insert($data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Tambah");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('menu/admin'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->M_menu->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => 'Edit Data Menu Admin',
                'button' => 'Update',
                'action' => site_url('menu/admin/edit_proses'),
        		'id_menu' => set_value('id_menu', $row->id_menu),
        		'name' => set_value('name', $row->name),
        		'link' => set_value('link', $row->link),
        		'icon' => set_value('icon', $row->icon),
        		'is_active' => set_value('is_active', $row->is_active),
        		'is_parent' => set_value('is_parent', $row->is_parent)
            );
            $this->load->view('admin/form', $data);
        } else {
            $notif = notification_proses("danger","Gagal","Data Tidak di Temukan");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('menu/admin'));
        }
    }
    
    public function edit_proses() 
    {
        $this->load->library('form_validation');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_menu', TRUE));
        } else {
            $data = array(
        		'name' => $this->input->post('name',TRUE),
        		'link' => $this->input->post('link',TRUE),
        		'icon' => $this->input->post('icon',TRUE),
        		'is_active' => $this->input->post('is_active',TRUE),
        		'is_parent' => $this->input->post('is_parent',TRUE),
    	    );

            $this->M_menu->update($this->input->post('id_menu', TRUE), $data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Edit");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('menu/admin'));
        }
    }
    
    public function delete($id) 
    {        
        $row = $this->M_menu->get_by_id($id);
        if ($row) {
            $this->M_menu->delete($id);
            $notif = notification_proses("success","Sukses","Data Berhasil di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('menu/admin'));
        } else {
            $notif = notification_proses("danger","Gagal","Data Gagal di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('menu/admin'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('name', 'name', 'trim|required');
    	$this->form_validation->set_rules('link', 'link', 'trim|required');
    	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');
    	$this->form_validation->set_rules('is_parent', 'is parent', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	public function tampil()
	{
        $this->output->unset_template();
        // $menu = $this->M_menu->get_all();
        // $dataMenu = array('menu' => $menu );
        $dataMenu = null;
		$this->load->view('admin/tampil', $dataMenu);
	}	
}

/* End of file admin.php */
/* Location: ./application/modules/menu/controllers/admin.php */