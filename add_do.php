<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 添加计划
 */
require_once('config.php');
session_start();
check_valid_user();
$username=$_SESSION['valid_user'];
$id=$_POST["id"];//id不为空，更新数据，反之写入
$date=$_POST['date'];
$time_set=$_POST['time_set'];
$time_end=$_POST['time_end'];
$content=$_POST['content'];
$score=$_POST['score'];

if($id){
	$sql="sch_date = '".$date."',sch_time_set='".$time_set."',sch_time_end='".$time_end."',sch_content='".$content."'";
	//sch_score='".$score."'";
	update_schedule($id,"schedule_do",$sql);
	if($array=get_user_schedule($_SESSION['valid_user'],"schedule_do",$date)){//按日期获取计划表
		display_do($array);//打印计划表
	}	
} 
else {
	add_schedule($username,$date,$time_set,$time_end,$content,0);//写入所添加的计划
	if($array=get_user_schedule($_SESSION['valid_user'],"schedule_do",$date)){//按日期获取计划表
		display_do($array);//打印计划表
	}
}
	
?>

