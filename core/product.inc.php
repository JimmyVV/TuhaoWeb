<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/17
 * Time: 15:47
 */

function issue(){
    $arr = $_POST;
    $arr['username'] = $_SESSION['username'];
    $arr['is_send'] = 0;
    $arr['hot'] = 0;
    $arr['reg_time'] = time();
    $arr['status'] = 0;
    $path = "./uploads";
    $uploadFiles = uploadFile($path);
    $result = insert("tuhao_pro",$arr);
    $pid = getInsertId();
    if($result && $pid){
        if($uploadFiles) {
            foreach ($uploadFiles as $uploadFile) {
                $arr1['pid'] = $pid;
                $arr1['album_path'] = $uploadFile['name'];
                insert("tuhao_album", $arr1);
            }
        }
       $message = array(
            'success' => true,
            'mes' => "发布成功",
            'pro_id' => $pid
        );
    }else{
        $message = array(
            'success' => false,
            'mes' => "发布失败"
        );

    }
    return json_encode($message);
}

function getProById($id){
    $sql="select * from tuhao_pro where id={$id}";
    $row=fetchOne($sql);
    return $row;
}

function getAllPros(){
    $sql = "select * from tuhao_pro order by reg_time desc";
    $rows = fetchAll($sql);
    return $rows;
}

function getProByName($pro_name){
    $sql="select * from tuhao_pro where pro_name='{$pro_name}' order by reg_time desc ";
    $row=fetchOne($sql);
    return $row;
}


function getImgByProId($id){
    //$album = array();
    $src = array();
    $sql = "select id,album_path from tuhao_album where pid={$id}";
    $rows = fetchAll($sql);
    foreach($rows as $row){
        $src[] = "uploads/" . $row['album_path'];
    }

    return $src;
}

function search($pageSize){
    $order = isset($_GET['order']) ? $_GET['order'] : null;
    $orderBy = $order ? "order by " . $order : "order by reg_time desc";
    $key = isset($_SESSION['key']) ? $_SESSION['key'] : null;
    $where = $key ? "where pro_name like '%{$key}%'" : "where id=0";
    $sql="select * from tuhao_pro {$where} {$orderBy}";
    $numRows = getResultNum($sql);


    //总页码数
    $totalPage = ceil($numRows/$pageSize);
    $page = isset($_GET['curPage']) ? (int)$_GET['curPage'] : 1;

    if($page < 1 || $page == null || !is_numeric($page)){
        $page = 1;
    }elseif($page >= $totalPage){
        $page = $totalPage;
    }
    //偏移量
    $offset = ($page - 1) * $pageSize;
    $sql1= "select * from tuhao_pro {$where} {$orderBy} limit {$offset},{$pageSize}";
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

    $arr = array(
        'mes' => '获取帖子成功',
        'code' => 1,
        'curPage' => $page,
        'maxPage' => $totalPage,
        'data' => $goods
    );
        return json_encode($arr);

}

function hotGoods($offset,$num){
    $sql1= "select * from tuhao_pro where is_send=0 order by hot desc limit {$offset},{$num}";
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
        $row['reg_time'] = date('Y.m.d', $row['reg_time']);
        $row['college'] = $college['college'];
        $goods[] = $row;
    }
    return $goods;
}

function newGoods($offset,$num,$type = ''){
    $sql1= "select * from tuhao_pro where is_send=0 order by reg_time desc limit {$offset},{$num}";
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
        $row['reg_time'] = date('Y.m.d', $row['reg_time']);
        $row['college'] = $college['college'];
        $goods[] = $row;
    }
    if($type == 'json') {
        return json_encode($goods);
    }else{
        return $goods;
    }
}

function cate($pageSize){
    $arr = array('学习用品','衣服配饰','数码产品','交通工具','生活娱乐','其他','双11专区');
    $order = isset($_GET['order']) ? $_GET['order'] : null;
    $orderBy = $order ? "order by " . $order : "order by reg_time desc";
    $cate = isset($_SESSION['cate']) ? $_SESSION['cate'] : null;
    //echo $cate;
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
    //总页码数
    $totalPage = ceil($numRows/$pageSize);
    $page = isset($_GET['curPage']) ? (int)$_GET['curPage'] : 1;

    if($page < 1 || $page == null || !is_numeric($page)){
        $page = 1;
    }elseif($page >= $totalPage){
        $page = $totalPage;
    }
    //偏移量
    $offset = ($page - 1) * $pageSize;
    if(in_array($cate,$arr)){
        $sql1= "select * from tuhao_pro where parent_cate='{$cate}' limit {$offset},{$pageSize}";
    }else{
        $sql1= "select * from tuhao_pro where son_cate='{$cate}' limit {$offset},{$pageSize}";
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

    $arr = array(
        'mes' => '获取帖子成功',
        'code' => 1,
        'curPage' => $page,
        'maxPage' => $totalPage,
        'data' => $goods,
        's' => $cate
    );
    return json_encode($arr);

}


function catePro($cateName){
    if ($cateName == '双11专区') {
        $sql1= "select * from tuhao_pro where activity=1 limit 3";
    } else {
        $sql1= "select * from tuhao_pro where parent_cate='{$cateName}' limit 3";
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
        $row['reg_time'] = date('Y.m.d', $row['reg_time']);
        $row['college'] = $college['college'];
        $goods[] = $row;
    }
    return $goods;
}

function more($pageSize){
    $sql = "select * from tuhao_pro where is_send=0 order by hot desc limit 12,100";
    $numRows = getResultNum($sql);
    //总页码数
    $totalPage = ceil($numRows/$pageSize);
    $page = isset($_GET['curPage']) ? (int)$_GET['curPage'] : 1;

    if($page < 1 || $page == null || !is_numeric($page)){
        $page = 1;
    }elseif($page >= $totalPage){
        $page = $totalPage;
    }
    //偏移量
    $offset = ($page - 1) * $pageSize + 12;
    $sql1= "select * from tuhao_pro where is_send=0 order by hot desc limit {$offset},{$pageSize}";
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
        $row['reg_time'] = $row['reg_time'];
        $row['college'] = $college['college'];
        $goods[] = $row;
    }

    $arr = array(
        'mes' => '获取帖子成功',
        'code' => 1,
        'curPage' => $page,
        'maxPage' => $totalPage,
        'data' => $goods
    );
    return json_encode($arr);
}

function editPro($active,$pro_id){
    if ($active == 'editDetails') {
        $arr = $_POST;
        $sql = "select id,album_path from tuhao_album where pid={$pro_id}";
        $rows = fetchAll($sql);
        $srcNum = count($rows);
        $path = "../uploads";
        $uploadFiles = uploadFile($path);
        $uploadNum = count($uploadFiles);

        if ($uploadNum < $srcNum) {
            $i = 0;
            foreach ($uploadFiles as $uploadFile) {
                $array = array(
                    'album_path' => $uploadFile['name']
                );
                unlink("../uploads/" . $rows[$i]['album_path']);
                update("tuhao_album", $array, "id={$rows[$i]['id']}");
                $i++;
            }
            for ($j = $i; $j < $srcNum; $j++) {
                delete("tuhao_album", "id={$rows[$j]['id']}");
                unlink("../uploads/" . $rows[$j]['album_path']);
            }
        } elseif ($uploadNum == $srcNum) {
            $i = 0;
            foreach ($uploadFiles as $uploadFile) {
                $updateArr = array(
                    'album_path' => $uploadFile['name']
                );
                unlink("../uploads/" . $rows[$i]['album_path']);
                update("tuhao_album", $updateArr, "id={$rows[$i]['id']}");
                $i++;
            }
        } elseif ($uploadNum > $srcNum) {
            $i = 0;
            foreach ($rows as $row) {
                $updateArr = array(
                    'album_path' => $uploadFiles[$i]['name']
                );
                unlink("../uploads/" . $row['album_path']);
                update("tuhao_album", $updateArr, "id={$row['id']}");
                $i++;
            }
            for ($j = $i; $j < $uploadNum; $j++) {
                $insertArr = array(
                    'pid' => $pro_id,
                    'album_path' => $uploadFiles[$j]['name']
                );
                insert("tuhao_album", $insertArr);
            }
        }

        if (update("tuhao_pro",$arr,"id={$pro_id}")) {
            $message = array(
                'success' => true,
                'mes' => "编辑成功",
                'pro_id' => $pro_id
            );
        } else {
            $message = array(
                'success' => false,
                'mes' => "编辑失败",
                'pro_id' => $pro_id
            );
        }

    } elseif ($active == 'delete') {
        if ( delete("tuhao_pro", "id={$pro_id}") && delete("tuhao_album", "pid={$pro_id}") &&
                delete("tuhao_comm", "pro_id={$pro_id}")) {
            $message = array(
                'success' => true,
                'mes' => "删除成功"
            );
        } else {
            $message = array(
                'success' => false,
                'mes' => "删除失败"
            );
        }
    }

    return json_encode($message);
}






