<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * profile
 */
require_once('config.php');
//require_once('../manage/json.php');
//ini_set( "session.gc_maxlifetime ",   10);//session有效时间
session_start();
check_valid_user();
$link['css'][] = 'memer';
$link['css'][] = 'jquery.checkbox';
$link['js'][] = 'jquery.min';
$link['js'][] = 'jquery.path';
$link['js'][] = 'jquery.checkbox';
$link['js'][] = 'mem';
$link['js'][] = 'ajax';
page_meta('SpongeTime');
page_header('hr');
navAndDash();
if($array=get_user_schedule($_SESSION['valid_user'],"schedule_do",$today)){//按日期获取计划表
	schedule($array);
	//print_r($array);
} else {
	$msg='
	<article>
	<br><br><p class="small_title">今天无事，放空...
	<a href="add_do_form.php"> 做点什么？</a></p>
	</article>';
	schedule($msg,1);
}

//display_time();	
page_footer();

?>
