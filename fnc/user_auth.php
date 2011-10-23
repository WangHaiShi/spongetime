<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 用户身份认证
 */

//用户注册
function reg($mail,$username,$password){
	//连接数据库
	$conn = db_connect();

	//验证账户唯一性
	$result=mysql_query("select * from `account` where username='".$username."'");
	if(!$result){
		throw new Exception('sql 查询错误！');
	}
	if(mysql_num_rows($result)>0){
		throw new Exception('这个昵称已被人抢先注册啦,再换一个吧');
	}
	//echo $sql="insert into user (name, age, gender, job, tel, mail, username, password) values ('".$name."', '".$age."', '".$gender."', '".$job."', '".$tel."', '".$mail."', '".$username."', '".$password."' )"; exit;

	$result=mysql_query("insert into `account` (mail, username, password) values ('".$mail."', '".$username."', '".$password."' )");
	if(!$result){
		throw new Exception('sql 写入错误！');
	}
	
	return true;
}

//验证用户名与密码
function login($username,$password){
	//连接数据库
	$conn= db_connect();
	$result=mysql_query("select * from `account` where username='".$username."' and password='".$password."' ");
	if(mysql_num_rows($result)>0){
		return true;
	} else{
		throw new Exception('登录失败,用户名或密码有错误');
	}
}

//检查用户是否有有有效的session
function check_valid_user(){
	if(isset($_SESSION['valid_user'])){
		return true;
	} else {
		$link['css'][] = 'message';
		page_meta('账户登出');
		msg('您还未登录');
		url('index.php','登陆');
		exit;
	}
}	
//在表单中显示相应信息,以便修改
function user_inf($username){
	//连接数据库
	$conn= db_connect();
	$row=query("select * from `account` where username='".$username."'");
	return $row;
}

//修改个人信息
function change_user_inf($userid,$mail,$username,$password){
	$conn=db_connect();
	//echo $sql="update user set name='".$name."', age='".$age."', gender='".$gender."', job='".$job."', tel='".$tel."', mail='".$mail."', username='".$username."', password='".$password."' where userid='".$userid."'";exit;
	
	$result=mysql_query("update `account` set mail='".$mail."', username='".$username."', password='".$password."' where user_id='".$userid."'");
	if(!$result){
		throw new Exception('修改失败');
	} else {
		return true;
	}
}

?>