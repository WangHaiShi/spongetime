<?php
/**
 * Sponge Time 
 * version: 1.0.1
 * by:whs
 * 2011-10-8
 */

 /**
 *  account editing form
 */

require_once('config.php');
session_start();
check_valid_user();
$username=$_SESSION['valid_user'];
//echo $username;
$row=user_inf($username);
//print_r($row);

$link['css'][] = 'pager';
$link['js'][] = 'jquery.min';
//$link['js'][] = 'jquery-ui';
$link['js'][] = 'jquery.valid';
$link['js'][] = 'setup.wizard';

page_meta('SpongeTime - 账户设置');
page_header(0,'back');
account_form($row);//表单中带有用户个人信息
page_footer();

?>