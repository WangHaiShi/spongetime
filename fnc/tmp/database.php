<?php
/******************************
作者：whs
日期：2011.4.9
功能：用户验证
******************************/

function db_connect(){
	$result= new mysqli('localhost','root','123456','spongetime');
	$result->query("set names utf8");  
	if(!$result){
		throw new Exception ('数据库连接错误');
	}
	else{
		return $result;
	}
}
 
?>