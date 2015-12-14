<!DOCTYPE html>
<html lang="zh-cmn-Hans">
	<head>
		{include 'content/title.tpl'}
		<link rel="stylesheet" type="text/css" href="styles/homepage.css" />
		<link rel="stylesheet" type="text/css" href="styles/pages.css">
		<link rel="stylesheet" type="text/css" href="styles/article-show.css">
		<link rel="stylesheet" type="text/css" href="styles/mes.css"/>
	</head>
	<body>
		<header>
			{include 'content/header.tpl' username=$username loginFlag=$loginFlag sentNum=$sentNum mesNum=$mesNum}
			<div class="doodle">
				{include 'content/nav.tpl' activity=$activity  study=$study clothes=$clothes digital=$digital transportation=$transportation entertainment=$entertainment others=$others}
			</div>
		</header>
		<section class="article-show-main">
			<section class="article-show-area">
			{if $loginFlag == $goods.user_id}
				{if ! $goods.receiver_id }
				<a href="javascript:;" id="edit-goods"></a>
				{/if}
			{/if}
				<section class="article-photo">
					<img src="{$goods.src[0]}">
					<section class="article-photo-frame">
						<!-- <a href="javascript:void(0)" class="article-photo-switch photo-switch-left">
							<img src="images/logo/left-arrow.png">
						</a> -->
						<section class="article-photo-gallery">
							<ul class="article-photo-list">
								{foreach $goods.src as $src}
									<li><img src="{$src}" alt=""></li>
								{/foreach}
							</ul>
						</section>
						<!-- <a href="javascript:void(0)" class="article-photo-switch photo-switch-right">
							<img src="images/logo/right-arrow.png">
						</a> -->
					</section>
				</section>
				<seciton class="article-info">
					<h2 id="goods" data-id="{$goods.id}" data-receiver="{$goods.receiver_id}">{$goods.pro_name}{if $goods.receiver_id}【已送出】{/if}</h2>
					<p>
						<span class="article-title">主　　人:</span>
						<span class="article-master" data-id="{$goods.user_id}"><a class="username" href="guest.php?id={$goods.user_id}">{$goods.username}</a></span>
					</p>
					<p>
						<span class="article-title">联系方式:</span>
						<span class="article-master">{$goods.contact}</span>
					</p>
					<p>
						<span class="article-title">发布时间:</span>
						<span class="article-master">{$goods.reg_time}</span>
					</p>
					<p>
						<span class="article-title">物品详情:</span>
						<span class="article-master article-detailed">{$goods.pro_desc}</span>
					</p>
				</seciton>
			</section>
			<section class="master-desire-area">
				<span class="article-info-title">主人心愿</span>
				<p class="article-master-desire">{$goods.desire}</p>
			</section>
			<section class="article-comment-area">
				<span class="article-info-title">累计评论</span>
				{if $data|@count == 0}
				<div class="empty-reply">还没有人留言哦，快来评论为主人实现愿望拿到闲置~</div>
				{/if}
				<section class="article-comment-frame cmt">
					<div class="comment-content-area" contenteditable="true">
						<br />
					</div>
					<a href="javascript:void(0)" id="comment-submit" class="comment-submit-button">评&nbsp;论</a>
				</section>
				<div class="cmtWrapper">
					{foreach $data as $item}
					<section class="user-comment-outer">
						<div class="user-potrait">
							<a href="guest.php?id={$item.sender_id}">
								<img src="{$item.src}">
							</a>
						</div>
						<div class="user-comment-area">
							<div class="wrapper">
								<p class="user-name" data-id="{$item.sender_id}">
									<a href="guest.php?id={$item.sender_id}">{$item.sender_author}</a> 
								{if $item.receiver_id}
									回复
									<a href="guest.php?id={$item.receiver_id}">{$item.receiver_author}</a>
								{/if}
									： 
								</p>
								<div class="user-comment-content" data-id="{$item.id}" data-parent="{$item.parent_id}">{$item.content}</div>
								<div class="comment-button-list">
									{if $loginFlag}
									{if $loginFlag == $goods.user_id}
										{if $goods.receiver_id == 0}
											{if $item.sender_id != $goods.user_id}
									<a href="javascript:void(0)" class="confirm-button comment-button" data-id="{$item.sender_id}"></a>
											{/if}
										{elseif $goods.receiver_id == $item.sender_id}
									<a href="javascript:void(0)" class="success comment-button"></a>
										{/if}
									{/if}
									{/if}
									{if $loginFlag == $item.sender_id}
									<a href="javascript:;" class="comment-button delete-comment" data-id="{$item.id}"></a>
									{/if}
									<a href="javascript:void(0)" class="reply-button comment-button"></a>
								</div>
								<section class="article-comment-frame">
									<div class="comment-content-area" contenteditable="true"><br /></div>
									<a href="javascript:void(0)" class="comment-submit-button">回&nbsp;复</a>
								</section>
							</div>
							{foreach $item.comments as $inner}
							<section class="user-comment-inner">
								<div class="user-potrait">
									<img src="{$inner.src}">
								</div>
								<div class="user-comment-area">
									<div class="wrapper">
										<p class="user-name" data-id="{$inner.sender_id}">{$inner.sender_author} 回复{$inner.receiver_author}： </p>
										<div class="user-comment-content" data-id="{$inner.id}" data-parent="{$inner.parent_id}">{$inner.content}</div>
										<div class="comment-button-list">
                                        {if $loginFlag == $item.sender_id}
										<a href="javascript:;" class="comment-button delete-comment" data-id="{$inner.id}"></a>
										{/if}
											<a href="javascript:void(0)" class="reply-button comment-button"></a>
										</div>
										<section class="article-comment-frame">
											<div class="comment-content-area" contenteditable="true"><br /></div>
											<a href="javascript:void(0)" class="comment-submit-button">回&nbsp;复</a>
										</section>
									</div>
								</div>
							</section>
							{/foreach}
						</div>
					</section>
					{/foreach}
				</div>
				<section class="comment-footer">
					{include 'content/pages.tpl' max=$max}
				</section>
			</section>
		</section>
		<div id="mes">提交失败，为什么会这样呢，为什么呢，这是为什么呢？</div>
		{include 'content/modals.tpl'}
		{include 'content/footer.tpl'}
		<script src="scripts/lib/jQuery.js" type="text/javascript" charset="utf-8"></script>
		<script src="scripts/lib/sea.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="./scripts/lib/jquery.simplemodal.js"></script>
        <script type="text/javascript">
        	seajs.use(['/scripts/goods','/scripts/header']);
        </script>
	</body>
</html>
