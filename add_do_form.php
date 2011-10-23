<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 添加计划
 */
require_once('config.php'); 
session_start(); 
check_valid_user();
$id=$_POST["id"];
$date=$_POST["date"];
$set=$_POST["set"];
$end=$_POST["end"];
$content=$_POST["content"];
$score=$_POST["score"];
$today=date('Y年n月d日');//获取当前日期
$username=$_SESSION['valid_user'];

$link['css'][] = 'pager';
$link['css'][] = 'jquery-ui';
$link['css'][] = 'datepicker';
$link['js'][] = 'jquery.min';
$link['js'][] = 'jquery-ui.min';
$link['js'][] = 'ajax';
$link['js'][] = 'jquery.timepicker.min';
$link['js'][] = 'page';

page_meta('SpongeTime - 我的任务单');
page_header(0,'back');
add_do_form(); 
info();
page_footer(); 
?>