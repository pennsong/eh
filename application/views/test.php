<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta content="Boks - 0.5.8" name="generator"/>
		<title>Untitled</title>
		<!-- Framework CSS -->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/screen.css");?>" type="text/css" media="screen, projection"/>
		<link rel="stylesheet" href="<?php echo base_url("resource/css/print.css");?>" type="text/css" media="print"/>
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo base_url("resource/css/ie.css");?>" type="text/css" media="screen, projection"/><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url("resource/css/user.css");?>" type="text/css" media="screen, projection"/>
		<script src="<?php echo base_url("resource/css/jquery.js");?>"></script>
		<script src="<?php echo base_url("resource/flowplayer/flowplayer-3.2.6.min.js");?>"></script>
		<script>
			$(document).ready(function()
			{
				$("#tt2").click(function()
				{
					if($("#dropdown").is(":hidden"))
					{
						$("#dropdown").show();
					}
					else
					{
						$("#dropdown").hide();
					}
				});
				$(".word").click(function()
				{
					$(".draw").hide();
					$(this).siblings(".draw").show();
				});
				$(".closeDraw").click(function()
				{
					$(".draw").hide();
				});
			});

		</script>
	</head>
	<body>
		<div class="container ">
			<div class="span-24 last top">
				<div class="prepend-1 span-4">
					<img src="<?php echo base_url("resource/pic/a.png");?>"/>
				</div>
				<div class="prepend-12 span-5 last" id="div_profile">
					<a id="tt2" href="#"><img id="img_new" src="<?php echo base_url("resource/pic/default_profile_6_normal.png");?>" /><span id="test">123456ssss1</span></a>
					<span id="bar"></span>
					<a id="logout" href="#">退出</a>
				</div>
			</div>
			<div class="info span-24 last">
			</div>
			<div class="large span-22">
				<div class="main prepend-1 span-13">
					<?php for ($i=0; $i < 10; $i++){
					?>
					<div class="content">
						<div class="draw">
							<div class="drawHead">
								<a class="closeDraw" href="#">关闭<span>×</span></a>
							</div>
							<div>
								<img src="<?php echo base_url("resource/pic/default_profile_6_normal.png");?>" />
								张三
							</div>
							<div>
								<span class="normalLink">若满意可点击</span><a id="buy">获取</a><span class="normalLink">获取联系方式,你的积分还有：100分</span>
							</div>
							<hr class="dashboard"/>
							<div class="divVod">
								<a
								href="<?php echo base_url("upload/1.flv");?>"
								style="display:block;width:320px;height:240px"
								id="player"> </a>
								<!-- this will install flowplayer inside previous A- tag. -->
								<?php
								$tmpUrl = base_url("resource/flowplayer/flowplayer-3.2.7.swf");
								$tmpStr = <<<LONG
<script>
flowplayer("player", "{$tmpUrl}",
{
clip :
{
autoPlay : false,
autoBuffering : true
}
});
</script>
LONG;
								echo $tmpStr;
								?>
							</div>
							<hr class="dashboard"/>
							<div class="note">
								<textarea class="note">备注信息</textarea>
							</div>
						</div>
						<div class="clogo">
							<img src="<?php echo base_url("resource/pic/default_profile_6_normal.png");?>" />
						</div>
						<div class="word">
							<div class="ctitle">
								<span>张三</span>
							</div>
							<div class="ccontent">
								<span>面貌较好，为人热情</span>
							</div>
							<div class="ctime">
								最近更新：1小时前
							</div>
						</div>
					</div>
					<?php }?>
					<div class="head">
						<span class="head-title">有什么新鲜事？</span>
					</div>
				</div>
				<div class="dashboard prepend-1 span-7">
					<div>
						<span class="dashTitle">欢迎您！</span>
						<hr class="dashboard"/>
					</div>
					<div class="dashboard prepend-1 span-7">
						<div>
							<span class="mail">点击左侧列表中的项目显示详细信息</span>
						</div>
					</div>
				</div>
	</body>
</html>
