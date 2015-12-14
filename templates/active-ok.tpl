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
			<span class="confirm-success">邮箱验证成功</span><br/>
			<span>页面将在<span class="time" id="time">3</span>秒后跳转至<a href="/">土豪网首页</a></span>
		</div>
	</main>
   {include 'content/footer.tpl'}
	<script type="text/javascript" src="./scripts/lib/jQuery.js"></script>
	<script type="text/javascript" src="./scripts/footer.js"></script>
    <script type="text/javascript" src="./scripts/active-ok.js"></script>
</body>
</html>