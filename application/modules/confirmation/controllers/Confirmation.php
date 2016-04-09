<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmation extends MX_Controller {
	public $title = "Konfirmasi Kedatangan";
	public function __construct()
	{
		parent::__construct();
        $this->load->model('M_c');
        $this->load->library('indo_date');        
        // $this->output->set_template('adminLTE/default');
    }
    public function index()
    {
    	$data['form_action'] = site_url('confirmation/cek_code');
    	$this->load->view('form', $data);
    }
    public function cek_code()
    {
       $code = $this->input->post('code'); 
       $password = $this->input->post('password');
       $inv = $this->M_c->cekCodePassword($code, $password);
       if ($inv) {
            $data['code'] = $inv->code;
            $data['login'] = TRUE;
            $this->session->set_userdata( $data );
            redirect('confirmation/invitation','refresh');
       }
       else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Terjadi Kesalahan</strong> Kode Undangan Salah atau Password Salah
            </div>');
            redirect("confirmation");        
       } 
    }
    public function invitation()
    {
        $this->M_c->cekLogin();
        $code = $this->session->userdata('code');
    	$inv = $this->M_c->getEventByCode($code);
    	if ($inv) {
    		$data['subject'] = $inv->subject;
            $data['perwakilan'] = $this->M_c->getPerwakilanByEvent($inv->code)->result();
            $data['perwakilan_num'] = $this->M_c->countPerwakilan($inv->code);
            $data['form_action'] = "#";
            $data['id'] = set_value('id');
            $data['code'] = $inv->code;
            $data['slot'] = $inv->slot;
            $data['kontak'] = $inv->kontak;
            $data['email'] = set_value('email');
            $data['name'] = set_value('name');
            $data['telp'] = set_value('telp');
            $data['fb'] = set_value('fb');
            $data['tw'] = set_value('tw');
            $data['ig'] = set_value('ig');
            $data['btn_label'] = "Tambah Perwakilan";
            $data['keterangan_undangan'] = "Keterangan undangan, tanggal, tempat, jadwal";
    		$this->load->view('data_perwakilan', $data);	
    	}
    	else {
    		$this->session->set_flashdata('message', '<div class="alert alert-danger">
    			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    			<strong>Terjadi Kesalahan</strong> Kode Undangan Tidak Terdaftar
    		</div>');
    		redirect("confirmation");
    	}
    }
    public function proses()
    {
    	$post = $this->input->method();
    	if ($post) {
            $this->load->library('form_validation');
            $this->_rules();
            if ($this->form_validation->run() == FALSE) {
                $response['status'] = "error";
                $response['message'] = validation_errors();
            }
            else {
                $mode = $this->input->post('mode');
                $id = $this->input->post('id');
                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');
                $data['email'] = $this->input->post('email');
                $data['telp'] = $this->input->post('telp');
                $data['fb'] = $this->input->post('fb');
                $data['tw'] = $this->input->post('tw');
        		$data['ig'] = $this->input->post('ig');
                if ($mode == "add") {
                    $data['date_create'] = date("Y-m-d H:i:s");
                    $this->M_c->insert($data);
                }
                elseif ($mode == "edit") {
                    $this->M_c->update($id, $data);
                    $data['date_update'] = date("Y-m-d H:i:s");
                }
                $response['status'] = "success";
                $response['message'] = "Data ".$data['name']." Berhasil di Proses";
            }
            echo json_encode($response);

    	}
    	else {
    		redirect("confirmation");
    	}
    }
    public function proses_kontak()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kontak', 'kontak', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $response['status'] = "error";
            $response['message'] = validation_errors();
        }
        else {
            $code = $this->session->userdata('code');    
            $kontak = $this->input->post('kontak');
            $this->db->where('code', $code);
            $this->db->update('invitation', array("kontak"=>$kontak));
            $response['status'] = "success";
            $response['message'] = "Kontak berhasil di update";
        }
        echo json_encode($response);
    }
    public function edit_perwakilan($code, $id)
    {
        $query = $this->M_c->getPerwakilanCodeId($code, $id);
        if ($query) {
            $response['status'] = "success";
            $response['message'] = "Data ditemukan";
            $response['id'] = $query->id;
            $response['code'] = $query->code;
            $response['name'] = $query->name;
            $response['telp'] = $query->telp;
            $response['email'] = $query->email;
            $response['tw'] = $query->tw;
            $response['fb'] = $query->fb;
            $response['ig'] = $query->ig;
        }
        else {
            $response['status'] = "error";
            $response['message'] = "Data tidak ditemukan";
        }
        echo json_encode($response);
    }
    public function perwakilan_delete($id) 
    {        
        $row = $this->M_c->get_by_id($id);
        if ($row) {
            $this->M_c->delete($id);
            $notif = notification_proses("success","Sukses","Data Berhasil di Hapus");
            $this->session->set_flashdata('message', $notif);
            redirect('confirmation/invitation/'.$row->code);
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

/* End of file confirmation.php */
/* Location: ./application/modules/confirmation/controllers/confirmation.php */