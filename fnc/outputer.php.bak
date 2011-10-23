<?php
/**
 * Sponge Time 
 * version: 1.0.1
 * by:whs
 * 2011-10-7
 */

 /**
 * output all the parts of webpage
 */

function page_meta($title){
global $link;
echo '
<!DOCTYPE html>
<html lang="cn">
<head>
	<meta name="description" content="xxx" />
	<meta name="keywords" content="print" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>' .$title . '</title>';
	echo"\n";
	foreach($link['css'] as $v)
	echo "\t<link rel='stylesheet' href='templates/css/$v.css' />\n";
	foreach($link['js'] as $v)
	echo "\t<script src='templates/js/$v.js'></script>\n";
	echo <<<EOT
</head>
EOT;
} 

function page_header($hr=0,$back=0){
echo'
<div id="wrapper">
<header>
<img src="templates/img/logo.png">';
if($back)backUrl();
if($hr)echo'<hr>';
else {
	echo'<p class="separator"></p>';
}
echo'</header>';
}

function page_footer(){
echo'
	</div>
	</html>';
}
//---------------------------------------------------------------------------------------------------------------
function account_form($row){
echo'
<div id="manager">
<p class="small_title">修改账户信息</p>
<p class="separator"></p>
<form id="accform" method="post" action="account_change.php">
	<label for="username">昵称：</label>
	<input class="input_6 required" name="username" id="username" value="'.$row[0]["username"].'"/><br />
	<label for="email">Email：</label>
	<input type="email" class="input_9 email required" name="email" id="email" value="'.$row[0]["mail"].'"><br />		<label for="password">新密码：</label>
	<input class="input_6 required" name="password" id="password" type="password" value="'.$row[0]["password"].'"><br />
	<label for="password_again">密码确认：</label>
	<input class="input_6 required equalTo" name="password_again" id="password_again" type="password" value="'.$row[0]["password"].'"><br />
	<input class="form_button" id="submit" value="修改"  type="submit" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'">
</form>
</div>';
}

function login_or_reg(){
echo'<div id="manager" >
<div id="login">
<p class="small_title">用户登录</p>
<p class="separator"></p>
<form id="logform" method="post" action="log.php">
	<label for="usn">昵称：</label>
	<input class="input_6 required" name="usn" id="usn" value=""/><br>	
	<label for="pwd">密码：</label>
	<input class="input_9 required" name="pwd" id="pwd" type="password" /><br>
	<a href="#" onclick="javascript:switchForm(\'reg\');">注册</a>
	<input class="form_button" id="submit" value="登陆"  type="submit" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'"/>
</form>
</div>
<div id="reg">
<p class="small_title">填写信息，完成注册</p>
<p class="separator"></p>
<form id="regform" method="post" action="reg.php">
	<label for="username">昵称：</label>
	<input class="input_6 required" name="username" id="username" value=""/><br />
	<label for="email">Email：</label>
	<input type="email" class="input_9 email required" name="email" id="email" value=""/><br />		
	<label for="password">密码：</label>
	<input class="input_6 required" name="password" id="password" type="password" value=""/><br />
	<label for="password_again">密码确认：</label>
	<input class="input_6 required equalTo" name="password_again" id="password_again" type="password" /><br />
	<a href="#" onclick="javascript:switchForm(\'login\');">登陆</a>
	<input class="form_button" id="submit" value="注册"  type="submit" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'"/>
</form>
</div>
</div>';
}

function add_do_form(){
echo'<script>showSchedule(1);</script>';
echo'<section id="manager">
	<p class="small_title">添加新任务</p>
	<p class="separator"></p>
	<form id="form">	
		<label> 我要做的事情</label><br>
		<label for="date">日期:</label>
		<input class="input_9" type="text" id="date" name="date"><br>
		<label for="time">时间:</label>
		<input class="input_6" type="text" id="time_set" name="time_set"> 
		<label class="bigfont">~</label>
		<input class="input_6" type="text" id="time_end" name="time_end"><br>
		<label for="content">计划:</label>
		<input class="input_12" type="text" id="content" name="content"><br>
		<input class="form_button" type="reset" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'" value="重置"/>
		<input class="form_button" type="button" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'" value="提交" onClick="javascript: addDo(\'0\');"/> 
	</form>
</section>';
}

function add_not_form(){
echo'<script>showSchedule(2);</script>';
echo'<div id="manager">
	<p class="small_title">添加自律小贴士</p>
	<p class="separator"><p/>
	<form  id="form">	
		<label> 我要注意的事情</label><br><br>
		<label> 每天:</label>
		<input class="button" type="button" name="date_type" id="check-1" value="day" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'" checked="">&nbsp;
		<label> 每周:</label>
		<input class="form_button" type="button" name="date_type" id="check-2" value="week" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'" checked="">&nbsp;
		<label> 自定:</label>
		<input class="form_button" type="button" name="date_type" id="check-3" value="custom" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'" checked=""><br/>
		<div class="check-1">
			<label for="daily">何时提醒:</label>
			<input class="input_6" type="text" id="daily_time" name="daily_time" /><br>
		</div>
		<div class="check-2">
			<label for="weekly">日期:</label>
			<select class="input_6" id="weekly" name="weekly" />
				<option value="1">周一</option>
				<option value="2">周二</option>
				<option value="3">周三</option>
				<option value="4">周四</option>
				<option value="5">周五</option>
				<option value="6">周六</option>
				<option value="7">周日</option>
			</select>&nbsp;&nbsp;
			<label for="time">何时提醒:</label>
			<input class="input_6" type="text" id="weekly_time" name="weekly_time" /><br>
		</div>
		<div class="check-3">
			<label for="date">日期:</label>
			<input class="input_6" type="text" id="custom" name="custom" /><br/>
			<label for="time">何时提醒:</label>
			<input class="input_6" type="text" id="custom_time" name="custom_time" /> 
		</div>

		<label for="content">内容:</label>
		<input class="input_12" type="text" id="content" name="content" /><br/>
		<input class="form_button" type="reset" value="重置" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'"/>
		<input class="form_button" type="button" value="提交" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'" onclick="javascript: addNot();"/>
	</form>
</div>';
}

//
function display_do($array,$type=0,$prev='prev',$next='next'){
global $today;
echo'<script type="text/javascript">
$(function(){	
	var date=$(\'p[name="date"]\').attr("id");
	$("#prev").click(function(){		
		//alert(date);
		showSchedule(\'prev\',date);
	});
	$("#next").click(function(){
		//alert(date);
		showSchedule(\'next\',date);
	});
});
</script>';
if($type){//用户表现页显示	
	echo'<article>';
	if(is_array($array)){
		echo '<header>今日计划<br>&nbsp;&nbsp;——'.$array[0]["sch_date"].'</header>';//
		foreach($array as $val){
		echo '<p class="smallfont">'.$val['sch_time_set'].'~'.$val['sch_time_end'].'&nbsp;&nbsp;';
		echo $val['sch_content'].'&nbsp;&nbsp;';	
		echo '<input style="cursor:pointer" type="checkbox" ';
		if($val["sch_done"] == 1 ) echo 'checked="checked"';
		echo 'onchange="javascript: scoring('.$val["sch_id"].');"/></p> ';
		}
		echo'</article>';
	}
}else{
	if(is_array($array)){
		//print_r($array);		
		echo'<p name="date" id="'.$array[0]["sch_date"].'" class="small_title">';
		arrow($prev);
		if($array[0]["sch_date"]==$today) echo'今天';
		else echo $array[0]["sch_date"];
		arrow($next);
		echo'</p>';
		foreach($array as $val){
			echo '<p>'.$val['sch_time_set'].'~'.$val['sch_time_end'].'&nbsp;&nbsp;'.$val['sch_content'].'&nbsp;<img src="templates/img/edit.png" alt="修改" onclick="javascript: updateDo('.$val["sch_id"].',
			\''.$val["sch_date"].'\',
			\''.$val["sch_time_set"].'\',
			\''.$val["sch_time_end"].'\',
			\''.$val["sch_content"].'\');">&nbsp;<img src="templates/img/delete.png" alt="删除" onclick="javascript: deleteIt('.$val["sch_id"].');"></p>';
			}
		}
	}
}


//
function display_not($array){
//echo'<br><p class="separator"><p/>';
	if(is_array($array)){
		foreach($array as $val){
			switch($val['date_type']){
				case"day":
					echo'<p>每天的'.$val['not_time'].'&nbsp;&nbsp;提醒:'.$val['not_content'];
				break;
				case"week":
					echo'<p>每个星期'.$val['not_date'].'的'.$val['not_time'].'&nbsp;&nbsp;提醒:'.$val['not_content'];
				break;
				default:
					echo'<p>'.$val['not_date'].'的'.$val['not_time'].'&nbsp;&nbsp;提醒:'.$val['not_content'];
				break;
			}
			
			echo '&nbsp;<img src="templates/img/edit.png" alt="修改" onclick="javascript: updateDo('.$val["sch_id"].',
			\''.$val["sch_date"].'\',
			\''.$val["sch_time_set"].'\',
			\''.$val["sch_time_end"].'\',
			\''.$val["sch_content"].'\');">&nbsp;<img src="templates/img/delete.png" alt="删除" onclick="javascript: deleteIt('.$val["not_id"].');"></p>';
		}
	}	
}

//
function display_today(){
echo'<script type="text/javascript">
$(function(){	
	var date=$(\'p[name="date"]\').attr("id");
	$("#prev").click(function(){		
		//alert(date);
		showSchedule(\'prev\',date);
	});
	$("#next").click(function(){
		//alert(date);
		showSchedule(\'next\',date);
	});
});
</script>';
echo'<p name="date" id="'.$today.'" class="small_title">';
		arrow('prev');
		echo'今天';
		arrow('next');
		echo'</p><p  class="small_title">还未添加今天的任务，赶快行动吧!</p>';
}
//-----------------------------------------------------------------------------------------------------------------------
/*翻页按钮
function turn(){
echo'<input id="prev" class="button"  value="prev" type="button" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'"/>
<input id="next" class="button"  value="next" type="button" onmousedown="this.className=\'btn_down\'" onmouseup="this.className=\'form_button\'"/>';
}*/

//计时器
function display_time(){
echo'<div id="time"></div>';
}

//链接
function url($url,$text){
	if(empty($text)){
	header("location:'".$url."' ");
	}
	else{
	echo'<p class="small_title"><a href='.$url.'><u>'.$text.'</u></a></p>';
	}
}

//
function msg($msg){
echo'<p class="small_title">'.$msg.'</p>';
}
//-----------------------------------------------------------------------------------------------------------------------
function navAndDash(){
echo'<div id="nav_dash">
<nav>
	<ul id="menu">
		<li><a id="account" class="account" href="#">账户</a></li>
		<li><a id="plan" class="plan" href="#">任务与提醒</a></li>
		<li><a id="lookover" class="lookover" href="#">好友</a></li>
	</ul>
</nav>
<nav id="menu_account" class="nav_list">
	<ul>
		<li><a href="account.php">账户设置</a></li>
		<li><a href="#">个人资料</a></li>
		<li><a href="logout.php">退出</a></li>
	</ul>
</nav>
<nav id="menu_plan" class="nav_list">
	<ul>
		<li><a href="add_do_form.php">任务单</a></li>
		<li><a href="add_not_form.php">提醒</a></li>
		<li><a href="custom_form.php">个性化定制</a></li>
	</ul>
</nav>
<nav id="menu_lookover" class="nav_list">
	<ul>
		<li><a href="#">邀请新朋友</a></li>
		<li><a href="#">查看</a></li>
	</ul>
</nav>';
dashBoard();
echo'</div>';
}

function schedule($list,$type=0){
echo'<div id="schedule">';
	$type?msg($list):display_do($list,1);
echo'</div>';
}

function info(){
echo'<div id="info">
<p id="status" class="small_title"></p>
<article id="sch_list">

</article>
</div>';
}

function backUrl(){
echo'<div class="back"><a href="member.php" title="返回"><span>返回</span></a></div>';	
//echo'<a class="back" href="member.php"><img src="templates/img/back.png" border=0></a>';
}

function arrow($type){
if($type)echo' <img  id="'.$type.'" src="templates/img/arrow_'.$type.'.png"> ';
else return false;
}

function dashBoard(){
echo'<div id="dashboard">
<audio id="audio" src="templates/audio/dee.mp3" preload></audio>
<div id="time"></div>
</div>';
}

?>