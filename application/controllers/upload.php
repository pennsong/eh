<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class Upload extends CI_Controller
{
	public function index()
	{
		$errors = array();
		$data = "";
		$success = "false";


		switch($_REQUEST['action'])
		{
			case "upload":
				$uploadRoot = "/Library/WebServer/Documents/eh/upload/";
				$file_temp = $_FILES['file']['tmp_name'];
				date_default_timezone_set('Asia/Shanghai');
				$dateStamp = date("Y_m_d");
				$dateStampFolder = $uploadRoot.$dateStamp;
				if (file_exists($dateStampFolder) && is_dir($dateStampFolder))
				{
				}
				else
				{
					if (mkdir($dateStampFolder))
					{
					}
					else
					{
						$this->_return("创建失败");
					}
				}
				$file_name = $dateStamp."/".$_FILES['file']['name'];
				//complete upload
				$filestatus = move_uploaded_file($file_temp, $uploadRoot.$file_name);
				if (!$filestatus)
				{
					$this->_return("上传失败");
				}
				else
				{
					$subject = $file_name;
					$fileUrl = $file_name;
					//extract hunter name, candidate mobile and candidate name unicode
					$pattern = '/([A-Za-z0-9]{5,8})_([0-9]{11})_((?:![0-9]{1,5}!){2,5})\.(png|flv)/';
					preg_match_all($pattern, $subject, $matches);
					$hunter = $matches[1][0];
					$mobile = $matches[2][0];
					$candiNameCode = $matches[3][0];
					$fileType = $matches[4][0];
					if ($fileType == 'png')
					{
						$infoType = 'talentPhoto';
					}
					else if ($fileType == 'flv')
					{
						$infoType = 'talentVod';
					}
					else
					{
						$infoType = "wrong type";
					}
					//extract candidate name unicode string
					$pattern2 = '/!([0-9]{1,5})!/';
					preg_match_all($pattern2, $candiNameCode, $matches2);
					$strUnicode = "";
					foreach ($matches2[1] as $charCode)
					{
						$strUnicode .= "&#".$charCode.";";
					}
					//convert candidate name's unicode string to real string
					$candiName = mb_convert_encoding($strUnicode, "UTF-8", "HTML-ENTITIES");
					//insert the candidate record into db
					$tmpRes = $this->db->query("SELECT FchangeHunterTalentRecord(?, ?, ?, ?, ?) as fResult", array($hunter, $mobile, $candiName, $fileUrl, $infoType));
					if ($tmpRes)
					{
						$tmpStr = $tmpRes->row()->fResult;
						if (strpos($tmpStr,"OK") === false)
						{
							$this->_return("数据插入失败");
						}
						else
						{
							$success = "true";
						}

					}
					else
					{
						$this->_return("数据查询失败");
					}
				}
				break;
			default:
				$this->_return("操作指令错误");
		}
		$this->_return("OK");
	}

	public function checkClientLogin($name, $pass)
	{
		$tmpRes = $this->db->query("SELECT password FROM hunter WHERE account = ?", array($name));
		if ($tmpRes)
		{
			if ($tmpRes->num_rows() == 0)
			{
				$this->_return("用户名不存在");
			}
			else
			{
				$tmpStr = $tmpRes->row()->password;
				if ($tmpStr != $pass)
				{
					$this->_return("密码错误");
				}
				else
				{
					$this->_return("OK");
				}
			}
		}
		else
		{
			$this->_return("数据查询失败");
		}
	}

	private function _return($msg)
	{
		echo "logmsg:".$msg;
		exit;
	}

	private function _echo_errors($errors) {

		for($i=0; $i < count($errors); $i++) {
			echo ("<error>$errors[$i]</error>");
		}
	}

}
?>