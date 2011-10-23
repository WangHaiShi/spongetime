<?php
/******************************
作者：whs
日期：2011.4.9
功能：用户验证
******************************/
header("Content-Type:text/html; charset=utf-8");
define(HOST_NAME,"localhost");
define(USER_NAME,"root");
define(PASS_WARD,"123456");
define(DATA_BASE,"spongetime");
define(CHAR_SET,"utf8");
function db_connect(){
	$conn=mysql_connect(HOST_NAME,USER_NAME,PASS_WARD) or die("connect error");
	mysql_query("set names ".CHAR_SET);
	mysql_select_db(DATA_BASE,$conn) or die("数据库连接失败");
}

function query($sql){
	if(!is_string($sql)) return false;
	$tmparr=array();//声明临时变量
	if(is_resource($result=mysql_query($sql))){//将资源变量转成数组
		while($row=mysql_fetch_assoc($result)){
			$tmparr[]=$row;	
		}
		if(empty($tmparr)) return false;//判断查询结果
		else return $tmparr;
	}
	else return false;
}
?>