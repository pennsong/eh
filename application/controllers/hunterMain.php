<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HunterMain extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$vars['page_title'] = '猎头首页';
		$vars['content_view'] = 'hunterMain';
		$this->load->view('template', $vars);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */