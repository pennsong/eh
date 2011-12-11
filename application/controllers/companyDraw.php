<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class CompanyDraw extends CI_Controller {
	public function index($recordId) {
		$tmpRes = $this -> db -> query("CALL PahunterTalentRecord(?)", array($recordId));
		if ($tmpRes) {
			$hunterTalentRecord = $tmpRes -> result_array();
			$vars['item'] = $hunterTalentRecord[0];
			$tmpRes -> free_all();
			//check whether the photo and vod exists
			if ($vars['item']['talentPhoto'] == null || $vars['item']['talentPhoto'] == "" || !file_exists("upload/" . $vars['item']['talentPhoto'])) {
				$vars['item']['talentPhoto'] = "empty.png";
			}
			if ($vars['item']['talentPhoto'] == null || $vars['item']['talentPhoto'] == "" || !file_exists("upload/" . $vars['item']['talentVod'])) {
				$vars['item']['talentVod'] = "empty.png";
			}
			//check whether the record was bought
			$tmpRes = $this -> db -> query("SELECT FcheckCompanyBoughtRecord(?, ?) AS fResult", array($this -> session -> userdata('userId'), $recordId));
			if ($tmpRes) {
				$tmpArray = $tmpRes -> result_array();
				$vars['bought'] = $tmpArray[0]['fResult'];
				$tmpRes = $this -> db -> query("SELECT point FROM company WHERE id = ?", array($this -> session -> userdata('userId')));
				if ($tmpRes) {
					$tmpArray = $tmpRes -> result_array();
					$vars['point'] = $tmpArray[0]['point'];
					$this -> load -> view('companyDraw.php', $vars);
				} else {
					$var['infoError'] = '查询失败！请重试';
				}
			} else {
				$var['infoError'] = '查询失败！请重试';
			}
		} else {
			$var['infoError'] = '查询失败！请重试';
		}
	}

}
?>