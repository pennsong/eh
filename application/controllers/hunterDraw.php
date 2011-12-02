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
			//check whether the photo and vod exists
			if ($vars['item']['talentPhoto'] == null || $vars['item']['talentPhoto']=="" || !file_exists("upload/".$vars['item']['talentPhoto']))
			{
				$vars['item']['talentPhoto'] = "empty.png";
			}
			if ($vars['item']['talentPhoto'] == null || $vars['item']['talentPhoto']=="" || !file_exists("upload/".$vars['item']['talentVod']))
			{
				$vars['item']['talentVod'] = "empty.png";				
			}
			
			$this->load->view('hunterDraw.php', $vars);
		}
		else
		{
			$var['infoError'] = '查询失败！请重试';
		}
	}
}
?>