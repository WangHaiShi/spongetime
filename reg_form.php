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

$link['css'][] = 'pager';
$link['js'][] = 'jquery.min';
$link['js'][] = 'jquery.valid';
$link['js'][] = 'setup.wizard.js';
page_meta('SpongeTime-注册');
page_header();
reg_form();
page_footer();


?>
