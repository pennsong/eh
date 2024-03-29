<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta content="Boks - 0.5.8" name="generator"/>
		<title><?php echo $page_title;?></title>
		<!-- Framework CSS -->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/screen.css");?>" type="text/css" media="screen, projection"/>
		<link rel="stylesheet" href="<?php echo base_url("resource/css/print.css");?>" type="text/css" media="print"/>
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo base_url("resource/css/ie.css");?>" type="text/css" media="screen, projection"/><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/user.css");?>" type="text/css" media="screen, projection"/>
		<script src="<?php echo base_url("resource/css/jquery.js");?>"></script>
		<script src="<?php echo base_url("resource/flowplayer/flowplayer-3.2.6.min.js");?>"></script>
	</head>
	<body>
		<div class="container">
			<?php $this->load->view('user_controls');?>
			<?php $this->load->view($content_view);?>
		</div>
	</body>
</html>
