<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta content="Boks - 0.5.8" name="generator"/>
		<title>登录</title>
		<!-- Framework CSS -->
		<link rel="stylesheet" href="{url}resource/css/screen.css" type="text/css" media="screen, projection"/>
		<link rel="stylesheet" href="{url}resource/css/print.css" type="text/css" media="print"/>
		<!--[if lt IE 8]><link rel="stylesheet" href="{url}resource/css/ie.css" type="text/css" media="screen, projection"/><![endif]-->
		<link rel="stylesheet" href="{url}resource/css/user.css" type="text/css" media="screen, projection"/>
		<link rel="stylesheet" href="{url}resource/css/template.css" type="text/css" media="screen, projection"/>
		<link rel="stylesheet" href="{url}resource/css/validationEngine.jquery.css" type="text/css" media="screen, projection"/>
		<script src="{url}resource/css/jquery.js" type="text/javascript"></script>
		<script src="{url}resource/css/jquery.validationEngine.js" type="text/javascript"></script>
		<script src="{url}resource/css/languages/jquery.validationEngine-zh_CN.js" type="text/javascript"></script>
		<style type="text/css" media="screen">
			body {
				background-image: url("{url}resource/pic/bgfirst.png");
				background-repeat: repeat-x;
			}
			.defaultText {
			}
			div.title {
				padding-top: 10px;
				padding-bottom: 30px;
			}
			div.usernameLabel {
				padding-top: 10px;
				padding-bottom: 10px;
			}
			div.usernameInput {
			}
			div.passLabel {
				padding-top: 10px;
				padding-bottom: 10px;
			}
			div.passInput {
			}
			div.chooseTypeLabel {
				padding-top: 10px;
				padding-bottom: 10px;
			}
			div.chooseType {
				padding-bottom: 10px;
			}
			div.defaultStr {
				padding-top:4px;
				padding-bottom:2px;
				position: absolute;
				display: none;
				top: 0px;
				left: 2px;
				font-size: 14px;
				line-height: 14px;
				height: 14px;
				color: #a1a1a1;
				z-index: 1;
			}
			div.tt
			{
				width: 200px;
				height: 20px;
				background-color: red;
			}
		</style>
		<script>
			$(document).ready(function() {
				$(".defaultStr").click(function() {
					$(this).prev(".defaultText").focus();
				});
				$(".defaultText").focus(function() {
					$(".error1").html('');
					$(this).next(".defaultStr").hide();
				});
				$(".defaultText").blur(function() {
					if($(this).val() == "") {
						$(this).next(".defaultStr").show();
					}
				});
				$(".defaultText").blur();
				$("#loginForm").validationEngine();
			});
			function checkUserName(field, rules, i, options) {
				var err = new Array();
				var reg1 = /^[_\.].*/;
				var reg2 = /.*[_\.]$/;
				var str = field.val();
				if(reg1.test(str) || reg2.test(str)) {
					err.push('* 不能以下划线或点开始或结束！');
				}
				if(countOccurrences(str, '.') > 1 || countOccurrences(str, '_') > 1) {
					err.push('* 一个用户名仅允许包含一个下划线或一个点！');
				}
				if(err.length > 0) {
					return err.join("<br>");
				}
			}

			function countOccurrences(str, character) {
				var i = 0;
				var count = 0;
				for( i = 0; i < str.length; i++) {
					if(str.charAt(i) == character) {
						count++;
					}
				}
				return count;
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="span-64 last">
				  <img src="{url}resource/pic/logo.png"/>
			</div>
			<div class="clear span-64 last">
				<div class="span-19 prepend-19 append-26 last title">
					<div class="head1">
						欢迎来到E-hiring
					</div>
				</div>
				<form id="loginForm" action="{url type='site' url='login/submit_validate'}" method="post">
					<div class="clear span-19 prepend-19 append-26 last usernameLabel">
						<div class="label1">
							用户名
						</div>
					</div>
					<div class="clear span-19 prepend-19  append-26 last usernameInput">
						<div class="inline relative tt">
							<input id="username" name="username" class="defaultText input1 validate[required, custom[onlyLetterNumberUnderLineDot], minSize[6], maxSize[15], funcCall[checkUserName]]" value="{postData name='username'}" type="text" />
							<div class="inline defaultStr">
								请输入用户名
							</div>
						</div>
						<div class="inline error1">
							 {$userNameErrorInfo|checkNull}
						</div>
					</div>
					<div class="clear span-19 prepend-19 append-26 last passLabel">
						<div class="label1">
							密码
						</div>
					</div>
					<div class="clear span-19 prepend-19  append-26 last passInput">
						<div class="inline relative">
							<input id="password" name="password" class="defaultText input1 validate[required, custom[onlyLetterNumber], minSize[6], maxSize[20]]" type="text" />
							<div class="inline defaultStr">
								请输入密码
							</div>
						</div>
						<div class="inline error1">
							 {$passErrorInfo|checkNull}
						</div>
						 
					</div>
					<div class="clear span-19 prepend-19 append-26 last chooseTypeLabel">
						<div class="label1">
							请选择您的身份
						</div>
						 
					</div>
					<div class="clear span-19 prepend-19 append-26 last chooseType">
						<!--{if !isset($smarty.post.type) or ($smarty.post.type!='company')}-->
						<input class="validate[required]" type="radio" name="type" id="typeHunter" value="hunter" checked="checked"/>
						<!--{else}-->
						<input class="validate[required]" type="radio" name="type" id="typeHunter" value="hunter"/>
						<!--{/if}-->
						<div class="label1 inline">
							伯乐
						</div>
						<!--{if isset($smarty.post.type) and $smarty.post.type=='company'}-->
						<input class="validate[required]" type="radio" name="type" id="typeCompany" value="company" checked="checked"/>
						<!--{else}-->
						<input class="validate[required]" type="radio" name="type" id="typeCompany" value="company"/>
						<!--{/if}-->
						<div class="label1 inline">
							公司
						</div>
						 
					</div>
					<div class="clear span-19 prepend-19  append-26 last">
						<div class="inline">
							<button id="loginButton" class="button1" type="submit">
								进入E-hiring
							</button>
						</div>
						<div class="inline error1">
							 {$loginErrorInfo|checkNull}
						</div>
						 
					</div>
				</form>
			</div>
		</div>
	</body>
</html>