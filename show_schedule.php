<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 分页
 */
require_once('config.php');
session_start();
check_valid_user();
$username=$_SESSION['valid_user'];
$set=$_POST['set'];
$date=$_POST['date'];

//echo $today;

switch($set){
	case"1":
		if($array=get_user_schedule($username,"schedule_do",$today))
		{//按日期获取计划表
			//print_r($array);
			display_do($array);//打印计划表
		}	
		else {
			display_today();
		}
	break;
	case"2":
		if($array=get_user_schedule($username,"schedule_not",0,1)){//按日期获取提醒
			display_not($array);//打印提醒
		}
		else msg('您还未添加任何提醒，赶快行动吧!');
	break;
	case'prev':			
		if($prev=get_date("<",$date,"desc"))
		{//获取前一天日期
			//print_r($prev);
			$prev=$prev[0];
			if($array=get_user_schedule($username,"schedule_do",$prev))
			{//按日期获取计划表
				display_do($array);//打印计划表
			}	
		}	
		else{
			if($array=get_user_schedule($username,"schedule_do",$date))
			{	
				echo'<script>showStatus("没有之前的任务了...")</script>';
				display_do($array,0,null);//打印计划表
			}	
		}
	break;
	default:		
		if($next=get_date(">",$date,"asc"))
		{//获取下一天日期
			$next=$next[0];
			if($array=get_user_schedule($username,"schedule_do",$next))
			{//按日期获取计划表
				display_do($array);//打印计划表
			}	
		}	
		else {
			if($array=get_user_schedule($username,"schedule_do",$date))
			{	
				echo'<script>showStatus("还未添加更新的任务...")</script>';
				display_do($array,0,'prev',null);//打印计划表
			}	
		}
	break;
}

?>