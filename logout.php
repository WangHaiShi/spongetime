<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 用户登出
 */
require_once('config.php');
session_start();
check_valid_user();
$old_user=$_SESSION['valid_user'];
unset($_SESSION['valid_user']);
$result_dest= session_destroy();
$link['css'][] = 'message';
page_meta('账户登出');
if(!empty($old_user)){
	if($result_dest){
		msg('账户已成功登出,你的信息与计划表将得到安全的保管');
	} else {
		msg('无法登出');
	}
} else {
	msg('抱歉,您还未登录,无法进行该操作');
	url('login_form.php','登陆');
}

?>