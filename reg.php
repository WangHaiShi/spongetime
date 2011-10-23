<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 注册
 */
require_once('config.php');
$mail=$_POST['myemail'];
$username=$_POST['username'];
$password=md5($_POST['password']);

//session_cache_limiter('private, must-revalidate');
$link['css'][] = 'message';
try{
session_start();
reg($mail, $username, $password);
$_SESSION['valid_user'] = $username;
page_meta('注册成功');
msg('您已成功加入spongeTime，赶快去看看吧！');
url('member.php','点击进入个人界面');
}
catch(Exception $e){
	page_meta('出现异常');
	$msg= $e->getMessage();
	msg($msg);
	url('index.php','返回');
	exit;
}
?>