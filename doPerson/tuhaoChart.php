<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 2015/9/24
 * Time: 13:45
 */

require_once('../include.php');

$type = isset($_POST['date']) ? $_POST['date'] : 'week';

echo tuhaoChart(0,10,$type);