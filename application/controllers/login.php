<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->smarty->view('login.tpl');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . "index.php/login");
	}

	public function submit_validate()
	{
		$vars = array();
		if ($this->authenticate($vars))
		{
			//登录成功
			if ($this->session->userdata('type') == 'hunter')
			{
				redirect(base_url() . 'index.php/hunterMain');
			}
			else if ($this->session->userdata('type') == 'company')
			{
				redirect(base_url() . 'index.php/companyMain');
			}
		}
		else
		{
			//登录失败
			$this->smarty->view('login.tpl', $vars);
		}
	}

	private function _checkDataFormat(&$result)
	{
		$this->load->library('form_validation');
		$config = array(
				array(
						'field' => 'username',
						'label' => '用户名',
						'rules' => 'required|callback_username_check1|callback_username_check2|callback_username_check3'
				),
				array(
						'field' => 'password',
						'label' => '密码',
						'rules' => 'required|alpha_numeric|min_length[6]|max_length[20]'
				)
		);
		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('', '');
		if ($this->form_validation->run() == FALSE)
		{
			$result = validation_errors();
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function username_check1($str)
	{
		$r1 = preg_match("/^[\w\.]{6,15}$/", $str);
		if ($r1 == 0)
		{
			$this->form_validation->set_message('username_check1', '%s 只能包含英文字母，数字，下划线和点,长度为6-15;');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function username_check2($str)
	{
		$docNum = substr_count($str, '.');
		$lineNum = substr_count($str, '_');
		if ($docNum + $lineNum > 1)
		{
			$this->form_validation->set_message('username_check2', '%s 只能包含一个下划线或点;');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function username_check3($str)
	{
		$r1 = preg_match("/^\..*/", $str);
		$r2 = preg_match("/^_.*/", $str);
		$r3 = preg_match("/.*\.$/", $str);
		$r4 = preg_match("/.*_$/", $str);
		if ($r1 || $r2 || $r3 || $r4)
		{
			$this->form_validation->set_message('username_check3', '%s 不能以下划线或点开始或结束;');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function authenticate(&$vars)
	{
		//check data format
		if (!($this->_checkDataFormat($result)))
		{
			$vars['loginErrorInfo'] = $result;
			return FALSE;
		}
		else if ($this->input->post('type') == 'hunter')
		{
			$tmpRes = $this->db->query('SELECT * FROM hunter WHERE account = ?', strtolower($this->input->post('username')));
			if ($tmpRes)
			{
				if ($tmpRes->num_rows() > 0)
				{
					$tmpArr = $tmpRes->first_row('array');
					if ($tmpArr['password'] == strtolower($this->input->post('password')))
					{
						$this->session->set_userdata('userAccount', strtolower($this->input->post('username')));
						$this->session->set_userdata('userId', $tmpArr['id']);
						$this->session->set_userdata('type', 'hunter');
						return TRUE;
					}
					else
					{
						//密码错误
						$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
						$vars['passErrorInfo'] = "密码错误，请仔细检查";
						return FALSE;
					}
				}
				else
				{
					//用户名不存在
					$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
					return FALSE;
				}
			}
			else
			{
				//查询失败
				$vars['loginErrorInfo'] = "系统繁忙，请稍后尝试进入";
				return FALSE;
			}
		}
		else if ($this->input->post('type') == 'company')
		{
			$tmpRes = $this->db->query('SELECT * FROM company WHERE account = ?', strtolower($this->input->post('username')));
			if ($tmpRes)
			{
				if ($tmpRes->num_rows() > 0)
				{
					$tmpArr = $tmpRes->first_row('array');
					if ($tmpArr['password'] == strtolower($this->input->post('password')))
					{
						$this->session->set_userdata('userAccount', strtolower($this->input->post('username')));
						$this->session->set_userdata('userId', $tmpArr['id']);
						$this->session->set_userdata('type', 'company');
						return TRUE;
					}
					else
					{
						//密码错误
						$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
						$vars['passErrorInfo'] = "密码错误，请仔细检查";
						return FALSE;
					}
				}
				else
				{
					//用户名不存在
					$vars['loginErrorInfo'] = "您的用户名和密码填错了哟，请仔细检查";
					return FALSE;
				}
			}
			else
			{
				//查询失败
				$vars['loginErrorInfo'] = "系统繁忙，请稍后尝试进入";
				return FALSE;
			}
		}
		else
		{
			//错误的用户类型
			return FALSE;
		}
	}

}
?>
