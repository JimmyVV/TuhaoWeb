<!DOCTYPE html>
<html lang="en">
	<head>
		{include 'content/title.tpl'}
		<!--[if lte IE 9]>
   			<link rel="stylesheet" href="../styles/browser.css" />
		 <![endif]-->
		<link rel="stylesheet" type="text/css" href="./styles/homepage.css" />
		<link rel="stylesheet" type="text/css" href="./styles/banner-switch.css">		
	</head>
	<body>
		<header>
		{include 'content/header.tpl' username=$username loginFlag=$loginFlag sentNum=$sentNum mesNum=$mesNum}
		 <div class="doodle">		
				{include 'content/nav_1.tpl' activity=$activity study=$study clothes=$clothes digital=$digital transportation=$transportation entertainment=$entertainment others=$others}		
				<div class="carsouel">
					<div class="switch-arrow left-arrow">
						<a href="javascript:;" class="arrow-left"></a>
					</div>
					<div class="switch-arrow right-arrow">		
						<a href="javascript:;" class="arrow-right"></a>
					</div>
					<div class="container">
						<img src="images/banner/carousel1.jpg" alt="3" />
						<img src="images/banner/11.11.png" alt="1" />
						<img src="images/banner/carousel2.jpg" alt="2" />
						<img src="images/banner/carousel1.jpg" alt="3" />
						<img src="images/banner/11.11.png" alt="1" />
					</div>
					<div class="carsouel-buttons" id="buttons">
						<a href="javascript:void(0)"><span index="1" class="on"></span></a>
						<a href="javascript:void(0)"><span index="2"></span></a>
						<a href="javascript:void(0)"><span index="3"></span></a>
					</div>
				</div>
			</div>
		</header>
		<article>
			<div class="recommend">
				<p>推荐物品:   <i class="logo-left-arrow"></i><i class="logo-right-arrow"></i></p>
				<ul>
				{foreach $hotGoods1 as $recommend}
					<li>
						<a href="detail.php?pro_id={$recommend.id}">
							<div class="thumbnail">
								<img src="{$recommend.src}" />
							</div>
							<p>{$recommend.pro_name}</p>
							<h3>{$recommend.username}  {$recommend.college}</h3>
						</a>
					</li>
				{/foreach}
				</ul>
			</div>
			<!-- 商品推荐 -->
			<div class="divided">
				<div class="item1"><img src="images/order.png" alt="">最新发布 :</div>
			</div>
			<!-- 主要内容 -->
			<article class="content">
				<!-- 左侧商品栏 -->
				<section class="left">
					<ul>
					{for $var=0 to 3}
						<li>
							<a href="detail.php?pro_id={$newGoods[$var].id}">
								<div class="thumbnail">
									<img src="{$newGoods[$var].src}" />
								</div>
							</a>
							<div class="sticky-note">
								<a href="detail.php?pro_id={$newGoods[$var].id}">ABOUT MORE</a>
								<p>{$newGoods[$var].pro_desc}</p>
								<span>{$newGoods[$var].college} {$newGoods[$var].username}</span>
							</div>
						</li>
						{/for}
					</ul>
				</section>
				<!-- 左侧商品栏 -->
				<!-- 土豪榜 -->
				<section class="right">
					<h1>土豪榜</h1>
					<div class="chart">
						<div class="title"><a class="week-chart chart-active" href="javascript:void(0)">周榜</a> <span>|</span> <a class="month-chart" href="javascript:void(0)">总榜</a></div>
						<!-- 土豪lists -->
						<a href="tuhao-chart.php?type=week">
						<div class="lists" id="wrapper">
							<ul id="scroller">		
								<div class="first-title" data-title="1">
								 <div class="container-img"><img src="{$chart[0].head_photo}" /></div>
									<div class="sticky">
										<span>{$chart[0].college}</span>
										<span>{$chart[0].username}</span>
									</div>
								</div>
								{for $var = 1 to 9}
								{if $chart[$var]}
								<li data-title="{$var+1}">
									<img src="{$chart[$var].head_photo}" />
									<div class="detail">
										<span data-role="level">LV{$chart[$var].levell}</span>
										<span data-role="name">{$chart[$var].username}</span>
										<span data-role="college">{$chart[$var].college}</span>
										<span data-role="score">积分: {$chart[$var].score}</span>
									</div>
								</li>
								{/if}
								{/for}
							</ul>
						</div>
						</a>
						<div class="change-lists">
							<a class="down" href="javascript:void(0)"><i class="logo-large-down-arrow"></i></a>
							<a class="up" href="javascript:void(0)"><i class="logo-large-up-arrow"></i></a>
						</div>
					</div>
				</section>
				<!-- 土豪榜 -->
			</article>
			<!-- 主要内容 -->
			 <section class="add_more">
			 	<ul>
				</ul>
			</section>
			<button class="getall">
				查看更多
			</button>
		</article>		
		{include 'content/modals.tpl'}
		{include 'content/footer.tpl'}
		
	<!--[if lte IE 9]>
	<script type="text/javascript">
		document.getElementsByTagName('body')[0].innerHTML = '<div class="attention">' +
			'<div class="tip">' +
			'<div class="tip-head">' +
			'<img src="../images/browser/tip.png" alt="友情提示">' +
			'</div>' +
			'<div class="tip-content">' +
			'<img src="../images/browser/tip1.png" alt="友情提示">' +
			'</div>' +
			'</div>' +
			'<div class="browser">' +
			'<a href="https://www.google.com/intl/zh-CN/chrome/browser/desktop/index.html" target="_blank" class="xiazai">' +
			'<img src="../images/browser/chrome.png" alt="chrome">' +
			'</a>' +
			'<a href="http://www.opera.com/zh-cn" class="xiazai" target="_blank">' +
			'<img src="../images/browser/opera.png" alt="opera">' +
			'</a>' +
			'<a href="https://support.apple.com/zh_CN/downloads/" class="xiazai" target="_blank">' +
			'<img src="../images/browser/safari.png" alt="safari">' +
			'</a>' +
			'</div>' +
			'</div>';
	</script>

	<![endif]-->
	<script type="text/javascript" src="./scripts/lib/jQuery.js"></script>
		<script type="text/javascript" src="./scripts/lib/iscroll.js"></script>
		<script type="text/javascript" src="./scripts/lib/jquery.simplemodal.js"></script>
		<script src="scripts/lib/sea.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="./scripts/iSend.js"></script>
		<script type="text/javascript">
			seajs.use('/scripts/header')
		</script>
	</body>
</html>
