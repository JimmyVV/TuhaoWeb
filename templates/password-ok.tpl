<!DOCTYPE html>
<html lang="en">
	<head>
		{include 'content/title.tpl'}
		<link rel="stylesheet" type="text/css" href="./styles/homepage.css">
		<link rel="stylesheet" type="text/css" href="styles/universe.css">
	</head>
	<body>
		<header>
			 {include 'content/header_1.tpl'}
		</header>
		<main>
			<div class="content-info">
				<span class="confirm-success">修改密码成功</span>
				<p>您将在<strong id="countTime">3</strong>s内返回首页</p>
			</div>
		</main>
		{include 'content/footer.tpl'}
		<script type="text/javascript" src="./scripts/lib/jQuery.js"></script>
		<script type="text/javascript" src="scripts/footer.js"></script>
		<script type="text/javascript" src='scripts/countTime.js'></script>
	</body>
</html>