<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * Json
 */
require_once('config.php');
session_start();
check_valid_user();
$wday=date('w');
$date[]=array($today,$wday,'00');
//print_r($date);

if($array=get_user_schedule($_SESSION['valid_user'],"schedule_not",$date,2)){//按日期获取计划表
	$code= json_encode($array);
	$code = preg_replace("#\\\u([0-9a-f]+)#ie", "iconv('UCS-2', 'UTF-8', pack('H4', '\\1'))", $code);
	echo $code;
}
?>	
