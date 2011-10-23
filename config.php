<?php
/**************************
作者：whs
日期：2011.4.8
功能：配置
**************************/
/** URL BASE and etc.*/
define('SERVER_HOST', 'spongetime.com');
define('URL_BASE', 'http://' . SERVER_HOST . '/');
//define('CODE_NAME', '');

/** PATH */
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'].'/spongetime/');

require_once(DIR_ROOT.'fnc/database.php');
require_once(DIR_ROOT.'fnc/user_auth.php');
require_once(DIR_ROOT.'fnc/outputer.php');
require_once(DIR_ROOT.'fnc/user_schedule.php');
header( "Content-type:  text/html; charset=UTF-8 ");
date_default_timezone_set (PRC);//初始化时间
$today=date('Y.n.d');//获取当前日期
global $today;
/** array that contains page meta info */
$link = array(
	'css' => array(),
	'js' => array(),
);
?>