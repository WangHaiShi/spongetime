<?php
/**
 * Sponge Time 
 * 版本: 1.0.1
 * 作者:whs
 * 2011-10-8
 */
 /**
 * 用户列表操作
 */

//检查是否重复添加
function check_repeat($username,$date,$time_set,$time_end,$content,$type=0){
	$conn = db_connect();
	//$type: 1not 0do
	$type==1?($query="select * from schedule_not where username='".$username."' and not_date='".$date."' and not_time='".$time_set."' and not_content='".$content."'"):($query="select * from schedule_do where username='".$username."' and sch_date='".$date."' and sch_time_set='".$time_set."' and sch_time_end='".$time_end."' and sch_content='".$content."'");	
	//echo $query;
	$result=mysql_query($query);
	if($result && (mysql_num_rows($result)>0)){
		return true;
	}
}

//添加内容
function add_schedule($username,$date,$time_set,$time_end,$content,$type=0){
	$conn = db_connect();
	//$type: 1not 0do
	if(check_repeat($username,$date,$time_set,$time_end,$content,$type)){
		return false;
	}
	else {
		$type==1?($query="insert into schedule_not (username, not_date, not_time, date_type, not_content) values ('".$username."','".$date."', '".$time_set."', '".$time_end."', '".$content."')"):($query="insert into schedule_do (username, sch_date, sch_time_set, sch_time_end, sch_content) values ('".$username."','".$date."', '".$time_set."', '".$time_end."', '".$content."')");
		$result=mysql_query($query);
		//echo $query;
		if(!$result){
			return false;
		}
		else  return true;
	}
	
}

//读取列表
function get_user_schedule($username,$tablename,$data,$type=0){
	$conn=db_connect();
	switch($type){
		case'1'://sch_not表提取所有
			$query="select * from ".$tablename." where username='".$username."' order by not_id desc";
		break;
		case'2'://sch_not表提取时间与内容
			$query="select not_time,not_content from ".$tablename." where username='".$username."' and not_date='".$data[0][0]."' or not_date='".$data[0][1]."' or not_date='".$data[0][2]."' ";
		break;
		case'3'://提取sch_do的“done”
			$query="select sch_done from ".$tablename." where sch_id ='".$data."' ";
		break;
		default://按日期提取sch_do的所有
			$query="select * from ".$tablename." where username='".$username."' and sch_date='".$data."' order by sch_time_set";
		break;
	}
	//echo $query;
	$result=query($query);
	if(!$result) return false;
	return $result;
}

//读取指定的日期
function get_date($symbol,$date,$order,$type=0){//symbol为关系运算符,order为正倒序
	$conn=db_connect();
	$type==1?($query="select sch_date from schedule_do order by sch_date ".$order." limit 1 "):($query="select sch_date from schedule_do where sch_date ".$symbol." '".$date."' order by sch_date ".$order." limit 1 ");
	//echo $query;
	$result=mysql_query($query);
	if(!$result) return false;
	$row = mysql_fetch_row($result);
	return $row;
}

//删除内容
function delete_schedule($id,$type=0){
	$conn=db_connect();
	//$type: 1not ,0 do
	$type==1?($query="delete from schedule_not where not_id='".$id."'"):($query="delete from schedule_do where sch_id='".$id."'");	
	if(!$result=mysql_query($query)) {
		 msg('删除失败...');
	} else //msg('删除完毕');
	return true;
}

//更新列表内容
function update_schedule($id,$tablename,$data){
	$conn=db_connect();
	$result=mysql_query("update ".$tablename." set ".$data." where sch_id='".$id."'");
	if(!$result){
			return false;
		}
	else  return true;
}

/*识别url并转换为超链接
function autolink($foo) 
{ 
$foo = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\1" target=_blank rel=nofollow>\1</a>', $foo); 
if( strpos($foo, "http") === FALSE ){ 
$foo = eregi_replace('(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="http://\1" target=_blank rel=nofollow >\1</a>', $foo); 
}else{ 
$foo = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\1<a href="http://\2" target=_blank rel=nofollow >\2</a>', $foo); 
} 
return $foo; 
}*/
?>