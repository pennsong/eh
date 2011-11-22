<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HunterMain extends CI_Controller {

	public function index()
	{
		$tmpRes = $this->db->query("call PhunterTalentRecordForHunter(?,?,?)", array($this->session->userdata('userAccount'), null, null));
		if ($tmpRes)
		{
			$vars['hunterTalentRecord'] = $tmpRes->result_array();
			$tmpRes->free_all();
		}
		else
		{
			$var['infoError'] = '查询失败！请重试';	
		}				
		$vars['page_title'] = '猎头首页';
		$vars['content_view'] = 'hunterMain';
		$this->load->view('template', $vars);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */