<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this -> load -> helper('form');
		$this -> load -> helper('url');
	}

	public function index() {
		$this -> smarty -> view('login.tpl');
	}

	public function logout() {
		$this -> session -> sess_destroy();
		redirect(base_url() . "index.php/login");
	}

	public function submit_validate() {
		$vars = array();
		if ($this -> authenticate($vars)) {
			//登录成功
			if ($this -> session -> userdata('type') == 'hunter') {
				redirect(base_url() . 'index.php/hunterMain');
			} else if ($this -> session -> userdata('type') == 'company') {
				redirect(base_url() . 'index.php/companyMain');
			}
		} else {
			//登录失败
			$this -> smarty -> view('login.tpl', $vars);
		}
	}

	public function authenticate(&$vars) {
		if ($this -> input -> post('type') == 'hunter') {
			$tmpRes = $this -> db -> query('SELECT * FROM hunter WHERE account = ?', strtolower($this -> input -> post('username')));
			if ($tmpRes) {
				if ($tmpRes -> num_rows() > 0) {
					$tmpArr = $tmpRes -> first_row('array');
					if ($tmpArr['password'] == strtolower($this -> input -> post('password'))) {
						$this -> session -> set_userdata('userAccount', strtolower($this -> input -> post('username')));
						$this -> session -> set_userdata('userId', $tmpArr['id']);
						$this -> session -> set_userdata('type', 'hunter');
						return TRUE;
					} else {
						//密码错误
						$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
						$vars['passErrorInfo'] = "密码错误，请仔细检查";
						return FALSE;
					}
				} else {
					//用户名不存在
					$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
					return FALSE;
				}
			} else {
				//查询失败
				$vars['loginErrorInfo'] = "系统繁忙，请稍后尝试进入";
				return FALSE;
			}
		} else if ($this -> input -> post('type') == 'company') {
			$tmpRes = $this -> db -> query('SELECT * FROM company WHERE account = ?', strtolower($this -> input -> post('username')));
			if ($tmpRes) {
				if ($tmpRes -> num_rows() > 0) {
					$tmpArr = $tmpRes -> first_row('array');
					if ($tmpArr['password'] == strtolower($this -> input -> post('password'))) {
						$this -> session -> set_userdata('userAccount', strtolower($this -> input -> post('username')));
						$this -> session -> set_userdata('userId', $tmpArr['id']);
						$this -> session -> set_userdata('type', 'company');
						return TRUE;
					} else {
						//密码错误
						$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
						$vars['passErrorInfo'] = "密码错误，请仔细检查";
						return FALSE;
					}
				} else {
					//用户名不存在
					$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
					return FALSE;
				}
			} else {
				//查询失败
				$vars['loginErrorInfo'] = "系统繁忙，请稍后尝试进入";
				return FALSE;
			}
		} else {
			//错误的用户类型
			return FALSE;
		}
	}

}
?>
