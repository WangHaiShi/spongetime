<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 完成计划并计分
 */
require_once('config.php');
session_start();
check_valid_user();

$id=$_POST['id'];
$array=get_user_schedule($_SESSION['valid_user'],"schedule_do",$id,3);
//print_r($array);
$done=$array[0]["sch_done"];
$done==0? ($data="sch_done = '1'" ):($data="sch_done = '0'");
update_schedule($id,'schedule_do',$data);

?>