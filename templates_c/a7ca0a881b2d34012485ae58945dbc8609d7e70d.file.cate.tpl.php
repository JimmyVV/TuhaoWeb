<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:35:12
         compiled from ".\templates\cate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2028256597550920226-94154733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7ca0a881b2d34012485ae58945dbc8609d7e70d' => 
    array (
      0 => '.\\templates\\cate.tpl',
      1 => 1447807849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2028256597550920226-94154733',
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
    'key' => 0,
    'goods' => 0,
    'max' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_565975509ef2b1_25443693',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565975509ef2b1_25443693')) {function content_565975509ef2b1_25443693($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('content/title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<link rel="stylesheet" type="text/css" href="styles/homepage.css" />
		<link rel="stylesheet" type="text/css" href="styles/search.css"/>
		<link rel="stylesheet" type="text/css" href="styles/mes.css"/>
	</head>
	<body>
		<header>
			<?php echo $_smarty_tpl->getSubTemplate ('content/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('username'=>$_smarty_tpl->tpl_vars['username']->value,'loginFlag'=>$_smarty_tpl->tpl_vars['loginFlag']->value,'sentNum'=>$_smarty_tpl->tpl_vars['sentNum']->value,'mesNum'=>$_smarty_tpl->tpl_vars['mesNum']->value), 0);?>

			<div class="doodle">
				<?php echo $_smarty_tpl->getSubTemplate ('content/nav.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('activity'=>$_smarty_tpl->tpl_vars['activity']->value,'study'=>$_smarty_tpl->tpl_vars['study']->value,'clothes'=>$_smarty_tpl->tpl_vars['clothes']->value,'digital'=>$_smarty_tpl->tpl_vars['digital']->value,'transportation'=>$_smarty_tpl->tpl_vars['transportation']->value,'entertainment'=>$_smarty_tpl->tpl_vars['entertainment']->value,'others'=>$_smarty_tpl->tpl_vars['others']->value), 0);?>

			</div>
		</header>
		<?php echo $_smarty_tpl->getSubTemplate ('content/cateResult.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('key'=>$_smarty_tpl->tpl_vars['key']->value,'goods'=>$_smarty_tpl->tpl_vars['goods']->value,'max'=>$_smarty_tpl->tpl_vars['max']->value), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('content/modals.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('content/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<script type="text/javascript" src="scripts/lib/jQuery.js"></script>
		<script type="text/javascript" src="scripts/lib/jquery.simplemodal.js"></script>
		<script src="scripts/lib/sea.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			seajs.use(['/scripts/cate','/scripts/header']);
		</script>
	</body>
</html>
<?php }} ?>
