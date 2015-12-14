<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/15
 * Time: 16:26
 */
require_once('include.php');

$hotGoods1 = hotGoods(0,9);
$hotGoods2 = hotGoods(9,3);
$newGoods = newGoods(0,4);
$chart = tuhaoChart(0,10);
$study = catePro('学习用品');
$clothes = catePro('衣服配饰');
$digital = catePro('数码产品');
$transportation = catePro('交通工具');
$entertainment  = catePro('生活娱乐');
$others  = catePro('其他');
$activity = catePro('双11专区');

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $loginFlag = $_SESSION['id'];
}elseif(autoLogin()){
    $_COOKIE['autoToken'] = addslashes($_COOKIE['autoToken']);
    $sql = "select * from tuhao_user where auto_token='{$_COOKIE['autoToken']}'";
    $data = fetchOne($sql);
    $username = $data['username'];
    $loginFlag = $data['id'];
    $id = $data['id'];
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $username;
}else{
    $username = '';
    $loginFlag = 0;
    $id = 0;
}
$sql2 = "select * from tuhao_pro where username='{$username}' and is_send=1 and status =0";
$sentNum = getResultNum($sql2);
$sql3 = "select * from tuhao_comm where receiver_id={$id} and status = 0";
$mesNum = getResultNum($sql3);
$smarty->assign('username',$username);
$smarty->assign('study',$study);
$smarty->assign('clothes',$clothes );
$smarty->assign('digital',$digital );
$smarty->assign('transportation',$transportation);
$smarty->assign('entertainment',$entertainment);
$smarty->assign('others',$others);
$smarty->assign('activity',$activity);
$smarty->assign('loginFlag',$loginFlag);
$smarty->assign('hotGoods1',$hotGoods1);
$smarty->assign('hotGoods2',$hotGoods2);
$smarty->assign('newGoods',$newGoods);
$smarty->assign('chart',$chart);
$smarty->assign('sentNum',$sentNum);
$smarty->assign('mesNum',$mesNum);
$smarty->display("index.tpl");
