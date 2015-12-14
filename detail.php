<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/10
 * Time: 20:39
 */

require_once('include.php');

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
$pro_id = isset($_GET['pro_id']) ? $_GET['pro_id'] : '';
$pro_name = isset($_GET['pro_name']) ? $_GET['pro_name'] : '';

if($pro_id != '') {
    $goods = getProById($pro_id);
    $src = getImgByProId($pro_id);
    //print_r($src);
    $sql = "select id from tuhao_user where username='{$goods['receiver']}'";
    $sql1 = "select id from tuhao_user where username='{$goods['username']}'";
    $receiver = fetchOne($sql);
    $user = fetchOne($sql1);
    $receiver_id = $receiver['id'];
    $user_id = $user['id'];
    $goods['reg_time'] = date('Y.m.d', $goods['reg_time']);
    $goods['src'] = $src;
    $goods['receiver_id'] = $receiver_id;
    if($goods['receiver_id'] == '') {
        $goods['receiver_id'] = 0;
    }
    $goods['user_id'] = $user_id;
}
$pageSize = 8;
$sql = "select * from tuhao_comm where pro_id={$pro_id} and parent_id=0 order by reg_time desc";
$numRows = getResultNum($sql);
$totalPage = ceil($numRows/$pageSize);

$sql2 = "select * from tuhao_pro where username='{$username}' and is_send=1 and status =0";
$sentNum = getResultNum($sql2);
$sql3 = "select * from tuhao_comm where receiver_id={$id} and status = 0";
$mesNum = getResultNum($sql3);

$arr = array(
    'hot' => $goods['hot'] + 1
);

update('tuhao_pro',$arr,"id={$pro_id}");
$data = goodsComm($pro_id,$pageSize,'');
//print_r($goods);
$smarty->assign('username',$username);
$smarty->assign('study',$study);
$smarty->assign('clothes',$clothes );
$smarty->assign('digital',$digital );
$smarty->assign('transportation',$transportation);
$smarty->assign('entertainment',$entertainment);
$smarty->assign('others',$others);
$smarty->assign('activity',$activity);
$smarty->assign('loginFlag',$loginFlag);
$smarty->assign('max',$totalPage);
$smarty->assign('goods',$goods);
$smarty->assign('data',$data);
$smarty->assign('sentNum',$sentNum);
$smarty->assign('mesNum',$mesNum);
$smarty->display("article-show.tpl");