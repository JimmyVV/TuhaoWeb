<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/3
 * Time: 10:04
 */

require_once('include.php');

checkLogined();
$type = isset($_GET['type']) ? $_GET['type'] : 'goods';
$study = catePro('学习用品');
$clothes = catePro('衣服配饰');
$digital = catePro('数码产品');
$transportation = catePro('交通工具');
$entertainment  = catePro('生活娱乐');
$others  = catePro('其他');
$activity = catePro('11.11');

if(isset($_SESSION['id']) && isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $loginFlag = $_SESSION['id'];
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

$sql2 = "select * from tuhao_pro where username='{$username}' and is_send=1 and status =0";
$sentNum = getResultNum($sql2);
$sql3 = "select * from tuhao_comm where receiver_id={$id} and status = 0";
$mesNum = getResultNum($sql3);

if($type == 'goods'){
    $data = sent($id,$pageSize,'');
    $goods = 1;
    $sql1 = "select * from tuhao_pro where username='{$username}' and receiver is not null order by reg_time desc ";
    $numRows = getResultNum($sql1);
    $totalPage = ceil($numRows/$pageSize);
}elseif($type == 'info'){
    $data = receiveComm($id,$pageSize,'');
    $goods = 0;
    $sql1 = "select * from tuhao_comm where receiver_id={$id} order by reg_time desc";
    $numRows = getResultNum($sql1);
    $totalPage = ceil($numRows/$pageSize);
}elseif($type == 'sending'){
    $data = sending($id,$pageSize,'');
    $goods = 3;
    $username1 = fetchOne("select username from tuhao_user where id={$id}");
    $sql1 = "select * from tuhao_pro where username='{$username}' and receiver is null order by reg_time desc ";
    $numRows = getResultNum($sql1);
    $totalPage = ceil($numRows/$pageSize);
}

$arr = array(
    'status' => 1
);
update("tuhao_pro", $arr,"username='{$username}' and is_send=1 and status =0");

$sql = "select user_id,college,head_photo,levell,score from tuhao_info where user_id={$id}";
$user = fetchOne($sql);
$sql1 = "select username from tuhao_user where id={$user['user_id']}";
$username1 = fetchOne($sql1);
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
$smarty->assign('data',$data);
$smarty->assign('sentNum',$sentNum);
$smarty->assign('mesNum',$mesNum);
$smarty->assign('goods',$goods);
$smarty->assign('user',$user);
$smarty->assign('max',$totalPage);
$smarty->display("personal.tpl");
