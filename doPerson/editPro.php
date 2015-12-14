<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/10/12
 * Time: 18:26
 */

require_once('../include.php');

$active = isset($_GET['active']) ? $_GET['active'] : '';
$pro_id = isset($_POST['id']) ? $_POST['id'] : '';
$pro_id = (int)$pro_id;

if ($active == 'edit') {
    $goods = getProById($pro_id);
    $src = getImgByProId($pro_id);
    $sql = "select id from tuhao_user where username='{$goods['receiver']}'";
    $sql1 = "select id from tuhao_user where username='{$goods['username']}'";
    $receiver = fetchOne($sql);
    $user = fetchOne($sql1);
    $receiver_id = $receiver['id'];
    $user_id = $user['id'];
    $goods['reg_time'] = date('Y.m.d', $goods['reg_time']);
    $goods['src'] = $src;
    $goods['receiver_id'] = $receiver_id;
    if ($goods['receiver_id'] == '') {
        $goods['receiver_id'] = 0;
    }
    $goods['user_id'] = $user_id;

    echo json_encode($goods);
} else {
    echo editPro($active,$pro_id);
}