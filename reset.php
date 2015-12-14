<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/9/15
 * Time: 17:34
 */

require_once('include.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';

if($action == 'forget'){
    $smarty->display("forgot-password.tpl");
}elseif($action == 'reset'){
    $uid = isset($_GET['udi']) ? $_GET['udi'] : 'string';
    $uid = addslashes($uid);
    $sql = "select * from tuhao_user where reset_token='{$uid}'";
    $data = fetchOne($sql);
    if($data){
        $smarty->display("reset-ps.tpl");
    }else{
        echo "链接无效";
    }
}elseif($action == 'email-ok'){
    $smarty->display("email-ok.tpl");  //提醒注册之后发邮件
}elseif($action == 'register-ok'){
    $smarty->display("confirm.tpl");  //提醒注册之后发邮件
}elseif($action == 'active-ok'){
    $smarty->display("active-ok.tpl");   //账户激活成功提示
}elseif($action == 'active-fail'){
    $smarty->display("active-fail.tpl");   //账户激活失败提示
}elseif($action == 'remind'){
    $smarty->display("remind-email.tpl");   //未激活直接登陆
}elseif($action == 'password-ok'){
    $smarty->display("password-ok.tpl");   //密码重置成功的提示并跳转
}

