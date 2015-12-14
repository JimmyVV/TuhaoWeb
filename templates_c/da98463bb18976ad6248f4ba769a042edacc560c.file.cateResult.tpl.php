<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:35:12
         compiled from ".\templates\content\cateResult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3104856597550a64916-91537185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da98463bb18976ad6248f4ba769a042edacc560c' => 
    array (
      0 => '.\\templates\\content\\cateResult.tpl',
      1 => 1447807849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3104856597550a64916-91537185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'key' => 0,
    'goods' => 0,
    'item' => 0,
    'max' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56597550b72777_09888550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597550b72777_09888550')) {function content_56597550b72777_09888550($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\xampp\\htdocs\\Tuhao\\Smarty\\libs\\plugins\\modifier.date_format.php';
?><article class="result">
	<header> 
		<h2 data-key="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
:</h2>
	</header>
	<ul class="list">
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<li>
			<div class="imgWrapper">
				<a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['src'];?>
"/>
				</a>
			</div>
			<div class="textWrapper">
				<div class="goodsName"><a href="detail.php?pro_id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_name'];?>
</a></div>
				<div class="des"><?php echo $_smarty_tpl->tpl_vars['item']->value['pro_desc'];?>
</div>
				<div class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['item']->value['reg_time'],"%Y-%m-%d");?>
</div>
			</div>
		</li>
		<?php }
if (!$_smarty_tpl->tpl_vars['item']->_loop) {
?>
		<li class="info">这里还什么都没有，去搜搜其他的？</li>
		<?php } ?>
		<li class="fixed"></li>
		<li class="fixed"></li>
		<li class="fixed"></li>
	</ul>
	<?php echo $_smarty_tpl->getSubTemplate ('content/pages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('max'=>$_smarty_tpl->tpl_vars['max']->value), 0);?>

</article><?php }} ?>
