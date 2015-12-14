<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:35:12
         compiled from ".\templates\content\pages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1737756597550bab9c0-90030934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14ca943051555e6d25779068e86d442f6db2befd' => 
    array (
      0 => '.\\templates\\content\\pages.tpl',
      1 => 1447082270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1737756597550bab9c0-90030934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'max' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_56597550bfe4a2_69083325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597550bfe4a2_69083325')) {function content_56597550bfe4a2_69083325($_smarty_tpl) {?><div class="pages">
	<ol>
		<li data-num="-1" ><a href="javascript:void(0);">&lt;</a></li>
		<li data-num="1" class="active"><a href="javascript:void(0);">1</a></li>
		<?php if ($_smarty_tpl->tpl_vars['max']->value<=7) {?>
			<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['max']->value+1 - (2) : 2-($_smarty_tpl->tpl_vars['max']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 2, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
				<li data-num="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</a></li>
			<?php }} ?>
		<?php } else { ?>
			<?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int) ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 5+1 - (2) : 2-(5)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0) {
for ($_smarty_tpl->tpl_vars['foo']->value = 2, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++) {
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
				<li data-num="<?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</a></li>
			<?php }} ?>
			<li data-num="-3"><a href="javascript:void(0);">···</a></li>
			<li data-num="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
"><a href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['max']->value;?>
</a></li>
		<?php }?>
		<li data-num="-2"><a href="javascript:void(0);">&gt;</a></li>
	</ol>
</div><?php }} ?>
