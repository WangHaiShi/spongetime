<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-12
 */
 /**
 * 用户登陆
 */
require_once('config.php');
session_start();

$username=$_POST['usn'];
$password=md5($_POST['pwd']);
$link['css'][] = 'message';
if($username&&$password){
	try{
		login($username,$password);
		$_SESSION['valid_user']=$username;
		header("refresh:2;url=member.php");
		print('正在加载，三秒后自动跳转~~~');
	}
	catch(Exception $e){
		page_meta('出现异常');
		msg('登录失败');
		url('index.php','重新登录');
		exit;
	}
}

//header('location:member.php');
?>