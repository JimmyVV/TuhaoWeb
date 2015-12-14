<!DOCTYPE html>
<html lang="en">
	<head>
		{include 'content/title.tpl'}
		<link rel="stylesheet" type="text/css" href="./styles/homepage.css"/>
		<link rel="stylesheet" type="text/css" href="./styles/tuhao-chart.css">
	</head>
	<body>
		<header>
			{include 'content/header.tpl' username=$username loginFlag=$loginFlag sentNum=$sentNum mesNum=$mesNum}
			<div class="doodle">
				{include 'content/nav.tpl' activity=$activity study=$study clothes=$clothes digital=$digital transportation=$transportation entertainment=$entertainment others=$others}
				<ul class="lists-top3 item3">
					{$var = 1}
					{foreach $chart1 as $chart}
					<li>
						<div class="detail">
							<a href="guest.php?id={$chart.id}">
								<div class="thumbnail">
									<span data-order="TOP{$var++}">{$chart.college}</span>
									<span>{$chart.username}</span>
									<div class="nothing"></div>
								</div>
								<img src="{$chart.head_photo}" />
							</a>
						</div>
						<p>积分 : {$chart.score}</p>
						<p>LV {$chart.levell}</p>
					</li>  
					{/foreach}		 
				</ul>
			</div>
		</header>
		<article class="tuhao-lists item3">
			<p>TOP 8: <i class="logo-toggle" id="top5-items" data-tooltip="详细"></i></p>
			<div class="content">
				<div class="lists-content">
					<div class="first">
						<div class="detail">
							<div class="thumbnail" index='1'>
								<span>{$chart2[0].college}</span>
								<span>{$chart2[0].username}</span>
								<div class="nothing"></div>
								<span class="orders">TOP 4</span>
								<span role="score">积分: {$chart2[0].score}</span>
							</div>
							<img src="{$chart2[0].head_photo}" />
						</div>
					</div>
					<div class="second">
						<div class="detail">
								<div class="thumbnail" index="2">
								<span>{$chart2[1].college}</span>
								<span>{$chart2[1].username}</span>
								<div class="nothing"></div>
								<span class="orders">TOP 5</span>
								<span role="score">积分: {$chart2[1].score}</span>
							</div>
							<img src="{$chart2[1].head_photo}" />
						</div>
						<div class="deadline">
							<span class="end">截至</span><span class="date">2015-08-31</span>
							<span class="month-chart">月榜</span>
						</div>
						<div class="third">
							<div class="decoration"></div>
							<div class="detail">
								<div class="thumbnail" index="3">
									<span>{$chart2[2].college}</span>
									<span>{$chart2[2].username}</span>
									<div class="nothing"></div>
									<span class="orders">TOP 6</span>
									<span role="score">积分: {$chart2[2].score}</span>
								</div>
								<img src="{$chart2[2].head_photo}" />
							</div>
						</div>
					</div>
					<div class="right-part">
						<div class="fourth">
							<div class="detail">
								<div class="thumbnail" index='4'>
									<span>{$chart2[3].college}</span>
									<span>{$chart2[3].username}</span>
									<div class="nothing"></div>
									<span class="orders">TOP 7</span>
									<span role="score">积分: {$chart2[3].score}</span>
								</div>
								<img src="{$chart2[3].head_photo}" />
							</div>
							<div class="decoration"></div>
						</div>
						<div class="fifth detail">
							<div class="thumbnail" index='5'>
								<span>{$chart2[4].college}</span>
								<span>{$chart2[4].username}</span>
								<div class="nothing"></div>
								<span class="orders">TOP 8</span>
								<span role="score">积分: {$chart2[4].score}</span>
							</div>
							<img src="{$chart2[4].head_photo}" />
						</div>
					</div>
				</div>
				<div class="detail-info detail-info-top5" id="container">
					<i class="left-arrow" id="prev"><a href="javascript:;"  class="logo-left-arrow"></a></i>
					<div class="chart-info">
						<div class="box" id="list" role="container" style="left:-667px">
						<div class="card" alt="1" >
						{$length=$chart2|@count-1}
								<img src="{$chart2[$length].head_photo}" alt="portrait" />
								<div class="card-info">
									<span class="colleges"  data-order="8">{$chart2[$length].college}</span>
									<div class="tuhao-name"><span role='name'><a href="guest.php?id={$chart2[$length].id}">{$chart2[$length].username}</a></span><span role="level">LV {$chart2[$length].levell}</span></div>
									<div class="sending">
										<span role="sent">已送出：{$chart2[$length].sendNum}</span>
										<span role="received">已收到：{$chart2[$length].receiveNum}</span>
									</div>
									<div class="nothing"></div>
								</div>
							</div>
							{foreach $chart2 as $chart}
							{if $chart}
							<div class="card" alt="{$chart@iteration}">
								<img src="{$chart.head_photo}" alt="portrait" />
								<div class="card-info">
								<span class="colleges"  data-order="{$chart@iteration + 3}">{$chart.college}</span>									
									<div class="tuhao-name"><span role='name'><a href="guest.php?id={$chart.id}">{$chart.username}</a></span><span role="level">LV{$chart.levell}</span></div>
									<div class="sending">
										<span role="sent">已送出：{$chart.sendNum}</span>
										<span role="received">已收到：{$chart.receiveNum}</span>
									</div>
									<div class="nothing"></div>
								</div>
							</div> 
							{/if}
							{/foreach}					   
							<div class="card" alt="{$length}">
								<img src="{$chart2[0].head_photo}" alt="portrait" />
								<div class="card-info">
								<span class="colleges"  data-order="4">{$chart2[0].college}</span>									
									<div class="tuhao-name"><span role='name'><a href="guest.php?id={$chart2[0].id}">{$chart2[0].username}</a></span><span role="level">LV{$chart2[0].levell}</span></div>
									<div class="sending">
										<span role="sent">已送出：{$chart2[0].sendNum}</span>
										<span role="received">已收到：{$chart.receiveNum}</span>
									</div>
									<div class="nothing"></div>
								</div>
							</div>
						</div>
					</div>
					<i class="right-arrow" id="next"><a href="javascript:;"  class="logo-right-arrow"></a></i>
				</div>
			</div>
			<p>TOP 18: <i class="logo-toggle" id="top10-items" data-tooltip="详细"></i></p>
			<div class="content top10">
				<ul class="top10-lists">
				{foreach $chart3 as $chart}
					<li>
						<div class="detail">
							<div class="thumbnail" index="{$chart@iteration}">
								<span>{$chart.college}</span>
								<span>{$chart.username}</span>
								<div class="nothing"></div>
								<span class="orders">TOP {$chart@iteration + 8}</span><span role="score">积分: {$chart.score}</span>
							</div>
							<img src="{$chart.head_photo}" />
						</div>
					</li>
					{/foreach}
				</ul>
				<div class="detail-info detail-info-top10" id="container-top10">
					<i class="left-arrow" id="prev-top10"><a href="javascript:;"  class="logo-left-arrow"></a></i>
					<div class="chart-info">
						<div class="box" id="list-top10" role="container" style="left:-667px">
						<div class="card" alt="1" >
								<img src="{$chart3[9].head_photo}" alt="portrait" />
								<div class="card-info">
								<span class="colleges" data-order="18">{$chart3[9].college}</span>									
									<div class="tuhao-name"><span role='name'><a href="guest.php?id={$chart3[9].id}">{$chart3[9].username}</a></span><span role="level">LV{$chart3[9].levell}</span></div>
									<div class="sending">
										<span role="sent">已送出：{$chart.sendNum}</span>
										<span role="received">已收到：{$chart.receiveNum}</span>
									</div>
									<div class="nothing"></div>
								</div>
							</div>
							{foreach $chart3 as $chart}
							<div class="card" alt="{$chart@iteration}">
								<img src="{$chart.head_photo}" alt="portrait" />
								<div class="card-info">
								<span class="colleges" data-order="{$chart@iteration + 8}">{$chart.college}</span>								
									<div class="tuhao-name"><span role='name'><a href="guest.php?id={$chart.id}">{$chart.username}</a></span><span role="level">LV{$chart.levell}</span></div>
									<div class="sending">
										<span role="sent">已送出：{$chart.sendNum}</span>
										<span role="received">已收到：{$chart.receiveNum}</span>
									</div>
									<div class="nothing"></div>
								</div>
							</div>
							{/foreach}
							<div class="card" alt="5">
								<img src="{$chart3[0].head_photo}" alt="portrait" />
								<div class="card-info">
								<span class="colleges" data-order="9">{$chart3[0].college}</span>									
									<div class="tuhao-name"><span role='name'><a href="guest.php?id={$chart3[0].id}">{$chart3[0].username}</a></span><span role="level">LV{$chart3[0].levell}</span></div>
									<div class="sending">
										<span role="sent">已送出：{$chart3[0].sendNum}</span>
										<span role="received">已收到：{$chart3[0].receiveNum}</span>
									</div>
									<div class="nothing"></div>
								</div>
							</div>
						</div>
					</div>
					<i class="right-arrow" id="next-top10"><a href="javascript:;"  class="logo-right-arrow"></a></i>
				</div>
			</div>
		</article>		
		{include 'content/modals.tpl'}
		{include 'content/footer.tpl'}
		<script type="text/javascript" src="./scripts/lib/jQuery.js"></script>
		<script type="text/javascript" src="./scripts/lib/jquery.simplemodal.js"></script>
		<script type="text/javascript" src="./scripts/lib/sea.js"></script>
		<script type="text/javascript" src="./scripts/tuhao-chart.js"></script>
		<script type="text/javascript">
			seajs.use('/scripts/header')
		</script>
	</body>
</html>
