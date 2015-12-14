<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:32:08
         compiled from ".\templates\content\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273905659749845cd78-57906001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3a9e756ac52dac57cb82bbb6a18f38fce4230c0' => 
    array (
      0 => '.\\templates\\content\\header.tpl',
      1 => 1447807849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273905659749845cd78-57906001',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loginFlag' => 0,
    'sentNum' => 0,
    'mesNum' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_565974984a55a8_24323642',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565974984a55a8_24323642')) {function content_565974984a55a8_24323642($_smarty_tpl) {?><div class="self-info">
	<ul class="item1">
		<li role="release"><a href="javascript:void(0)">我要发布</a></li>
		<li role="sending"><a href="<?php if ($_smarty_tpl->tpl_vars['loginFlag']->value) {?>personal.php?type=goods<?php } else { ?>javascript:void(0)<?php }?>">我的送送<?php if ($_smarty_tpl->tpl_vars['sentNum']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['sentNum']->value;?>
)<?php }?></a><i class="logo-down-arrow"></i>
			<ul class="sending-table" id="sending-table" data-toggle="mysending">
				<li><a href="personal.php?type=sending">出送中</a></li>
				<li><a href="personal.php?type=info">新留言<?php if ($_smarty_tpl->tpl_vars['mesNum']->value) {?> (<?php echo $_smarty_tpl->tpl_vars['mesNum']->value;?>
)<?php }?></a></li>
			</ul>
		</li>
		<li role="self-info-btn">
			<span id="username" ><?php if ($_smarty_tpl->tpl_vars['loginFlag']->value) {?> <a href="personal.php"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a><?php }?></span>
			<i class="logo-self-info<?php if ($_smarty_tpl->tpl_vars['loginFlag']->value) {?> after-log<?php }?>" role="login" data-log="<?php echo $_smarty_tpl->tpl_vars['loginFlag']->value;?>
" data-tooltip="登录"></i>
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
<?php }} ?>
