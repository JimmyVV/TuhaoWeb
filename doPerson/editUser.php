<?php

require_once('../include.php');

$active = isset($_GET['active']) ? $_GET['active'] : '';
$id = isset($_SESSION['id']) ? $_SESSION['id'] : '';

if ($active == 'get') {
    $sql = "select username from tuhao_user where id='{$id}'";
    $sql1 = "select college,address from tuhao_info where user_id='{$id}'";
    $username = fetchOne($sql);
    $info = fetchOne($sql1);
    $arr = array(
        'name' => $username['username'],
        'department' => $info['college'],
        'address' => $info['address']
    );

    echo json_encode($arr);
} elseif ($active == 'edit') {
    echo editUser($id);
}
