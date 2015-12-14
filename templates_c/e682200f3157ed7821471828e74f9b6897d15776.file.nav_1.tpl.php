<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:32:08
         compiled from ".\templates\content\nav_1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8799565974984b14b7-08264472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e682200f3157ed7821471828e74f9b6897d15776' => 
    array (
      0 => '.\\templates\\content\\nav_1.tpl',
      1 => 1447410136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8799565974984b14b7-08264472',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activity' => 0,
    'item' => 0,
    'study' => 0,
    'clothes' => 0,
    'digital' => 0,
    'entertainment' => 0,
    'others' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56597498574fd7_01392632',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597498574fd7_01392632')) {function content_56597498574fd7_01392632($_smarty_tpl) {?><nav class="navigation">
	<ul class="nav-lists">
		<li>
			<a href="cate.php?cate=双11专区"><i>双11专区</i></a>
			<article>
				<span class="progress-bar"></span>
				<ul class="aside-nav">
					<a href="cate.php?cate=11.11"><li>双11专区</li></a>
				</ul>
				<div class="nav-content">
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activity']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<div>
					<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<div class="thumbnail">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
" />
						</div>
						<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</h3>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['college'];?>
</p>
					</a>
				</div>
				<?php } ?>
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
				<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['study']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
				<div>
					<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<div class="thumbnail">
							<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
" />
						</div>
						<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</h3>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['college'];?>
</p>
					</a>
				</div>
				<?php } ?>
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
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clothes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<div>
						<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<div class="thumbnail">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
" />
							</div>
							<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['college'];?>
</p>
						</a>
					</div>
					<?php } ?>
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
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['digital']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<div>
						<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<div class="thumbnail">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
" />
							</div>
							<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['college'];?>
</p>
						</a>
					</div>
					<?php } ?>
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
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['entertainment']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<div>
						<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<div class="thumbnail">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
" />
							</div>
							<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['college'];?>
</p>
						</a>
					</div>
					<?php } ?>
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
					<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['others']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
					<div>
						<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
							<div class="thumbnail">
								<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
" />
							</div>
							<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</h3>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['username'];?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value['college'];?>
</p>
						</a>
					</div>
					<?php } ?>
				</div>
			</article>
		</li>
	</ul>
</nav>
<?php }} ?>
