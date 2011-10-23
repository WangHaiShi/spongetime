<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 添加贴士提醒
 */
require_once('config.php');
session_start();
check_valid_user();
$username=$_SESSION['valid_user'];

$date=$_POST['date'];
$time=$_POST['time'];
$date_type=$_POST['date_type'];
$content=$_POST['content'];

add_schedule($username,$date,$time,$date_type,$content,1);//写入所添加的计划
if($array=get_user_schedule($username,"schedule_not",0,1)){//按日期获取计划表
	display_not($array);//打印计划表
}
?>