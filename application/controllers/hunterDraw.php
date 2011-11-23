<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HunterDraw extends CI_Controller {

	public function index($recordId)
	{
		$tmpRes = $this->db->query("CALL PahunterTalentRecord(?)", array($recordId));
		if ($tmpRes)
		{
			$hunterTalentRecord = $tmpRes->result_array();
			$vars['item'] = $hunterTalentRecord[0];
			$tmpRes->free_all();
			$this->load->view('hunterDraw.php', $vars);
		}
		else
		{
			$var['infoError'] = '查询失败！请重试';
		}
	}
}
?>