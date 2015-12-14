<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/3
 * Time: 10:04
 */

require_once('include.php');

$type = isset($_GET['type']) ? $_GET['type'] : 'goods';
$study = catePro('学习用品');
$clothes = catePro('衣服配饰');
$digital = catePro('数码产品');
$transportation = catePro('交通工具');
$entertainment  = catePro('生活娱乐');
$others  = catePro('其他');
$activity = catePro('11.11');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
    $loginFlag = isset($_SESSION['id']) ? $_SESSION['id'] : 0;
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
$pageSize = 8;

$data = sending($id,$pageSize,'');
$goods = 3;
$username1 = fetchOne("select username from tuhao_user where id={$id}");
$sql1 = "select * from tuhao_pro where username='{$username1['username']}' and receiver is null order by reg_time desc ";
$numRows = getResultNum($sql1);
$totalPage = ceil($numRows/$pageSize);

$sql2 = "select * from tuhao_pro where username='{$username}' and is_send=1 and status =0";
$sentNum = getResultNum($sql2);
$sql3 = "select * from tuhao_comm where receiver_id={$id} and status = 0";
$mesNum = getResultNum($sql3);
$sql = "select user_id,college,head_photo,levell,score from tuhao_info where user_id={$id}";
$user = fetchOne($sql);
$sql4 = "select * from tuhao_pro where id={$user['user_id']} and status=1";
$user['sendNum'] = getResultNum($sql4);
$user['src'] = "uploads/" . $user['head_photo'];
$user['username'] = $username1['username'];
$smarty->assign('username',$username);
$smarty->assign('study',$study);
$smarty->assign('clothes',$clothes );
$smarty->assign('digital',$digital );
$smarty->assign('transportation',$transportation);
$smarty->assign('entertainment',$entertainment);
$smarty->assign('others',$others);
$smarty->assign('activity',$activity);
$smarty->assign('loginFlag',$loginFlag);
$smarty->assign('sentNum',$sentNum);
$smarty->assign('mesNum',$mesNum);
$smarty->assign('data',$data);
$smarty->assign('user',$user);
$smarty->assign('max',$totalPage);
$smarty->display("guest.tpl");
