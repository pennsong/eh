<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class HunterMain extends CW_Controller {
	public function index($offset = 0) {
		$pageSize = 10;
		$config['base_url'] = site_url('hunterMain/index');
		$config['per_page'] = $pageSize;
		$config['uri_segment'] = '3';
		$config['first_link'] = '<<';
		$config['last_link'] = '>>';
		$tmpRes = $this -> db -> query("CALL PhunterTalentRecordForHunter(?,?,?)", array($this -> session -> userdata('userAccount'), $offset, $pageSize));
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
		$vars['page_title'] = '猎头首页';
		$vars['content_view'] = 'hunterMain';
		$this -> load -> library('pagination');
		$this -> pagination -> initialize($config);
		$this -> load -> helper('form');
		$this -> smarty -> view('template.tpl', $vars);
	}

	public function saveNote() {
		$tmpRes = $this -> db -> query("SELECT FchangeHunterTalentRecordNote(?,?) AS fResult", array($this -> input -> post('recordId'), $this -> input -> post('note')));
		if ($tmpRes) {
			$tmpStr = $tmpRes -> row() -> fResult;
			if (strpos($tmpStr, "OK") === false) {
				echo "更新失败!";
			} elseif (strpos($tmpStr, "数据没有变化") === false) {
				echo "更新成功!";
			} else {
				echo "数据没有变化!";
			}
		} else {
			echo "更新失败!";
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
