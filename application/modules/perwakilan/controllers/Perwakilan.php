<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perwakilan extends MX_Controller {
	public $title = "Daftar Perwakilan";
	public function __construct()
	{
		parent::__construct();
        $this->load->model('invitation/M_i');
        $this->load->model('M_p');
        $this->load->library('indo_date');
        $this->output->set_template('adminLTE/default');
        $this->output->append_title('Perawkialan');
        Modules::run("login/cek_login");
    }
	public function index()
	{
		
	}
	public function detil($code)
	{
		$query = $this->M_i->get_by_id($code);
		if ($query) {
			$inv = $query;
			$data['inv_code'] = $code;
			$data['inv_subject'] = $inv->subject;
			$data['add_action'] = site_url('perwakilan/add/'.$code);
			$data['btn_label'] = "Tambah Perwakilan";
			$data['form_title'] = "Form Tambah Perwakilan";
			$data['form_action'] = "#";
			$data['id'] = set_value("id");
			$data['code'] = set_value("code");
			$data['email'] = set_value("email");
			$data['email_old'] = set_value("email_old");
			$data['name'] = set_value("name");
			$data['telp'] = set_value("telp");
			$data['fb'] = set_value("fb");
			$data['tw'] = set_value("tw");
			$data['ig'] = set_value("ig");
			$query2 = $this->M_p->get_by_inv($code)->result();
			$data['result'] = $query2;
			$this->output->append_title($inv->subject);
			$this->load->view('detil', $data);
		}
		else {
			redirect('invitation');
		}
	}
	public function add_proses()
	{
		$this->output->unset_template();
		$this->load->library('form_validation');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
        	$response['status'] = "error";
        	$response['message'] = validation_errors();
        	echo json_encode($response);
        } 
        else {
            $data = array(
                'code' => $this->input->post('code',TRUE),
                'email' => $this->input->post('email',TRUE),
                'name' => $this->input->post('name',TRUE),
                'telp' => $this->input->post('telp',TRUE),
                'fb' => $this->input->post('fb',TRUE),
                'tw' => $this->input->post('tw',TRUE),
                'ig' => $this->input->post('ig',TRUE),
                'date_create' => date("Y-m-d H:i:s")
            );
            $this->M_p->insert($data);
            $response['status'] = "success";
        	$response['message'] = "Berhasil";
        	echo json_encode($response);
        }
	}
	public function edit($id)
	{
		$r = $this->M_p->get_by_id($id);
		if ($r) {
			$data['form_title'] = "Form Edit Perwakilan";
			$data['btn_label'] = "Ubah Perwakilan";
			$data['form_action'] = site_url("perwakilan/edit_proses");
			$data['id'] = $r->id;
			$data['code'] = $r->code;
			$data['email'] = $r->email;
			$data['name'] = $r->name;
			$data['telp'] = $r->telp;
			$data['fb'] = $r->fb;
			$data['tw'] = $r->tw;
			$data['ig'] = $r->ig;
			$this->load->view('form', $data);
		}
		else {
			echo $id;
			// redirect('invitation');
		}

	}
	public function edit_proses()
	{
		$id = $this->input->post('id');
		$this->load->library('form_validation');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
        	// echo "gagal validasi";
        	$this->edit($id);
        } 
        else {
            $data = array(
                'code' => $this->input->post('code',TRUE),
                'email' => $this->input->post('email',TRUE),
                'name' => $this->input->post('name',TRUE),
                'telp' => $this->input->post('telp',TRUE),
                'fb' => $this->input->post('fb',TRUE),
                'tw' => $this->input->post('tw',TRUE),
                'ig' => $this->input->post('ig',TRUE),
                'date_update' => date("Y-m-d H:i:s")
            );
            $this->M_p->update($id, $data);
            $notif = notification_proses("success","Sukses","Data Berhasil di Edit");
            $this->session->set_flashdata('message', $notif);
            redirect('perwakilan/detil/'.$data['code']);
        }
	}
	public function delete($id) 
    {        
        $row = $this->M_p->get_by_id($id);
        if ($row) {
            $this->M_p->delete($id);
            $notif = notification_proses("success","Sukses","Data Berhasil di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect('perwakilan/detil/'.$row->code);
        } else {
            $notif = notification_proses("danger","Gagal","Data Gagal di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect('invitation');
        }
    }
	private function _rules() 
    {
        $this->form_validation->set_rules('code', 'code', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('telp', 'telp', 'trim|required');
    	// $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file perwakilan.php */
/* Location: ./application/modules/perwakilan/controllers/perwakilan.php */