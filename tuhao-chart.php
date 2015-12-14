<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/15
 * Time: 11:16
 */

require_once('include.php');

if ($type = $_GET['type']) {
    if ($type == 'week') {
        $type = '';
    } else {
        $type = 'total';
    }
} else {
    $type = 'total';
}

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $loginFlag = $_SESSION['id'];
    $id = $_SESSION['id'];
}elseif(autoLogin()){
    $sql = "select * from tuhao_user where auto_token='{$_COOKIE['autoToken']}'";
    $data = fetchOne($sql);
    $username = $data['username'];
    $loginFlag = $data['id'];
    $id = $data['id'];
}else{
    $username = '';
    $loginFlag = 0;
    $id = 0;
}

$sql2 = "select * from tuhao_pro where username='{$username}' and is_send=1 and status =0";
$sentNum = getResultNum($sql2);
$sql3 = "select * from tuhao_comm where receiver_id={$id} and status = 0";
$mesNum = getResultNum($sql3);

$study = catePro('学习用品');
$clothes = catePro('衣服配饰');
$digital = catePro('数码产品');
$transportation = catePro('交通工具');
$entertainment  = catePro('生活娱乐');
$others  = catePro('其他');
$activity = catePro('11.11');
$chart1 = tuhaoChart(0,3,$type);
$chart2 = tuhaoChart(3,5,$type);
$chart3 = tuhaoChart(8,10,$type);
$smarty->assign('username',$username);
$smarty->assign('study',$study);
$smarty->assign('clothes',$clothes );
$smarty->assign('digital',$digital );
$smarty->assign('transportation',$transportation);
$smarty->assign('entertainment',$entertainment);
$smarty->assign('others',$others);
$smarty->assign('loginFlag',$loginFlag);
$smarty->assign('chart1',$chart1);
$smarty->assign('chart2',$chart2);
$smarty->assign('chart3',$chart3);
$smarty->assign('sentNum',$sentNum);
$smarty->assign('mesNum',$mesNum);
$smarty->display("tuhao-chart.tpl");