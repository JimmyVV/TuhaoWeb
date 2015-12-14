<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/22
 * Time: 10:36
 */

header('content-type:text/html;charset=utf-8');
error_reporting(E_ALL ^ E_DEPRECATED);
require_once('Smarty/smarty.inc.php');
require_once('config/config.php');
require_once('lib/mysql.func.php');
require_once('lib/string.func.php');
require_once('lib/sendEmail.php');
require_once('lib/upload.func.php');
require_once('lib/common.func.php');
require_once('core/user.inc.php');
require_once('core/comment.inc.php');
require_once('core/regexTool.class.php');
require_once('core/product.inc.php');
session_start();
connect();