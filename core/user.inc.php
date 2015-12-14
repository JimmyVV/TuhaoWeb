<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/17
 * Time: 18:35
 */

function registerName(){
    $username = addslashes($_POST['nickname']);
    $sql="select * from tuhao_user where username = '{$username}'";
    if(fetchOne($sql)) {
        $message = array(
            'success' => false,
            'mes' => '昵称已经被使用'
        );
    }else{
        $message = array(
            'success' => true,
            'mes' => ''
        );
    }
    return json_encode($message);
}

function registerEmail(){
    $email  = addslashes($_POST['email']);
    $regex = new regexTool();
    $sql = "select * from tuhao_user where email = '{$email}'";
    if(!$regex->isEmail($email)) {
        $message = array(
            'success' => false,
            'mes' => '邮箱格式错误'
        );
    }elseif(fetchOne($sql)){
        $message = array(
            'success' => false,
            'mes' => '邮箱被占用'
        );
    }else{
        $message = array(
            'success' => true,
            'mes' => ''
        );
    }
    return json_encode($message);
}

function registerPwd(){
    $password1 = addslashes($_POST['password1']);
    if(strlen($password1) < 6) {
        $message = array(
            'success' => false,
            'mes' => '密码长度不少于6位'
        );
    }else{
        $message = array(
            'success' => true,
            'mes' => ''
        );
    }
    return json_encode($message);
}

function confirmPwd(){
    $password1 = addslashes($_POST['password1']);
    $password2  = addslashes($_POST['password2']);
    if($password1 == $password2){
        $message  = array(
            'success' => true,
            'mes' => ''
        );
    }else{
        $message  = array(
            'success' => false,
            'mes' => '输入密码不一致'
        );
    }
    return json_encode($message);
}


function register(){
    $username = addslashes($_POST['nickname']);
    $email  = addslashes($_POST['email']);
    $password  = addslashes($_POST['password']);
    $reg_time = time();
    $token = md5($username . $password . $reg_time); //创建用于激活识别码
    $token_exptime = time()+7 * 60 * 60 * 24;   //过期时间为7天

    $sex = addslashes($_POST['sex']);
    $college  = addslashes($_POST['college']);
    $enroll_year = addslashes($_POST['enroll_year']);
    $address  = addslashes($_POST['address']);

    $user = array(
        'username'=> $username,
        'password' => md5($password),
        'email' => $email,
        'token' => $token,
        'token_exptime' => $token_exptime,
        'reg_time' => $reg_time
    );
    insert('tuhao_user',$user);
    $id = getInsertId();

    $sql = "select * from tuhao_user where id={$id}";
    $user = fetchOne($sql);
    $toMail = $user['email'];
    $subject = '账户激活';
    $username =  $user['username'];
    $token = $user['token'];
    $head = array('header1.jpg','header2.jpg','header3.jpg');
    $rand = rand(0,2);
    $src = $head[$rand];

    $body = "亲爱的" . $username . "：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
    <a href='http://tuhao.hustonline.net/doAction.php?action=active&verify=" . $token . "' target=
'_blank'>http://tuhao.hustonline.net/doAction.php?action=active&verify=" . $token . "</a><br/>
    如果以上链接无法点击，请将它复制到你的当前浏览器地址栏中进入访问，该链接24小时内有效。";

    $info = array(
        'user_id' => $id,
        'sex' => $sex,
        'college' => $college,
        'enroll_year' => $enroll_year,
        'address' => $address,
        'head_photo' => $src,
        'levell' => 1,
        'score' => 0,
        'week_score' => 0,
        'inc_score' => 0
    );

    if(insert('tuhao_info',$info)){
        $res = sendMail($toMail,$subject,$body);
        if($res == 1){
            $message = array(
                'success' => true,
                'mes' => '邮件发送成功'
            );
        }
    }else{
        $message = array(
            'success' => false,
        );
    }

    return json_encode($message);
}

/**function userInfo(){
    $sex = addslashes($_POST['sex']);
    $college  = addslashes($_POST['college']);
    $enroll_year = addslashes($_POST['enroll_year']);
    $address  = addslashes($_POST['address']);

    $sql = "select * from tuhao_user where id={$_SESSION['id']}";
    $user = fetchOne($sql);
    $toMail = $user['email'];
    $subject = '账户激活';
    $username =  $user['username'];
    $token = $user['token'];
    $head = array('header1.jpg','header2.jpg','header3.jpg');
    $rand = rand(0,2);
    $src = $head[$rand];

    $body = "亲爱的" . $username . "：<br/>感谢您在我站注册了新帐号。<br/>请点击链接激活您的帐号。<br/>
    <a href='http://tuhao.hustonline.net/doAction.php?action=active&verify=" . $token . "' target=
'_blank'>http://tuhao.hustonline.net/doAction.php?action=active&verify=" . $token . "</a><br/>
    如果以上链接无法点击，请将它复制到你的当前浏览器地址栏中进入访问，该链接24小时内有效。";

    $info = array(
        'user_id' => $_SESSION['id'],
        'sex' => $sex,
        'college' => $college,
        'enroll_year' => $enroll_year,
        'address' => $address,
        'head_photo' => $src,
        'levell' => 1,
        'score' => 0,
        'week_score' => 0,
        'inc_score' => 0
    );

    if(insert('tuhao_info',$info)){
        $res = sendMail($toMail,$subject,$body);
        if($res == 1){
            $message = array(
                'success' => true,
                'mes' => '邮件发送成功'
            );
        }
    }else{
        $message = array(
            'success' => false,
        );
    }

    return json_encode($message);
}*/

function active(){
    $verify = $_GET['verify'];
    $nowtime = time();
    $sql = "select id,token_exptime from tuhao_user where token='{$verify}'";
    $row = fetchOne($sql);
    if($row){
        if($nowtime > $row['token_exptime']){
            $mes = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
        }else{
            $arr = array(
                'status' => 1
            );
            if(update("tuhao_user", $arr,"id={$row['id']}")){
                header("location:reset.php?action=active-ok");
            }
        }
    }else{
        header("location:reset.php?action=active-fail");
    }
    return $mes;
}


function login(){
    $message = array();
    $password = md5(addslashes($_POST['password']));
    $email = $_POST['email'];
    $email = mysql_escape_string($email);
    $sql = "select * from tuhao_user where password = '{$password}' and email = '{$email}' ";
    //$rememberPwd = $_POST['rememberPwd'];
    $data = fetchOne($sql);
    if($data){
        if($data['status'] == 0){
            $toMail = $data['email'];
            $subject = '账户激活';
            $username = $data['username'];
            $token = $data['token'];

            $body = "亲爱的" . $username . "：<br/>您已经注册了，但未激活。<br/>请点击链接激活您的帐号。<br/>
    <a href='http://tuhao.hustonline.net/doAction.php?action=active&verify=" . $token . "' target=
'_blank'>http://tuhao.hustonline.net/doAction.php?action=active&verify=" . $token . "</a><br/>
    如果以上链接无法点击，请将它复制到你的当前浏览器地址栏中进入访问，该链接24小时内有效。";

            sendMail($toMail,$subject,$body);
            $message = array(
                'success' => 1,
                'mes' => "请先激活在登录"
            );
        }elseif($data['status'] == 1){
            $autoToken = sha1($data['username'] . time());
            setcookie(" ",$autoToken,time() + 7 * 24 * 3600);
            $arr = array(
                'auto_token' => $autoToken
            );
            update("tuhao_user", $arr, "email='{$email}'");
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $sql2 = "select * from tuhao_pro where username='{$data['username']}' and is_send=1 and status=0";
            $sentNum = getResultNum($sql2);
            $sql3 = "select * from tuhao_comm where receiver_id={$data['id']} and status = 0";
            $mesNum = getResultNum($sql3);
            $message = array(
                'success' => 2,
                'mes' => $data['username'],
                'sentNum' => $sentNum,
                'mesNum' => $mesNum
            );
        }
    }else{
        $message = array(
            'success' => 3,
            'mes' => '账号或者密码错误'
        );
    }
    return json_encode($message);
}

function checkLogined(){
    if(!isset($_SESSION['id']) && !isset($_COOKIE['id'])){
        echo "<script>alert('请先登录');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}

function autoLogin(){
    $autoToken = isset($_COOKIE['autoToken']) ? $_COOKIE['autoToken'] : 'auto';
    $sql = "select * from tuhao_user where auto_token = '{$autoToken}'";
    $data = fetchOne($sql);
    if($data){
        return true;
    }else{
        return false;
    }
}

function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['autoToken'])){
        setcookie("autoToken","",time()-1);
    }
    session_destroy();
    header("location:index.php");
}

function forgetPwd($toMail){
    $token = md5($toMail . time());
    $subject = "土豪网-密码重置链接";
    $body = "您好，<br/>重置密码的链接为<br/>
    <a href='http://tuhao.hustonline.net/reset.php?action=reset&udi=" . $token . "' target=
'_blank'>http://tuhao.hustonline.net/reset.php?action=reset&udi=" . $token . "</a><br/>
   请勿向他人泄露此链接，以免密码被他人重置。";
    $sql = "select username from tuhao_user where email='{$toMail}'";
    $data = fetchOne($sql);
    if($data){
        $res = sendMail($toMail,$subject,$body);
        if($res == 1){
            $message = array(
                'success' => 1,
                'mes' => '邮件发送成功'
            );
            $arr = array(
                'reset_token' => $token
            );
            update("tuhao_user", $arr, "email='{$toMail}'");
        }else{
            $message = array(
                'success' => 2,
                'mes' => '邮件发送失败'
            );
        }
    }else{
        $message = array(
            'success' => 3,
            'mes' => '邮箱未注册'
        );
    }
    return json_encode($message);
}

function resetPwd(){
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if($password1 == $password2) {
        $arr = array(
            'password' => md5($password1)
        );
        if (update("tuhao_user", $arr, "email='{$email}'")) {
            $message = array(
                'success' => true,
                'mes' => '重置密码成功'
            );
        }else{
            $message = array(
                'success' => false,
                'mes' => '密码重置失败'
            );
        }
    }else{
        $message = array(
            'success' => false,
            'mes' => '密码不一致'
        );
    }
    return json_encode($message);
}

function headPhoto(){
    $base64 = $_POST['file'];
    $IMG = base64_decode($base64);
    $path = "../uploads";
    $filename = time() . '.png';
    $destination = $path  ."/" .  $filename;
    if(file_put_contents($filename,$IMG)){
        if(rename($filename,$destination)){
            $arr['head_photo'] = $filename;
            update("tuhao_info", $arr,"user_id={$_SESSION['id']}");
            return json_encode(array(
                'mes' => '上传成功',
                'code' => 1,
                'src' => "uploads/" . $filename
            ));
        }else{
            return json_encode(array(
                'mes' => '上传失败',
                'code' => 0,
            ));
        }
    }else{
        return json_encode(array(
            'mes' => '上传失败',
            'code' => 0
        ));
    }
    /**$uploadFiles = uploadFile($path);
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
    'mes' => "发布成功"
    );
    }else{
    $message = array(
    'success' => false,
    'mes' => "发布失败"
    );
    }
    return json_encode($message);*/
}


function tuhaoChart($offset,$num,$type = ''){
    if($type == 'week' || $type == ''){
        $sql = "select * from tuhao_info order by week_score desc,id limit {$offset},{$num}";
    } else {
        $sql = "select * from tuhao_info order by score desc,id limit {$offset},{$num}";
    }

    $users = fetchAll($sql);
    foreach($users as $user){
        $sql2 = "select username from tuhao_user where id={$user['user_id']}";
        $username = fetchOne($sql2);
        $user['head_photo'] = "uploads/" . $user['head_photo'];
        $user['id'] = $user['user_id'];
        $user['username'] = $username['username'];
        $sql1 = "select * from tuhao_pro where username='{$username['username']}' and status=1";
        $user['sendNum'] = getResultNum($sql1);
        $sql2 = "select * from tuhao_pro where receiver='{$username['username']}' and status=1";
        $user['receiveNum'] = getResultNum($sql2);
        if($type == 'week' || $type == ''){
            $user['score'] = $user['week_score'];
        }
        $arr[] = $user;
    }
    if($type == 'month' || $type == 'week'){
        return json_encode($arr);
    }else{
        return $arr;
    }
}

function editUser($id){
    $username = addslashes($_POST['name']);
    $college = addslashes($_POST['department']);
    $address = addslashes($_POST['address']);

    $arrName = array(
        'username' => $username
    );
    $arrColl = array(
        'college' => $college,
        'address' => $address
    );

    if (update("tuhao_user",$arrName,"id={$id}") && update("tuhao_info",$arrColl,"user_id={$id}") &&
        update("tuhao_pro",$arrName,"username='{$_SESSION['username']}'") ) {

        $_SESSION['username'] = $username;
        $sql = "select username from tuhao_user where id='{$id}'";
        $sql1 = "select college,address from tuhao_info where user_id='{$id}'";
        $username = fetchOne($sql);
        $info = fetchOne($sql1);
        $message = array(
            'name' => $username['username'],
            'department' => $info['college'],
            'address' => $info['address']
        );

    } else {
        $message = array(
            'success' => false,
            'mes' => "编辑失败"
        );
    }

    return json_encode($message);
}