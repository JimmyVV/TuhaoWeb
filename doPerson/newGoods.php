<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/9/26
 * Time: 0:57
 */

require_once('../include.php');

$offset = isset($_POST['page']) ? $_POST['page'] : 1;
if($offset == 1){
    $offset = 4;
}else{
    $offset = 4 + ($offset - 1) * 15;
}
echo newGoods($offset,15,'json');