<!DOCTYPE html>
<html lang="en">
	<head>
		{include 'content/title.tpl'}
		<link rel="stylesheet" type="text/css" href="styles/homepage.css" />
		<link rel="stylesheet" type="text/css" href="styles/search.css"/>
	</head>
	<body>
		<header>
			{include 'content/header.tpl' username=$username loginFlag=$loginFlag sentNum=$sentNum mesNum=$mesNum}
			<div class="doodle">
				{include 'content/nav.tpl' activity=$activity study=$study clothes=$clothes digital=$digital transportation=$transportation entertainment=$entertainment others=$others}
			</div>
		</header>
		{include 'content/cateResult.tpl' key = "推荐物品" goods = $goods max = $max}		
		{include 'content/modals.tpl'}
		{include 'content/footer.tpl'}
		<script type="text/javascript" src="scripts/lib/jQuery.js"></script>
		<script type="text/javascript" src="scripts/lib/jquery.simplemodal.js"></script>
		<script src="scripts/lib/sea.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			seajs.use(['/scripts/more','/scripts/header'])
		</script>
	</body>
</html>
