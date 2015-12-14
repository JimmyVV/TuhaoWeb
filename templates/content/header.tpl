<div class="self-info">
	<ul class="item1">
		<li role="release"><a href="javascript:void(0)">我要发布</a></li>
		<li role="sending"><a href="{if $loginFlag }personal.php?type=goods{else}javascript:void(0){/if}">我的送送{if $sentNum} ({$sentNum}){/if}</a><i class="logo-down-arrow"></i>
			<ul class="sending-table" id="sending-table" data-toggle="mysending">
				<li><a href="personal.php?type=sending">出送中</a></li>
				<li><a href="personal.php?type=info">新留言{if $mesNum} ({$mesNum}){/if}</a></li>
			</ul>
		</li>
		<li role="self-info-btn">
			<span id="username" >{if $loginFlag} <a href="personal.php">{$username}</a>{/if}</span>
			<i class="logo-self-info{if $loginFlag} after-log{/if}" role="login" data-log="{$loginFlag}" data-tooltip="登录"></i>
			<ul class="logout">
				<li><a href="doAction.php?action=logout">退出登录</a></li>
			</ul>
		</li>
	</ul>
</div>
<div class="banner">
	<div class="item2">
		<a href="/" class="logo">
		</a>
		<div class="search">
			<input type="search" id="search" placeholder="想要什么搜起来~"><i class="logo-search"></i>
		</div>
	</div>
</div>
