<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-12
 */
 /**
 *设置账户
 */
require_once('config.php');
session_start();
check_valid_user();
$userid=$_POST['userid'];
$mail=$_POST['myemail'];
$username=$_POST['username'];
$password=md5($_POST['password']);

$link['css'][] = 'message';

try{
	change_user_inf($userid,$mail,$username,$password);
	page_meta('SpongeTime - 账户已修改');
	msg('账户修改成功');
	url('member.php','返回');
}
catch(Exception $e){
	page_meta('账户修改错误');
	$msg= $e->getMessage();
	msg($msg);
	url('account.php','返回');
	exit;
}
?>