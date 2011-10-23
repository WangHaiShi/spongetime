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
	$result=$conn->query("select * from `account` where username='".$username."'");
	if(!$result){
		throw new Exception('sql 查询错误！');
	}
	if($result->num_rows>0){
		throw new Exception('这个昵称已被人抢先注册啦,再换一个吧');
	}
	//echo $sql="insert into user (name, age, gender, job, tel, mail, username, password) values ('".$name."', '".$age."', '".$gender."', '".$job."', '".$tel."', '".$mail."', '".$username."', '".$password."' )"; exit;

	$result=$conn->query("insert into `account` (mail, username, password) values ('".$mail."', '".$username."', '".$password."' )");
	if(!$result){
		throw new Exception('sql 写入错误！');
	}
	
	return true;
}

//验证用户名与密码
function login($username,$password){
	//连接数据库
	$conn= db_connect();
	$result=$conn->query("select * from `account` where username='".$username."' and password='".$password."' ");
	if($result->num_rows>0){
		return true;
	} else{
		throw new Exception('登录失败,用户名或密码有错误');
	}
}

//检查用户是否有有有效的session
function check_valid_user(){
	if(isset($_SESSION['valid_user'])){
		//echo'<script>alert("欢迎！ '. $_SESSION['valid_user'].'");</script>';
		return true;
	} else {
		//do_html_header('出现异常');
		msg('您还未登录');
		url('index.php','登陆');
		page_footer();
		exit;
	}
}	
//在表单中显示相应信息,以便修改
function user_inf($username){
	//连接数据库
	$conn= db_connect();
	$result=$conn->query("select * from `account` where username='".$username."'");
	$row=$result->fetch_assoc();
	return $row;
}

//修改个人信息
function change_user_inf($userid,$mail,$username,$password){
	$conn=db_connect();
	//echo $sql="update user set name='".$name."', age='".$age."', gender='".$gender."', job='".$job."', tel='".$tel."', mail='".$mail."', username='".$username."', password='".$password."' where userid='".$userid."'";exit;
	
	$result=$conn->query("update `account` set mail='".$mail."', username='".$username."', password='".$password."' where user_id='".$userid."'");
	if(!$result){
		throw new Exception('修改失败');
	} else {
		return true;
	}
}

?>