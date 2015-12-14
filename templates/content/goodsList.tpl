<div class="list">
	<header>
		<ul class="goods">
			<li><a class="active" href="javascript:void(0);" data-tab="1">我送出的{if $sentNum } ({$sentNum}) {/if}</a></li>
			<li><a href="javascript:void(0);" data-tab="2">我收到的</a></li>
			<li><a href="javascript:void(0);" data-tab="3">正在送出的</a></li>
		</ul>
		<ul class="mes" style="display: none;">
			<li><a class="" href="javascript:void(0);" data-tab="4">我收到的留言</a></li>
		</ul>
	</header>
	<ul>
		{foreach $data as $item}
		<li class="item">
			<div class="goodsName" data-id="{$item.pro_id}">{$item.goods_name}</div>
			<div class="wrapper">
				<div class="text">
				{if $item.status}
					<a href="detail.php?pro_id={$item.pro_id}">我送给了{$item.receiver_author}，收获了他给我的10分！</a>
				{else}
					<a href="detail.php?pro_id={$item.pro_id}">我送给了{$item.receiver_author}，正在等待他确认收到哦！</a>
				{/if}
				</div>
				<!--<a href="javascript:void(0);" class="btn">确认</a>-->
			</div>
			<a href="detail.php?pro_id={$item.pro_id}"><img src="{$item.src}"/></a>
		</li>
		{foreachelse}
		<li class="item" style="text-align: center;">还没有送出任何的闲置呢~</li>
		{/foreach}
	</ul>
	{include 'content/pages.tpl' max=$max}
</div>