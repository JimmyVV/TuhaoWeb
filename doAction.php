<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/17
 * Time: 18:34
 */

require_once('include.php');

$action = $_GET['action'];
if($action == 'registerName'){
    $message = registerName();
    echo $message;
}elseif($action == 'registerEmail'){
    $message = registerEmail();
    echo $message;
}elseif($action == 'registerPwd'){
    $message = registerPwd();
    echo $message;
}elseif($action == 'confirmPwd'){
    $message = confirmPwd();
    echo $message;
}else{
}

if($action == 'register'){
    echo register();
}

if($action == 'issue'){
    echo issue();
}

if($action == 'userInfo'){
    echo userInfo();
}

if($action == 'login'){
    echo login();
}

if($action == 'logout'){
    logout();
}

if($action == 'active'){
    echo active();
}

if($action == 'forget'){
    $toMail = $_POST['email'];
    echo forgetPwd($toMail);
}

if($action == 'reset'){
    echo resetPwd();
}