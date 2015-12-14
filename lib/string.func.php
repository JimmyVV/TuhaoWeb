<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/8
 * Time: 14:38
 */

function buildRandomString(){
    $chars = array();

    for ($i = 0; $i < 4; $i++) {
        $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
        $fontContent = substr($data, rand(0, strlen($data)), 1);
        $chars[] = $fontContent;
    }

    $string = implode("",$chars);

    return $string;
}

/**
 * 获取唯一字符串
 * @return string
 */
function getUniqueName(){
    return md5(uniqid(microtime(true),true));
}

/**
 * 获得文件的后缀名
 * @return string
 */
function getExtName($filename){
    $array = explode(".",$filename);
    return strtolower(end($array));
}