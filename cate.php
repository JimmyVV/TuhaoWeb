<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/15
 * Time: 0:39
 */

require_once('include.php');
$study = catePro('学习用品');
$clothes = catePro('衣服配饰');
$digital = catePro('数码产品');
$transportation = catePro('交通工具');
$entertainment  = catePro('生活娱乐');
$others  = catePro('其他');
$activity = catePro('双11专区');

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
$sql2 = "select * from tuhao_pro where username='{$username}' and is_send=1 and status =0";
$sentNum = getResultNum($sql2);
$sql3 = "select * from tuhao_comm where receiver_id={$id} and status = 0";
$mesNum = getResultNum($sql3);

$arr = array('学习用品','衣服配饰','数码产品','交通工具','生活娱乐','其他', '双11专区');
$order = isset($_GET['order']) ? $_GET['order'] : null;
$orderBy = $order ? "order by " . $order : "order by reg_time desc";
$cate = isset($_GET['cate']) ? $_GET['cate'] : '学习用品';
$cate = addslashes($cate);
if(in_array($cate,$arr)){
    if ($cate == '双11专区') {
        $sql = "select * from tuhao_pro where activity=1";
    } else {
        $sql = "select * from tuhao_pro where parent_cate='{$cate}'";
    }
}else{
    $sql = "select * from tuhao_pro where son_cate='{$cate}'";
}
$numRows = getResultNum($sql);
$pageSize = 15;
$totalPage = ceil($numRows/$pageSize);
if(in_array($cate,$arr)){
    if ($cate == '双11专区') {
        $sql1= "select * from tuhao_pro where activity=1 limit {$pageSize}";;
    } else {
        $sql1= "select * from tuhao_pro where parent_cate='{$cate}' limit {$pageSize}";
    }
}else{
    $sql1= "select * from tuhao_pro where son_cate='{$cate}' limit {$pageSize}";
}
$rows = fetchAll($sql1);
$goods = array();

foreach($rows as $row){
    $sql2 = "select album_path from tuhao_album where pid={$row['id']}";
    $sql3 = "select id from tuhao_user where username='{$row['username']}'";
    $src = fetchOne($sql2);
    $user_id = fetchOne($sql3);
    $sql4 = "select college from tuhao_info where user_id={$user_id['id']}";
    $college = fetchOne($sql4);
    $row['src'] = "uploads/" . $src['album_path'];
    $row['college'] = $college['college'];
    $goods[] = $row;
}
$_SESSION['cate'] = $cate;
$smarty->assign('username',$username);
$smarty->assign('study',$study);
$smarty->assign('clothes',$clothes );
$smarty->assign('digital',$digital );
$smarty->assign('transportation',$transportation);
$smarty->assign('entertainment',$entertainment);
$smarty->assign('others',$others);
$smarty->assign('activity',$activity);
$smarty->assign('loginFlag',$loginFlag);
$smarty->assign('key',$cate);
$smarty->assign('max',$totalPage);
$smarty->assign('goods',$goods);
$smarty->assign('sentNum',$sentNum);
$smarty->assign('mesNum',$mesNum);
$smarty->display("cate.tpl");