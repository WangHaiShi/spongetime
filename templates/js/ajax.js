
//添加作息计划
function addDo(id){
	var	date=$("#date").val(),
			set=$("#time_set").val(),
			end=$("#time_end").val(),
			content=$("#content").val(),
			params ="id="+id+"&date="+date+"&time_set="+set+"&time_end="+end+"&content="+content;
	//alert(params);
	$.ajax({
		url:'add_do.php',
		beforeSend:function(){
			if(date==''||content==''){
				showStatus('内容未填写完全...');
				return false;
			}
			if(timeValid(date,set,end)){
				return true;
			}else return false;
		} ,
		type:'post',
		data:params,
		success:function(data){
			$("#sch_list").html(data);
			if(id!=0){
				updateDo('','','','','','');
				showStatus('修改完毕.');
			}
			else showStatus('添加完毕.');
		}
	});
}
//获取被选中的radio的值
function getRadioValue(RadioName){
    var obj;    
    obj=$('input[name="'+RadioName+'"]');
		if(obj!=null){
        var i;
        for(i=0;i<obj.length;i++){
            if(obj[i].checked){
                return obj[i].value;            
            }
        }
    }
    return null;
}

//添加备忘与提醒
//获取add_not_form.php中的所有参数：date-type,daily-time,weekly,custom,weekly-time,custom-time,content
function addNot(){
	var	daily_time=$("#daily_time").val(),
			weekly=$("#weekly").val(),
			weekly_time=$("#weekly_time").val(),
			custom=$("#custom").val(),
			custom_time=$("#custom_time").val(),
			content=$("#content").val(),
			date_type=getRadioValue("date_type"),
			date,
			time;
			
	switch(date_type){
			case'day':
				date='00'; 
				time=daily_time; 
			break;
			case'week':
				date=weekly; 
				time=weekly_time; 
			break;	
			default:
				date=custom;
				time=custom_time; 
		}
	var params='date='+date+'&time='+time+'&date_type='+date_type+'&content='+content;
		   //$("#sch_list").html(params);
	$.ajax({
		url:'add_not.php',
			beforeSend:function(){
			if(date=='' || time=='' || content==''){
				showStatus("内容未填写完全...");
				return false;
			}
			if(date_type=='custom'){
				if(timeValid(date,'',time)) return true;
				else return false;
			}
		} ,
		type:'post',
		data:params,
		success:function(data){
			$("#sch_list").html(data);
		}
	});
}


//查看用户添加过的所有计划或提醒
function showSchedule(set,date){
	var params ='set='+set+'&date='+date;
	//alert(params);
	$.ajax({
		url:'show_schedule.php',
		type:'post',
		data:params,
		success:function(data){
			$("#sch_list").html(data);
		}
	});
}

//删除计划或提醒
function deleteIt(id){
	var params="id="+id+"&date="+$("p[name=date]").attr("id"); //序列化表单的值
	//alert(params);
	$.ajax({
		url:'delete.php', //后台处理程序
		type:'post',         //数据发送方式
		data:params,         //要传递的数据
		success: function(data){//回传函数
			$("#sch_list").html(data);
		}
	});
}

//计划完成后计分
function scoring(id){
	var params ='id='+id;
	//alert(params);
	$.ajax({
		url:'score.php', //后台处理程序
		type:'post',         //数据发送方式
		data:params,      //要传递的数据
		success: function(data){//回传函数
			//$(".noticebar").append(data);
			//alert(data);
		}
	});
}

//表单切换
function updateDo(id,date,set,end,content){
	var form='<p class="small_title">'+(id ?'修改任务':'添加新任务' )+'</p>'+
	'<p class="separator"></p>'+
	'<form id="form" method="post">'	+
		'<label> 我要做的事情</label><br />'+
		'<label for="date">日期:</label> '+
		'<input class="input_9" type="text" id="date" name="date" value="'+date+'"><br>'+
		'<label for="time">时间:</label> '+
		'<input class="input_6" type="text" id="time_set" name="time_set" value="'+set+'"> '+
		'<label class="bigfont">~</label> '+
		'<input class="input_6" type="text" id="time_end" name="time_end" value="'+end+'"><br>'+
		'<label for="content">计划:</label> '+
		'<input class="input_12" type="text" id="content" name="content" value="'+content+'"><br>'+
		'<input class="form_button" type="reset" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'" value="'+(id ?'撤销':'重置' )+'" onclick="javascript: window.location.href=\'add_do_form.php\';">'+
		'<input class="form_button" type="button" onMouseDown="this.className=\'btn_down\'" onMouseUp="this.className=\'form_button\'" value="'+(id ?'修改':'提交' )+'" onClick="javascript: addDo('+(id? id:'0')+');"> '+
	'</form>'+'<script src="templates/js/page.js"></script>';
	$('#manager').html(form);
}

function timeValid(date,set,end){
    today=nowDate();
	date=date.split('.');
	today=today.split('.');
	set=set.split(":");
	end=end.split(":");
	if(parseInt(date[0])<parseInt(today[0])) {showStatus('这天已经过去了...'); return false;}
	else if(parseInt(date[1])<parseInt(today[1])) {showStatus('这天已经过去了...'); return false;}
	else if(parseInt(date[2])<parseInt(today[2]) && parseInt(date[1])==parseInt(today[1])) {showStatus('这天已经过去了...'); return false;}
	else if(set[0]>end[0]){
		showStatus("时间设置冲突..."); return false;
	}
	else if(set[0]==end[0]&& set[1]>=end[1]){
		showStatus("时间设置冲突..."); return false;
	}
	else return true;
}

function nowDate(){
	var now= new Date();  
    var year=now.getFullYear();  
    var month=now.getMonth()+1;  
    var day=now.getDate();  
    var today=year+"."+month+"."+day; 
	return today;
}

function showStatus(text){
	$('#status').html(text);
	$('#status').show('fadeIn');
	setTimeout("$('#status').hide('fadeOut')",1000);
}
