<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-12
 */
 /**
 * 首页&登陆页
 */
require_once('config.php');

$link['css'][]='pager';
$link['js'][] = 'jquery.min';
$link['js'][] = 'jquery.valid';
$link['js'][] = 'setup.wizard';
page_meta('Sponge Time');
page_header();
login_or_reg();
page_footer();
?>

