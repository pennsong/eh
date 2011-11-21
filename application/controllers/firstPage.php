<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FirstPage extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('firstPage');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */