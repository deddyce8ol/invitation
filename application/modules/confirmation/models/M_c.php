<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_c extends CI_Model {
	public function __construct()
    {
    	parent::__construct();
    	
    }
    // get all
    function get_all_perwakilan($limit = array())
    {
    	$this->db->join('invitation inv', 'perwakilan.code = inv.code', 'left');
    	$this->db->select('perwakilan.*, inv.subject');
        $this->db->order_by('perwakilan.date_create', 'desc');
        if($limit == NULL){
            return $this->db->get('perwakilan');
        }
        else {
            $this->db->limit($limit['perpage'], $limit['offset']);
            return $this->db->get('perwakilan');
        }
    }
    function countPerwakilan($code){
    	$query = $this->db->where('code', $code);
    	$query = $this->db->get('perwakilan');
    	return $query->num_rows();
    }
    function getPerwakilanByEvent($code){
        $this->db->where('code', $code);
        return $this->db->get('perwakilan');
    }
    function getEventByCode($code){
        $this->db->where('code', $code);
        return $this->db->get('invitation')->row();   
    }
    function cekCodePassword($code, $password){
        $this->db->where('code', $code);
        $this->db->where('password', $password);
        return $this->db->get('invitation')->row();   
    }
    function getPerwakilanCodeId($code,$id){
        $this->db->where('code', $code);
        $this->db->where('id', $id);
        return $this->db->get('perwakilan')->row();   
    }
    // get data by id
    function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('perwakilan')->row();
    }
    
    // insert data
    function insert($data)
    {
        $this->db->insert('perwakilan', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('perwakilan', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('perwakilan');
    }	

    function cekLogin()
    {
        if ($this->session->userdata('login')) {
            return FALSE;
        }
        else {
            redirect('confirmation','refresh');
        }
    }
}

/* End of file m_c.php */
/* Location: ./application/modules/confirmation/models/m_c.php */