<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_d extends CI_Model {

	public function jumInv()
	{
		$query = $this->db->get('invitation');
		return $query->num_rows();
	}
	public function jumPerwakilan()
	{
		$query = $this->db->get('perwakilan');
		return $query->num_rows();
	}

}

/* End of file m_d.php */
/* Location: ./application/modules/dashboard/models/m_d.php */