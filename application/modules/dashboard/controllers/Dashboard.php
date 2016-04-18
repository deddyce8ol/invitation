<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		$this->output->set_template('adminLTE/default');
		$this->load->model('M_d');
		Modules::run('login/cek_login');
	}
	
	public function index()
	{
		$data['jumlah_undangan'] = $this->M_d->jumInv();
		$data['jumlah_slot'] = $this->M_d->jumSlot();
		$data['jumlah_konfirmasi'] = $this->M_d->jumKonfirmasi();

		$data['jumlah_perwakilan'] = $this->M_d->jumPerwakilan();
		$this->output->append_title("PDS");
		$this->load->view('beranda', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */