<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/10
 * Time: 21:35
 */

require_once('../include.php');

$id = isset($_GET['pro_id']) ? $_GET['pro_id'] : '';
$pageSize = 8;
echo goodsComm($id,$pageSize,'json');