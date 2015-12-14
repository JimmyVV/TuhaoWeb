<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/29
 * Time: 15:01
 */

/**
 *添加评论
 */
function addComm(){
    $mes = array();
    $parent_id = addslashes($_POST['parent_id']);
    $pro_id  = addslashes($_POST['pro_id']);
    $sender_id = $_SESSION['id'];
    $receiver_id  = addslashes($_POST['receiver_id']);
    if($receiver_id == ''){
        $receiver_id = 0;
    }
    $content = addslashes($_POST['text']);
    $comm = array(
        'parent_id' => $parent_id,
        'pro_id' => $pro_id,
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
        'content' => $content,
        'status' => 0,
        'reg_time' => time()
    );
    if(insert("tuhao_comm",$comm)){
        $id = getInsertId();
        $sql = "select * from tuhao_comm where id={$id}";
        $row = fetchOne($sql);
        $sql1 = "select pro_name from tuhao_pro where id={$row['pro_id']}";
        $sql2 = "select head_photo from tuhao_info where user_id={$row['sender_id']}";
        $sql3 = "select username from tuhao_user where id={$row['sender_id']}";
        $sql4 = "select username from tuhao_user where id={$row['receiver_id']}";
        $sender = fetchOne($sql3);
        $receiver = fetchOne($sql4);
        $proName = fetchOne($sql1);
        $src = fetchOne($sql2);
        $row['sender_author'] = $sender['username'];
        $row['receiver_author'] = $receiver['username'];
        $row['goods_name'] = $proName['pro_name'];
        $row['src'] = "uploads/" . $src['head_photo'];
        $row['comments'] = array();

        $mes = array(
            'mes' => '评论成功',
            'code' => 1,
            'data' => $row
        );

    }else{
        $mes = array(
            'mes' => '评论失败',
            'code' => 0
        );
    }
    echo json_encode($mes);
}

/**
 *递归获取评论列表
 */
function getComment($parent_id = 0,&$result = array()){
    $sql = "select * from tuhao_comm where parent_id={$parent_id} order by reg_time desc";
    $rows = fetchAll($sql);
    if(empty($rows)){
        return array();
    }

    foreach ($rows as $row) {
        $arr = &$result[];
        $row["children"] = getComment($row["id"],$thisArr);
        $arr = $row;
    }
    return $result;
}


function getCommentByPro($pro_id = 0){
    $sql = "select * from tuhao_comm where pro_id={$pro_id} order by reg_time desc";
    $rows1 = fetchAll($sql);
    if(empty($rows)){
        return array();
    }

    foreach ($rows1 as $row1) {
        $sql1 = "select * from tuhao_comm where where parent_id = {$row1['id']} order by reg_time desc";
        $row2 = fetchAll($sql1);
        $arr['comm1'] = $row1;
        $arr['comm2'] = $row2;
        $arrs[] = $arr;
    }
    return json_encode($arrs);
}


function getCommentByUserId($author_id,$offset,$pageSize){
    $sql = "select * from tuhao_comm where receiver_id={$author_id}  order by reg_time desc limit {$offset},{$pageSize}";
    $rows = fetchAll($sql);
    if(empty($rows)){
        return array();
    }

    return $rows;
}

function changeStatus($status,$receiver_id){
    $mes = array();
    $arr['status'] = $status;

    if(update("tuhao_comm", $arr,"receiver_id={$receiver_id}")){
        $mes = array(
            'success' => true,
            'mes' => ''
        );
    }else{
        $mes = array(
            'success' => false,
            'mes'=> ''
        );
    }
    return json_encode($mes);
}

/**
 * @param $author
 * @param $pageSize 每页消息条数
 * @return array|multitype
 */
function receiveComm($author_id,$pageSize,$type){
    $sql = "select * from tuhao_comm where receiver_id={$author_id} order by reg_time desc";
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

    $rows = getCommentByUserId($author_id,$offset,$pageSize);
    $sqll = "select * from tuhao_comm where receiver_id={$author_id} and status = 0";
    $newNum = getResultNum($sqll);
    $res = array();
    foreach($rows as $row){
        $sql1 = "select pro_name from tuhao_pro where id={$row['pro_id']}";
        $sql2 = "select album_path from tuhao_album where pid={$row['pro_id']}";
        $sql3 = "select username from tuhao_user where id={$row['sender_id']}";
        $sql4 = "select username from tuhao_user where id={$row['receiver_id']}";
        $sender = fetchOne($sql3);
        $receiver = fetchOne($sql4);
        $proName = fetchOne($sql1);
        $src = fetchOne($sql2);
        $row['sender_author'] = $sender['username'];
        $row['receiver_author'] = $receiver['username'];
        $row['goods_name'] = $proName['pro_name'];
        $row['src'] = $src['album_path'];
        $res[] = $row;
    }
    $arr = array(
        'status' => 1
    );
    update("tuhao_comm", $arr,"receiver_id={$author_id} and status=0");
    if($type == 'json') {
        $arr = array(
            'mes' => '获取帖子成功',
            'code' => 1,
            'curPage' => $page,
            'maxPage' => $totalPage,
            'newNum' => $newNum,
            'data' => $res
        );

        return json_encode($arr);
    }else{
        $arr = $res;
        return $arr;
    }
}

function sent($author_id,$pageSize,$type){
    $username = fetchOne("select username from tuhao_user where id={$author_id}");
    $sql = "select * from tuhao_pro where username='{$username['username']}' and receiver is not null order by reg_time desc ";
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

    $sql1 = "select * from tuhao_pro where username='{$username['username']}' and receiver is not null order by reg_time desc limit {$offset},{$pageSize}";
    $rows = fetchAll($sql1);
    $sql2 = "select * from tuhao_pro where username='{$username['username']}' and is_send=1 and status =0";
    $newNum = getResultNum($sql2);
    $res = array();
    foreach($rows as $row){
        $sql2 = "select album_path from tuhao_album where pid={$row['id']}";
        $sql3 = "select id from tuhao_user where username='{$row['username']}'";
        $sql4 = "select id from tuhao_user where username='{$row['receiver']}'";
        $sender = fetchOne($sql3);
        $receiver = fetchOne($sql4);
        $src = fetchOne($sql2);
        $row1['pro_id'] = $row['id'];
        $row1['goods_name'] = $row['pro_name'];
        $row1['sender_author'] = $row['username'];
        $row1['receiver_author'] = $row['receiver'];
        $row1['status'] = $row['is_send'];
        $row1['sender_id'] = $sender['id'];
        $row1['receiver_id'] = $receiver['id'];
        $row1['src'] = 'uploads/' . $src['album_path'];
        $res[] = $row1;
    }
    if($type == 'json') {
        $arr = array(
            'mes' => '获取帖子成功',
            'code' => 1,
            'curPage' => $page,
            'maxPage' => $totalPage,
            'newNum' => $newNum,
            'data' => $res
        );

        return json_encode($arr);
    }else{
        $arr = $res;
        return $arr;
    }
}

function received($author_id,$pageSize){
    $username = fetchOne("select username from tuhao_user where id={$author_id}");
    $sql = "select * from tuhao_pro where receiver='{$_SESSION['username']}' order by reg_time desc ";
    $numRows = getResultNum($sql);

    //总页码数
    $totalPage = ceil($numRows / $pageSize);
    $page = isset($_GET['curPage']) ? (int)$_GET['curPage'] : 1;

    if ($page < 1 || $page == null || !is_numeric($page)) {
        $page = 1;
    } elseif ($page >= $totalPage) {
        $page = $totalPage;
    }
    //偏移量
    $offset = ($page - 1) * $pageSize;

    $sql1 = "select * from tuhao_pro where receiver='{$_SESSION['username']}' order by reg_time desc  limit {$offset},{$pageSize}";
    $rows = fetchAll($sql1);
    $res = array();
    foreach ($rows as $row) {
        $sql2 = "select album_path from tuhao_album where pid={$row['id']}";
        $sql3 = "select id from tuhao_user where username='{$row['username']}'";
        $sql4 = "select id from tuhao_user where username='{$row['receiver']}'";
        $sender = fetchOne($sql3);
        $receiver = fetchOne($sql4);
        $src = fetchOne($sql2);
        $row1['pro_id'] = $row['id'];
        $row1['goods_name'] = $row['pro_name'];
        $row1['sender_author'] = $row['username'];
        $row1['receiver_author'] = $row['receiver'];
        $row1['sender_id'] = $sender['id'];
        $row1['receiver_id'] = $receiver['id'];
        $row1['src'] = $src['album_path'];
        $row1['status'] = $row['is_send'];
        $res[] = $row1;
    }

    $arr = array(
        'mes' => '获取帖子成功',
        'code' => 1,
        'curPage' => $page,
        'maxPage' => $totalPage,
        'data' => $res
    );

    return json_encode($arr);
}


function sending($author_id,$pageSize,$type){
    $username = fetchOne("select username from tuhao_user where id={$author_id}");
    $sql = "select * from tuhao_pro where username='{$username['username']}' and receiver is null order by reg_time desc ";
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

    $sql1 = "select * from tuhao_pro where username='{$username['username']}' and receiver is null order by reg_time desc  limit {$offset},{$pageSize}";
    $rows = fetchAll($sql1);
    $res = array();
    foreach($rows as $row){
        $sql2 = "select album_path from tuhao_album where pid={$row['id']}";
        $sql3 = "select id from tuhao_user where username='{$row['username']}'";
        $sql4 = "select id from tuhao_user where username='{$row['receiver']}'";
        $sender = fetchOne($sql3);
        $receiver = fetchOne($sql4);
        $src = fetchOne($sql2);
        $row1['pro_id'] = $row['id'];
        $row1['goods_name'] = $row['pro_name'];
        $row1['sender_author'] = $row['username'];
        $row1['receiver_author'] = $row['receiver'];
        $row1['status'] = $row['is_send'];
        //$row1['pro_price'] = $row['pro_price'];
        $row1['sender_id'] = $sender['id'];
        $row1['receiver_id'] = $receiver['id'];
        $row1['pro_desc'] = $row['pro_desc'];
        $row1['src'] = 'uploads/' . $src['album_path'];
        $res[] = $row1;
    }

    if($type == 'json') {
        $arr = array(
            'mes' => '获取帖子成功',
            'code' => 1,
            'curPage' => $page,
            'maxPage' => $totalPage,
            'data' => $res
        );
        return json_encode($arr);
    }else{
        $arr = $res;
        return $arr;
    }

}

function sign(){
    $arr = array(
        'is_send' => 1
    );

    if(update("tuhao_pro", $arr,"receiver='{$_SESSION['username']}'")){
        $mes = array(
            'mes' => '签收成功',
            'code' => 1,
        );
        $row = fetchOne("select * from tuhao_info where user_id={$_SESSION['id']}");
        $array = array(
            'score' => $row['score'] + 10,
            'inc_score' => $row['inc_score'] + 10
        );
        update('tuhao_info',$array,"user_id={$_SESSION['id']}");
        $row1 = fetchOne("select levell,score from tuhao_info where user_id={$_SESSION['id']}");
        $levell = floor($row1['score']/30) + 1;
        if($levell != $row['levell']){
            $array1 = array(
                'levell' => $levell
            );
            update('tuhao_info',$array1,"user_id={$_SESSION['id']}");
        }
    }else{
        $mes = array(
            'mes' => '签收失败',
            'code' => 0,
        );
    }
    return json_encode($mes);
}

function giveWho($receiver,$pro_id){
    $arr = array(
        'receiver' => $receiver,
    );

    if(update("tuhao_pro", $arr,"id='{$pro_id}'")){
        $mes = array(
            'mes' => '送出成功',
            'code' => 1,
        );
        $row = fetchOne("select levell,score from tuhao_info where user_id={$_SESSION['id']}");
        $array = array(
            'score' => $row['score'] + 10,
            'inc_score' => $row['inc_score'] + 10
        );
        update('tuhao_info',$array,"user_id={$_SESSION['id']}");
        $row1 = fetchOne("select levell,score from tuhao_info where user_id={$_SESSION['id']}");
        $levell = floor($row1['score']/30);
        if($levell != $row['levell']){
            $array1 = array(
                'levell' => $levell
            );
            update('tuhao_info',$array1,"user_id={$_SESSION['id']}");
        }
    }else{
        $mes = array(
            'mes' => '送出失败',
            'code' => 0,
            'a' =>  $arr
        );
    }
    return json_encode($mes);
}

function goodsComm($pro_id,$pageSize,$type){
    $comm = array();
    $sql = "select * from tuhao_comm where pro_id={$pro_id} and parent_id=0 order by reg_time desc";
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

    $sql1 = "select * from tuhao_comm where pro_id={$pro_id} and parent_id=0 order by reg_time desc limit {$offset},{$pageSize}";
    $rows = fetchAll($sql1);
    $res = array();
    foreach($rows as $row){
        $sql1 = "select pro_name from tuhao_pro where id={$row['pro_id']}";
        $sql2 = "select head_photo from tuhao_info where user_id={$row['sender_id']}";
        $sql3 = "select username from tuhao_user where id={$row['sender_id']}";
        $sql4 = "select username from tuhao_user where id={$row['receiver_id']}";
        $sql5 = "select * from tuhao_comm where parent_id={$row['id']}";
        $sender = fetchOne($sql3);
        $receiver = fetchOne($sql4);
        $proName = fetchOne($sql1);
        $src = fetchOne($sql2);
        $comments = fetchAll($sql5);
        foreach($comments as $comment){
            $sql6 = "select username from tuhao_user where id={$comment['sender_id']}";
            $sql7 = "select username from tuhao_user where id={$comment['receiver_id']}";
            $sql8 = "select head_photo from tuhao_info where user_id={$comment['sender_id']}";
            $sender1 = fetchOne($sql6);
            $receiver1 = fetchOne($sql7);
            $src1 = fetchOne($sql8);
            $comment['sender_author'] = $sender1['username'];
            $comment['receiver_author'] = $receiver1['username'];
            $comment['src'] = "uploads/" . $src1['head_photo'];
            $comm[] = $comment;
        }
        $row['sender_author'] = $sender['username'];
        $row['receiver_author'] = $receiver['username'];
        $row['goods_name'] = $proName['pro_name'];
        $row['src'] = "uploads/" . $src['head_photo'];
        $row['comments'] = $comm;
        $res[] = $row;
        $comm = array();
    }
    if($type == 'json'){
        $arr = array(
            'mes' => 'success',
            'code' => 1,
            'curPage' => $page,
            'maxPage' => $totalPage,
            'data' => $res
        );

        return json_encode($arr);
    }else{
        $arr = $res;
        return $arr;
    }

}

function editComm($active,$comm_id){
    if ($active == 'deleteComm') {
        $sql = "select id from tuhao_comm where parent_id={$comm_id}";
        $rows = fetchAll($sql);
        if ($rows) {
            delete("tuhao_comm","id={$comm_id}");
            foreach ($rows as $row) {
                delete("tuhao_comm","id={$row['id']}");
            }
            $message = array(
                'success' => true,
                'mes' => '删除评论成功'
            );
        } else {
            if(delete("tuhao_comm","id={$comm_id}")) {
                $message = array(
                    'success' => true,
                    'mes' => '删除评论成功',
                    'comm_id' => $comm_id
                );
            } else {
                $message = array(
                    'success' => false,
                    'mes' => '删除评论失败',
                    'comm_id' => $comm_id
                );
            }
        }
        return json_encode($message);
    } elseif ($active == 'editComm') {
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $arr = array(
            'content' => $content
        );
        if (update('tuhao_comm',$arr,"id={$comm_id}")) {
            $message = array(
                'success' => true,
                'mes' => '删除评论成功'
            );
        } else {
            $message = array(
                'success' => false,
                'mes' => '删除评论失败'
            );
        }
        return json_encode($message);
    }
}

