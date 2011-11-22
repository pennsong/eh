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
		$this->load->view('login');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."index.php/login");
	}

	public function submit_validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', '用户名', 'trim|required|callback_authenticate');
		$this->form_validation->set_rules('password', '密码', 'trim|required');
		$this->form_validation->set_rules('type', '用户类别', 'required');
		$this->form_validation->set_message('required', '%s必填');
		$this->form_validation->set_message('authenticate', '登录失败');
		if ($this->form_validation->run() == TRUE)
		{
			if ($this->session->userdata('type') == 'hunter')
			{
				redirect(base_url().'index.php/hunterMain');
			}
			else if ($this->session->userdata('type') == 'company')
			{
				redirect(base_url().'index.php/hunterMain');
			}
			else
			{
				$this->index();
			}
		}
		else
		{
			$this->index();
		}
	}

	public function authenticate()
	{
		if ($this->input->post('type') == 'hunter')
		{
			$tmpRes = $this->db->query('SELECT * FROM hunter WHERE account = ?', $this->input->post('username'));
			if ($tmpRes && $tmpRes->num_rows() > 0)
			{
				$tmpArr = $tmpRes->first_row('array');
				if ($tmpArr['password'] == $this->input->post('password'))
				{
					$this->session->set_userdata('userAccount', $this->input->post('username'));
					$this->session->set_userdata('userId', $tmpArr['id']);
					$this->session->set_userdata('type', 'hunter');
					return TRUE;
				}
			}
		}
		else if ($this->input->post('type') == 'company')
		{
			$tmpRes = $this->db->query('SELECT * FROM company WHERE account = ?', $this->input->post('username'));
			if ($tmpRes && $tmpRes->num_rows() > 0)
			{
				$tmpArr = $tmpRes->first_row('array');
				if ($tmpArr['password'] == $this->input->post('password'))
				{
					$this->session->set_userdata('userAccount', $this->input->post('username'));
					$this->session->set_userdata('userId', $tmpArr['id']);
					$this->session->set_userdata('type', 'company');
					return TRUE;
				}
			}
		}
		return FALSE;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
