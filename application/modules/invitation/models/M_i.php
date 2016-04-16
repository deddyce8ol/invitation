<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_i extends CI_Model {
	public $id = "code";
	public $table = "invitation";
	public function __construct()
    {
    	parent::__construct();
    	
    }
    // get all
    function get_all($limit = array())
    {
        // $this->db->order_by('date_create', 'desc');
        $this->filter();
        $this->db->order_by('subject');
        if($limit == NULL){
            return $this->db->get($this->table);
        }
        else {
            $this->db->limit($limit['perpage'], $limit['offset']);
            return $this->db->get($this->table);
        }
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }	
	
    private function filter()
    {
        $tgl_mulai = $this->session->userdata('cari_tgl_mulai');
        $tgl_selesai = $this->session->userdata('cari_tgl_selesai');
        $subject = $this->session->userdata('cari_subject');
        if ($tgl_mulai != "") {
            $this->db->where('date_confirm >=', $tgl_mulai);
        }
        if ($tgl_selesai != "") {
            $this->db->where('date_confirm <=', $tgl_selesai);
        }
        if ($subject != "") {
            $this->db->like('subject', $subject, 'both');
        }
    }
}

/* End of file m_i.php */
/* Location: ./application/modules/invitation/models/m_i.php */