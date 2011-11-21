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

				$file_temp = $_FILES['file']['tmp_name'];
				$file_name = $_FILES['file']['name'];
				//complete upload
				$filestatus = move_uploaded_file($file_temp, "upload/".$file_name);
				if (!$filestatus)
				array_push($errors, "Upload failed. Please try again.");
				else
				{
					$subject = $file_name;
					$fileUrl = $file_name;
					//extract hunter name, candidate mobile and candidate name unicode
					$pattern = '/([A-Za-z0-9]{5,8})_([0-9]{11})_((?:#[0-9]{1,5}#){2,5})\.(png|flv)/';
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
					$pattern2 = '/#([0-9]{1,5})#/';
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
							array_push($errors, "insert record failed.");
						}
						else
						{
							$success = "true";
						}

					}
					else
					{
						array_push($errors, "insert record failed.");
					}
				}
				break;
			default:
				array_push($errors, "No action was requested.");
		}
		$this->_return_result($success,$errors,$data);
	}


	private function _return_result($success,$errors,$data) {
		echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
		echo "<results>";
		echo "<success>$success</success>";
		echo "$data";
		$this->_echo_errors($errors);
		echo "</results>";
	}

	private function _echo_errors($errors) {

		for($i=0; $i < count($errors); $i++) {
			echo ("<error>$errors[$i]</error>");
		}
	}

}
?>