<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:32:08
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8320565974980cd996-95285228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71765f2f403811ac5af3454d4083e6bfc6dc5e21' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1448110644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8320565974980cd996-95285228',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
    'loginFlag' => 0,
    'sentNum' => 0,
    'mesNum' => 0,
    'activity' => 0,
    'study' => 0,
    'clothes' => 0,
    'digital' => 0,
    'transportation' => 0,
    'entertainment' => 0,
    'others' => 0,
    'hotGoods1' => 0,
    'recommend' => 0,
    'var' => 0,
    'newGoods' => 0,
    'chart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5659749835f3c0_32093761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5659749835f3c0_32093761')) {function content_5659749835f3c0_32093761($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('content/title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<!--[if lte IE 9]>
   			<link rel="stylesheet" href="../styles/browser.css" />
		 <![endif]-->
		<link rel="stylesheet" type="text/css" href="./styles/homepage.css" />
		<link rel="stylesheet" type="text/css" href="./styles/banner-switch.css">		
	</head>
	<body>
		<header>
		<?php echo $_smarty_tpl->getSubTemplate ('content/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('username'=>$_smarty_tpl->tpl_vars['username']->value,'loginFlag'=>$_smarty_tpl->tpl_vars['loginFlag']->value,'sentNum'=>$_smarty_tpl->tpl_vars['sentNum']->value,'mesNum'=>$_smarty_tpl->tpl_vars['mesNum']->value), 0);?>

		 <div class="doodle">		
				<?php echo $_smarty_tpl->getSubTemplate ('content/nav_1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('activity'=>$_smarty_tpl->tpl_vars['activity']->value,'study'=>$_smarty_tpl->tpl_vars['study']->value,'clothes'=>$_smarty_tpl->tpl_vars['clothes']->value,'digital'=>$_smarty_tpl->tpl_vars['digital']->value,'transportation'=>$_smarty_tpl->tpl_vars['transportation']->value,'entertainment'=>$_smarty_tpl->tpl_vars['entertainment']->value,'others'=>$_smarty_tpl->tpl_vars['others']->value), 0);?>
		
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
				<?php  $_smarty_tpl->tpl_vars['recommend'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['recommend']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotGoods1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['recommend']->key => $_smarty_tpl->tpl_vars['recommend']->value) {
$_smarty_tpl->tpl_vars['recommend']->_loop = true;
?>
					<li>
						<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['recommend']->value['id'];?>
">
							<div class="thumbnail">
								<img src="<?php echo $_smarty_tpl->tpl_vars['recommend']->value['src'];?>
" />
							</div>
							<p><?php echo $_smarty_tpl->tpl_vars['recommend']->value['pro_name'];?>
</p>
							<h3><?php echo $_smarty_tpl->tpl_vars['recommend']->value['username'];?>
  <?php echo $_smarty_tpl->tpl_vars['recommend']->value['college'];?>
</h3>
						</a>
					</li>
				<?php } ?>
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
					<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 3+1 - (0) : 0-(3)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
						<li>
							<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['newGoods']->value[$_smarty_tpl->tpl_vars['var']->value]['id'];?>
">
								<div class="thumbnail">
									<img src="<?php echo $_smarty_tpl->tpl_vars['newGoods']->value[$_smarty_tpl->tpl_vars['var']->value]['src'];?>
" />
								</div>
							</a>
							<div class="sticky-note">
								<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['newGoods']->value[$_smarty_tpl->tpl_vars['var']->value]['id'];?>
">ABOUT MORE</a>
								<p><?php echo $_smarty_tpl->tpl_vars['newGoods']->value[$_smarty_tpl->tpl_vars['var']->value]['pro_desc'];?>
</p>
								<span><?php echo $_smarty_tpl->tpl_vars['newGoods']->value[$_smarty_tpl->tpl_vars['var']->value]['college'];?>
 <?php echo $_smarty_tpl->tpl_vars['newGoods']->value[$_smarty_tpl->tpl_vars['var']->value]['username'];?>
</span>
							</div>
						</li>
						<?php }} ?>
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
								 <div class="container-img"><img src="<?php echo $_smarty_tpl->tpl_vars['chart']->value[0]['head_photo'];?>
" /></div>
									<div class="sticky">
										<span><?php echo $_smarty_tpl->tpl_vars['chart']->value[0]['college'];?>
</span>
										<span><?php echo $_smarty_tpl->tpl_vars['chart']->value[0]['username'];?>
</span>
									</div>
								</div>
								<?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 9+1 - (1) : 1-(9)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 1, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
								<?php if ($_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['var']->value]) {?>
								<li data-title="<?php echo $_smarty_tpl->tpl_vars['var']->value+1;?>
">
									<img src="<?php echo $_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['var']->value]['head_photo'];?>
" />
									<div class="detail">
										<span data-role="level">LV<?php echo $_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['var']->value]['levell'];?>
</span>
										<span data-role="name"><?php echo $_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['var']->value]['username'];?>
</span>
										<span data-role="college"><?php echo $_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['var']->value]['college'];?>
</span>
										<span data-role="score">积分: <?php echo $_smarty_tpl->tpl_vars['chart']->value[$_smarty_tpl->tpl_vars['var']->value]['score'];?>
</span>
									</div>
								</li>
								<?php }?>
								<?php }} ?>
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
		<?php echo $_smarty_tpl->getSubTemplate ('content/modals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('content/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
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
<?php }} ?>
