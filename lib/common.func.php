<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/8
 * Time: 20:58
 */

//提醒与路径跳转
function alertMessage($mes,$path){
    echo "<scripts>alert($mes)</scripts>;";
    echo "<scripts>window.location = $path</scripts>;";
}
