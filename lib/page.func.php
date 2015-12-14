<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/9
 * Time: 18:51
 */

require_once('../core/mysql.func.php');
connect();
$sql = "select * from 表名";
$numRows = getResultNum($sql);

//每页的数量
$pageSize = 4;
//总页码数
$totalPage = ceil($numRows/$pageSize);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if($page < 1 || $page == null || !is_numeric($page)){
    $page = 1;
}elseif($page >= $totalPage){
    $page = $totalPage;
}
//偏移量
$offset = ($page - 1) * $pageSize;

$sql1= "select * from 表名 limit {$offset},{$pageSize}";
$rows = fetchAll($sql1);

function listPage($page,$totalPage,$where = null){
    $where = ($where == null) ? null : "&" . $where;
    $url = $_SERVER['PHP_SELF'];
    $previous = ($page == 1) ? "" : $url . "?page=" . ($page - 1) . $where;
    $next = ($page == $totalPage) ? "" : $url . "?page=" . ($page + 1) . $where;
    /**$pa = "";
    for ($i = 1; $i <= 3; $i++) {
        $pa = $pa . $url ."?page=" . $i .$where;
    }*/

    $pageUrl =   array(
        "previous" => $previous,
        "next" => $next
    );
    return json_encode($pageUrl);
}
