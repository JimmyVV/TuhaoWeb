<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/7/15
 * Time: 16:46
 */
require_once('libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->left_delimiter = "{";
$smarty->right_delimiter = "}";
$smarty->template_dir = "./templates";
$smarty->compile_dir = "./templates_c/";
$smarty->cache_dir = "./cache/";
