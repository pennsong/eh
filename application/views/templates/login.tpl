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
		<style type="text/css" media="screen">
			body {
				background-image: url("{url}resource/pic/bgfirst.png");
				background-repeat: repeat-x;
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
		</style>
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
				<form action="{url type='site' url='login/submit_validate'}" method="post">
					<div class="clear span-19 prepend-19 append-26 last usernameLabel">
						<div class="label1">
							用户名
						</div>
					</div>
					<div class="clear span-19 prepend-19  append-26 last usernameInput">
						<input class="input1" name="username" value="{postData name='username'}" title="用户名" type="text" />
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
						<input class="input1" name="password" title="密码" type="text" />
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
						<input type="radio" name="type" value="hunter" checked="checked"/>
						<!--{else}-->
						<input type="radio" name="type" value="hunter"/>
						<!--{/if}-->
						<div class="label1 inline">
							伯乐
						</div>
						<!--{if isset($smarty.post.type) and $smarty.post.type=='company'}-->
						<input type="radio" name="type" value="company" checked="checked"/>
						<!--{else}-->
						<input type="radio" name="type" value="company"/>
						<!--{/if}-->
						<div class="label1 inline">
							公司
						</div>
						 
					</div>
					<div class="clear span-19 prepend-19  append-26 last">
						<div class="inline">
							<button class="button1" type="submit">
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