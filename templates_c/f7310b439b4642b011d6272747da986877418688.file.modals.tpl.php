<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-11-28 17:32:08
         compiled from ".\templates\content\modals.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17580565974985d1ef4-62582473%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7310b439b4642b011d6272747da986877418688' => 
    array (
      0 => '.\\templates\\content\\modals.tpl',
      1 => 1447853434,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17580565974985d1ef4-62582473',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_565974985f19d2_69834025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565974985f19d2_69834025')) {function content_565974985f19d2_69834025($_smarty_tpl) {?><!-- 登录模态窗 -->
<div class="login-modal" id="login">
	<!-- <i class="simplemodal-close logo-close-btn"></i> -->
	<div class="modal-title">
		<span></span>
		<h3>LOG IN</h3>
		<span></span>
	</div>
	<ul>
		<li role="input">
			<input type="text" role="email" placeholder="邮 箱">
		</li>
		<span></span>
		<li role="input">
			<input type="password" role="password" placeholder="密 码">
		</li>
		<span></span>
		<li role="input">
			<button name="submit">登 录</button>
		</li>
		<p>
		<img class="login-loading" src="images/loading.gif">
			<a href="#" class="forgetps-btn">忘记密码？</a></p>
	</ul>
	<div class="for-signin"><a href="#" id="for-signin">马上注册</a></div>
</div>
<!-- 登录模态窗 -->
<!-- 注册模态窗 -->
<div class="signin-modal" id="signin">
	<!-- <i class="simplemodal-close logo-close-btn"></i> -->
	<div class="modal-title">
		<span></span>
		<h3>SIGN IN</h3>
		<span></span>
	</div>
	<ul>
		<li role="input">
			<input type="text" role="nickname" name="nickname" placeholder="昵 称">
		</li>
		<span></span>
		<li role="input">
			<input type="text" role="email" name="email" placeholder="邮 箱">
		</li>
		<span></span>
		<li role="input">
			<input type="password" role="password" name="password" placeholder="密 码">
		</li>
		<span></span>
		<li role="input">
			<input type="password" role="confirm" name="confirm" placeholder="确 认 密 码">
		</li>
		<span></span>
		<li>
			<button class="submit-btn" name="submit">注 册</button>
		</li>
		<!-- <p><input type="checkbox" id="agree"><label for="agree">同意</label><a href="javascript:void(0)" class="agreement">《用户协议》</a></p>	 -->
	</ul>
	<div class="for-login"><a href="#" id="for-login">马上登录</a></div>
</div>
<!-- 注册模态窗 -->
<!-- 个人信息框 -->
<div class="info-modal" id="info">
	<div class="modal-title">
		<span></span>
		<h3>PERSONAL</h3>
		<span></span>
	</div>
	<ul>
		<li role="input">
			<div class="select" id="sex" role="sex" name="sex" value="">
				<span class="select-value">性  别</span> 
				<span class="down-arrow"></span>
			</div>
			<ul class="select-content" data-range="info" id="sex-content">
				<li>男</li>
				<li>女</li>
			</ul>
		</li>
		<span></span>
		<li role="input" id="limit-college">
			<div class="select" id="college-btn" role="college" name="college" value="">
				<span class="select-value">院  系</span>	
				<span class="down-arrow"></span>
			</div>
			<ul class="select-content" data-range="info" id="colleges">
				<li>++content++</li>
			</ul>
		</li>
		<span></span>
		<li role="input">
			<input type="text" role="enroll-year" name="enroll-year" placeholder="入 学 年 份">
		</li>
		<span></span>
		<li role="input">
			<div class="select" id="address" role="address" name="adress" value="">
				<span class="select-value">住 址</span>	
				<span class="down-arrow"></span>
			</div>
			<ul class="select-content" data-range="info" id="address_ul">
				<li>韵苑</li>
				<li>紫菘</li>
				<li>沁苑</li>
				<li>西区</li>
			</ul>
		</li>
		<span></span>
		<li>
			<button name="submit">完 成</button>
			<img class="loading" src="images/loading.gif">
		</li>
	</ul>
</div>
<!-- 个人信息框 --><?php }} ?>
