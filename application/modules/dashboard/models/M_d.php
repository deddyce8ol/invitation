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
	public function jumKonfirmasi()
	{
		$query = $this->db->where('date_confirm !=', "0000-00-00 00:00:00");
		$query = $this->db->get('invitation');
		return $query->num_rows();
	}
	public function jumSlot()
	{
		$query = $this->db->select('SUM(slot) AS jumSlot');
		$query = $this->db->get('invitation');
		$num = $query->num_rows();
		if ($num>0) {
			$r = $query->row();
			return $r->jumSlot;
		}
		else {
			return 0;
		}
	}

}

/* End of file m_d.php */
/* Location: ./application/modules/dashboard/models/m_d.php */