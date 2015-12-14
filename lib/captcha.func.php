<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/8
 * Time: 13:20
 */

function captcha(){
    require_once('string.func.php');
    session_start();
    //使用gd库来作验证码
    //创建画布
    $image = imagecreatetruecolor(100, 30);
    //背景色,为白色
    $bgColor = imagecolorallocate($image, 255, 255, 255);
    //填充矩形填充画布
    imagefill($image, 0, 0, $bgColor);

    $string = buildRandomString();
    $sess_name = 'captcha';
    $_SESSION[$sess_name] = $string;

    for ($i = 0; $i < 4; $i++) {
        $fontSize = 6;
        $fontColor = imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));

        $x = ($i * 100 / 4) + mt_rand(5, 10);
        $y = mt_rand(5, 10);

        imagestring($image, $fontSize, $x, $y, substr($string,$i,1), $fontColor);
    }
    //增加点干扰元素
    for ($i = 0; $i < 200; $i++) {
        $pointColor = imagecolorallocate($image, rand(50, 200), rand(250, 200), rand(50, 200));
        imagesetpixel($image, mt_rand(1, 99), mt_rand(1, 29), $pointColor);
    }
    //增加线干扰元素
    for ($i = 0; $i < 3; $i++) {
        $lineColor = imagecolorallocate($image, mt_rand(80, 220), mt_rand(80, 220), mt_rand(80, 220));
        imageline($image, mt_rand(1, 99), mt_rand(1, 29), mt_rand(1, 99), mt_rand(1, 29), $lineColor);
    }

    header('content-type:images/gif');
    imagegif($image);
    imagedestroy($image);

}

captcha();
