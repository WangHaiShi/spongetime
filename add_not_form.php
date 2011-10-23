<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * notDO list
 */
require_once('config.php'); 
session_start(); 
check_valid_user();
$link['css'][] = 'pager';
$link['css'][] = 'jquery-ui';
$link['css'][] = 'datepicker';
$link['js'][] = 'jquery.min';
$link['js'][] = 'jquery-ui.min';
$link['js'][] = 'ajax';
$link['js'][] = 'jquery.timepicker.min';
$link['js'][] = 'page';

page_meta('SpongeTime - 贴士提醒');
page_header(0,'back');
add_not_form(); 
info();
page_footer(); 
?>