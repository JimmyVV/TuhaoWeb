<article class="result">
	<header> 
		<h2 data-key="{$key}">{$key}:</h2>
	</header>
	<ul class="list">
		{foreach $goods as $item}
		<li>
			<div class="imgWrapper">
				<a href="detail.php?pro_id={$item.id}">
					<img src="{$item.src}"/>
				</a>
			</div>
			<div class="textWrapper">
				<div class="goodsName"><a href="detail.php?pro_id={$item.id}">{$item.pro_name}</a></div>
				<div class="des">{$item.pro_desc}</div>
				<div class="time">{$item.reg_time|date_format:"%Y-%m-%d"}</div>
			</div>
		</li>
		{foreachelse}
		<li class="info">这里还什么都没有，去搜搜其他的？</li>
		{/foreach}
		<li class="fixed"></li>
		<li class="fixed"></li>
		<li class="fixed"></li>
	</ul>
	{include 'content/pages.tpl' max=$max}
</article>