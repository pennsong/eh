<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class CompanyMain extends CI_Controller {
	public function index($offset = 0) {
		$pageSize = 10;
		$config['base_url'] = site_url('companyMain/index');
		$config['per_page'] = $pageSize;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$tmpRes = $this -> db -> query("CALL PallHunterTalentRecord(?,?)", array($offset, $pageSize));
		if ($tmpRes) {
			$vars['hunterTalentRecord'] = $tmpRes -> result_array();
			$tmpRes -> free_all();
			$tmpRes = $this -> db -> query("SELECT FOUND_ROWS() as RtotalRows");
			if ($tmpRes) {
				$tmpArr = $tmpRes -> result_array();
				$config['total_rows'] = $tmpArr[0]['RtotalRows'];
			} else {
				$var['infoError'] = '查询失败！请重试';
			}
		} else {
			$var['infoError'] = '查询失败！请重试';
		}
		$vars['page_title'] = '公司首页';
		$vars['content_view'] = 'companyMain';
		$this -> load -> library('pagination');
		$this -> pagination -> initialize($config);
		$this -> load -> view('template', $vars);
	}

	public function buyRecord() {
		$tmpRes = $this -> db -> query("SELECT FbuyTalentRecord(?, ?) AS fResult", array($this -> session -> userdata('userId'), $this -> input -> post('recordId')));
		if ($tmpRes) {
			$tmpStr = $tmpRes -> row() -> fResult;
			if (strpos($tmpStr, "OK") === false) {
				echo $tmpStr;
			} else {
				$tmpRes = $this -> db -> query("SELECT talentMobile FROM hunterTalentRecord WHERE id = ?", array($this -> input -> post('recordId')));
				if ($tmpRes) {
					$tmpStr = $tmpRes -> row() -> talentMobile;
					echo "购买成功!" . "电话:" . $tmpStr;
				} else {
					echo "购买失败!";
				}
			}
		} else {
			echo "购买失败!";
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
