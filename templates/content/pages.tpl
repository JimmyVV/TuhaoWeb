<div class="pages">
	<ol>
		<li data-num="-1" ><a href="javascript:void(0);">&lt;</a></li>
		<li data-num="1" class="active"><a href="javascript:void(0);">1</a></li>
		{if $max <= 7}
			{for  $foo=2 to $max}
				<li data-num="{$foo}"><a href="javascript:void(0);">{$foo}</a></li>
			{/for}
		{else}
			{for  $foo=2 to 5}
				<li data-num="{$foo}"><a href="javascript:void(0);">{$foo}</a></li>
			{/for}
			<li data-num="-3"><a href="javascript:void(0);">···</a></li>
			<li data-num="{$max}"><a href="javascript:void(0);">{$max}</a></li>
		{/if}
		<li data-num="-2"><a href="javascript:void(0);">&gt;</a></li>
	</ol>
</div>