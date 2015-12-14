<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/10/15
 * Time: 10:31
 */

require_once('../include.php');

$active = isset($_GET['active']) ? $_GET['active'] : '';
$comm_id = isset($_POST['comm_id']) ? $_POST['comm_id'] : '';

echo editComm($active,$comm_id);