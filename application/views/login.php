<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta content="Boks - 0.5.8" name="generator"/>
		<title>登录</title>
		<!-- Framework CSS -->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/screen.css");?>" type="text/css" media="screen, projection"/>
		<link rel="stylesheet" href="<?php echo base_url("resource/css/print.css");?>" type="text/css" media="print"/>
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo base_url("resource/css/ie.css");?>" type="text/css" media="screen, projection"/><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/user.css");?>" type="text/css" media="screen, projection"/>
		<script src="<?php echo base_url("resource/css/jquery.js");?>"></script>
		<script src="<?php echo base_url("resource/flowplayer/flowplayer-3.2.6.min.js");?>"></script>
	</head>
	<body class="firstPage">
		<div class="container">
			<div class="router_front span-24 last">
				<div class="left prepend-1 span-12">
					<h1>欢迎</h1>
					<h2>发挥网络的力量</h2>
					<p>
						创新招聘平台
					</p>
				</div>
				<div class="right prepend-2 span-8 last">
						<?php
		echo form_open('login/submit_validate');
		?>

						<div class="login">
							<div class="holding">
								<input class="username" name="username" value="<?php echo set_value('username');?>" title="用户名" type="text" />
								<span class="holder">用户名</span>
							</div>
							<div class="holding">
								<input class="username" name="password" title="密码" type="password" />
								<span class="holder">密码</span>
							</div>
							<div class="radio">
								<input type="radio" name="type" value="hunter" 
											<?php
			echo set_radio('type', 'hunter', TRUE);
			?>/>
								<span class="usertype">伯乐</span>
								<input type="radio" name="type" value="company"
											<?php
			echo set_radio('type', 'company');
			?> />
								<span class="usertype">公司</span>
							</div>
							<div class="loginButton">
								<button name="btnUsername" class="loginButton" title="用户名" type="submit">
									<span class="loginButton">登录</span>
								</button>
							</div>
							<div>
							<span class="warn"><?php echo $warnInfo?></span>
							</div>
						</div>
			<?php
			echo form_close();
			?>
					</div>
				</div>
			</div>
	</body>
</html>
			