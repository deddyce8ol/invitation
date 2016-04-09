<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_p extends CI_Model {

	public $table = "perwakilan";
	public $id = "id";
	public function __construct()
    {
    	parent::__construct();
    	
    }
    // get all
    function get_all($limit = array())
    {
    	$this->db->join('invitation inv', 'perwakilan.code = inv.code', 'left');
    	$this->db->select('perwakilan.*, inv.subject');
        $this->db->order_by('perwakilan.date_create', 'desc');
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
    function get_by_inv($code){
        $this->db->where('code', $code);
        return $this->db->get($this->table);   
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
}

/* End of file m_p.php */
/* Location: ./application/modules/perwakilan/models/m_p.php */