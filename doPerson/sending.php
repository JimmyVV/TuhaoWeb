<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/8/6
 * Time: 16:21
 */

require_once('../include.php');

if(isset($_GET['id'])){
	$id = (int)$_GET['id'];
}elseif(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
}elseif(isset($_COOKIE['id'])){
    $id = $_COOKIE['id'];
}

echo sending($id,8,'json');