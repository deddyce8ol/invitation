<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller {

	public function index()
	{
		$this->output->set_template('adminLTE/default');
		$this->load->view('admin/cek');
	}

}

/* End of file category.php */
/* Location: ./application/modules/category/controllers/category.php */