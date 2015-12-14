<nav class="navigation">
	<ul class="nav-lists">
		<li>
			<a href="cate.php?cate=双11专区"><i>双11专区</i></a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=11.11"><li>双11专区</li></a>
				</ul>
				<div class="nav-content">
				{foreach $activity as $item}
				<div>
					<a href="detail.php?pro_id={$item.id}">
						<div class="thumbnail">
							<img src="{$item.src}" />
						</div>
						<h3>{$item.pro_name}</h3>
						<p>{$item.username} {$item.college}</p>
					</a>
				</div>
				{/foreach}
				</div>
			</article>
		</li>
		<li>
			<a href="cate.php?cate=学习用品">学习用品</a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=课内教材"><li>课内教材</li></a>
					<a href="cate.php?cate=文具"><li>文具</li></a>
					<a href="cate.php?cate=出国书籍"><li>出国书籍</li></a>
					<a href="cate.php?cate=课外书籍"><li>课外书籍</li></a>
				</ul>
				<div class="nav-content">
				{foreach $study as $item}
				<div>
					<a href="detail.php?pro_id={$item.id}">
						<div class="thumbnail">
							<img src="{$item.src}" />
						</div>
						<h3>{$item.pro_name}</h3>
						<p>{$item.username} {$item.college}</p>
					</a>
				</div>
				{/foreach}
				</div>
			</article>
		</li>
		<li>
			<a href="cate.php?cate=衣服配饰">衣服配饰</a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=男装"><li>男装</li></a>
					<a href="cate.php?cate=女装"><li>女装</li></a>
					<a href="cate.php?cate=手表鞋袋"><li>手表鞋袋</li></a>
					<a href="cate.php?cate=配饰"><li>配饰</li></a>
				</ul>
				<div class="nav-content">
					{foreach $clothes as $item}
					<div>
						<a href="detail.php?pro_id={$item.id}">
							<div class="thumbnail">
								<img src="{$item.src}" />
							</div>
							<h3>{$item.pro_name}</h3>
							<p>{$item.username} {$item.college}</p>
						</a>
					</div>
					{/foreach}
				</div>
			</article>
		</li>
		<li>
			<a href="cate.php?cate=数码产品">数码产品</a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=键盘鼠标"><li>键盘鼠标</li></a>
					<a href="cate.php?cate=移动电源"><li>移动电源</li></a>
					<a href="cate.php?cate=充电器"><li>充电器</li></a>
					<a href="cate.php?cate=耳机"><li>耳机</li></a>
				</ul>
				<div class="nav-content">
					{foreach $digital as $item}
					<div>
						<a href="detail.php?pro_id={$item.id}">
							<div class="thumbnail">
								<img src="{$item.src}" />
							</div>
							<h3>{$item.pro_name}</h3>
							<p>{$item.username} {$item.college}</p>
						</a>
					</div>
					{/foreach}
				</div>
			</article>
		</li>
		<li>
			<a href="cate.php?cate=生活娱乐">生活娱乐</a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=乐器"><li>乐器</li></a>
					<a href="cate.php?cate=棋牌"><li>棋牌</li></a>
					<a href="cate.php?cate=会员卡"><li>会员卡</li></a>
					<a href="cate.php?cate=化妆品"><li>化妆品</li></a>
				</ul>
				<div class="nav-content">
					{foreach $entertainment as $item}
					<div>
						<a href="detail.php?pro_id={$item.id}">
							<div class="thumbnail">
								<img src="{$item.src}" />
							</div>
							<h3>{$item.pro_name}</h3>
							<p>{$item.username} {$item.college}</p>
						</a>
					</div>
					{/foreach}
				</div>
			</article>
		</li>
		<li>
			<a href="cate.php?cate=其他">其他</a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=其他"><li>其他</li></a>
				</ul>
				<div class="nav-content">
					{foreach $others as $item}
					<div>
						<a href="detail.php?pro_id={$item.id}">
							<div class="thumbnail">
								<img src="{$item.src}" />
							</div>
							<h3>{$item.pro_name}</h3>
							<p>{$item.username} {$item.college}</p>
						</a>
					</div>
					{/foreach}
				</div>
			</article>
		</li>
	</ul>
</nav>
