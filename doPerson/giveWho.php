<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/12
 * Time: 11:27
 */

require_once('../include.php');

$receiver_id = $_POST['receiver_id'];
$pro_id = $_POST['pro_id'];
$sql = "select username from tuhao_user where id={$receiver_id}";
$receiver = fetchOne($sql);

echo giveWho($receiver['username'],$pro_id);