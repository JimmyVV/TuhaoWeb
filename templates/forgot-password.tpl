<!DOCTYPE html>
<html lang="en">
	<head>
		{include 'content/title.tpl'}
		<link rel="stylesheet" type="text/css" href="./styles/forget-password.css">
		<link rel="stylesheet" type="text/css" href="./styles/homepage.css">
	</head>
	<body>
		<!-- 头部信息 -->
		<header class="header">
			 {include 'content/header_1.tpl'}
		</header>
		<article class="item2" style="padding-top: 80px;">
			<header>请输入您找回密码的邮箱</header>
			<table class="confirmation">
				<tr class="email">
					<td>电子邮箱:</td>
					<td class="email-td">
						<input id="email" type="text" role="email" />
						<p class="prompt"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button role="submit">确定</button>
					</td>
				</tr>
			</table>
		</article>
		<!-- 头部信息 -->
		{include 'content/footer.tpl'}
		<script type="text/javascript" src="./scripts/lib/jQuery.js"></script>
		<script type="text/javascript" src='./scripts/forget.js'></script>
	</body>
</html>
