<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 删除内容
 */
require_once('config.php');
session_start();

 $id=$_POST['id'];
 $date=$_POST['date'];

if($date==0){//如果日期为空,则删除备忘提醒
	delete_schedule($id,1);
	if($array=get_user_schedule($_SESSION['valid_user'],"schedule_not",0,1)){
		display_not($array);
	}
}
else{//日期有效,则根据日期删除对应的日程计划
	delete_schedule($id);
	if($array=get_user_schedule($_SESSION['valid_user'],"schedule_do",$date)){
		display_do($array);
	}
	else {
		if($prev=get_date("<",$date,"desc"))
		{//获取前一天的具体日期
			$prev=$prev[0];
			if($array=get_user_schedule($_SESSION['valid_user'],"schedule_do",$prev))
			{//按日期获取计划表
				display_do($array);//打印计划表
			}	
		}	
	}
}
?>