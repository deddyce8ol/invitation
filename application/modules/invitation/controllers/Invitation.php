<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invitation extends MX_Controller {
	public $title = "Daftar Undangan";
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_i');
        $this->load->library('indo_date');
        $this->output->set_template('adminLTE/default');
        $this->output->append_title('Undangan');
        Modules::run("login/cek_login");

    }
	public function index($offset = 0)
    {
        //untuk konfigurasi pagination
        $perpage = 50;
        $uri_segment = 4;
        $offset = $this->uri->segment($uri_segment);
        $this->load->library('pagination');
        $config_paging = array(
            'base_url' => site_url('invitation/index/'),
            'total_rows' => $this->M_i->get_all()->num_rows(),
            'per_page' => $perpage,
            'last_link' => 'terakhir',
            'first_link' => 'awal'
        );
        $this->pagination->initialize($config_paging);

        $list = $this->M_i->get_all()->result();

        // cari tanggal konfirmasi
        $cari_tgl_mulai = $this->session->userdata('cari_tgl_mulai');
        $cari_tgl_selesai = $this->session->userdata('cari_tgl_selesai');
        $date_confirm = $cari_tgl_mulai;
        if ($cari_tgl_selesai != "") {
            $date_confirm .= " - ".$cari_tgl_selesai;
        }
        
        $data = array(
            'pagination' => $this->pagination->create_links(),
            'list' => $list,
            'title' => $this->title,
            'action_cari' => site_url('invitation/cari_proses'),
            'add_action' => site_url('invitation/add'),
            'cari_subject' => set_value('cari_subject', $this->session->userdata('cari_subject')),
            'date_confirm' => set_value('date_confirm', $date_confirm),
            'subtitle' => 'Data'
        );
        $this->load->view('data', $data);
    }
    public function cari_proses()
    {
        $date=$this->input->post('date_confirm');
        if ($date != "") {
            $ex = explode(" - ", $date);
            $array = array(
                'cari_tgl_mulai' => $ex[0],
                'cari_tgl_selesai' => $ex[1]
            );        
        }        
        $array['cari_subject'] = $this->input->post('subject');
        $this->session->set_userdata( $array );
        redirect('invitation','refresh');

    }
    public function add() 
    {
        $data = array(
            'title' => $this->title,
            'subtitle' => 'Tambah',
            'button' => 'Tambah',
            'action' => site_url('invitation/add_proses'),
            'code_old' => set_value('code_old'),
            'code' => set_value('code'),
            'password' => set_value('password'),
            'slot' => set_value('slot'),
            'kontak' => set_value('kontak'),
            'subject' => set_value('subject')
        );
        $this->load->view('form', $data);
    }
    
    public function add_proses() 
    {
        $this->load->library('form_validation');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } 
        else {
            $publish_date = ($this->input->post('status') == 1) ? date("Y-m-d H:i:s") : null ;
            $data = array(
                'code' => $this->input->post('code',TRUE),
                'password' => $this->input->post('password',TRUE),
                'slot' => $this->input->post('slot',TRUE),
                'subject' => $this->input->post('subject',TRUE),
                'kontak' => $this->input->post('kontak',TRUE),
                'date_create' => date("Y-m-d H:i:s")
            );
            $this->M_i->insert($data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Tambah");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('invitation'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->M_i->get_by_id($id);

        if ($row) {
            $data = array(
                'title' => $this->title,
                'subtitle' => 'Edit',
                'button' => 'Update',
                'action' => site_url('invitation/edit_proses'),
        		'code_old' => set_value('code_old', $row->code),
                'code' => set_value('code', $row->code),
                'password' => set_value('password', $row->password),
                'slot' => set_value('slot', $row->slot),
        		'kontak' => set_value('kontak', $row->kontak),
        		'subject' => set_value('subject', $row->subject)
            );
            $this->load->view('form', $data);
        } else {
            $notif = notification_proses("danger","Gagal","Data Tidak di Temukan");
            $this->session->set_flashdata('message', $notif);
            redirect(site_url('invitation'));
        }
    }
    
    public function edit_proses() 
    {
        $code = $this->input->post('code_old', TRUE);
        $this->load->library('form_validation');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($code);
        } else {
            $data = array(
                'code' => $this->input->post('code',TRUE),
                'password' => $this->input->post('password',TRUE),
                'slot' => $this->input->post('slot',TRUE),
        		'kontak' => $this->input->post('kontak',TRUE),
        		'subject' => $this->input->post('subject',TRUE),
        		'date_update' => date("Y-m-d H:i:s")
    	    );

            $this->M_i->update($code, $data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Edit");
            $this->session->set_flashdata('message', $notif);
            redirect('invitation');
        }
    }
    
    public function delete($id) 
    {        
        $row = $this->M_i->get_by_id($id);
        if ($row) {
            $this->M_i->delete($id);
            $notif = notification_proses("success","Sukses","Data Berhasil di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect('invitation');
        } else {
            $notif = notification_proses("danger","Gagal","Data Gagal di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect('invitation');
        }
    }

    private function _rules() 
    {
        $this->form_validation->set_rules('code', 'code', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('slot', 'slot', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file invitation.php */
/* Location: ./application/modules/invitation/controllers/invitation.php */