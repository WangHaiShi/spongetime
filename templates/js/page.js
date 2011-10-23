$(document).ready(function() {
	$('#date').add($('#custom')).datepicker({
		//dateFormat: 'D, dd M yy',
		dateFormat: 'yy.m.dd',
		timeFormat: 'hh:mm',
		//showAnim: 'fold',
		showButtonPanel: true
	});
	$('#time_set').add($('#time_end')).add($('#daily_time')).add($('#weekly_time')).add($('#custom_time')).timepicker({
		timeFormat: 'hh:mm'
	});

	$('#status').hide();
	dateType();
});


function dateType(){
var	c1=$(".check-1"),
		c2=$(".check-2"),
		c3=$(".check-3");
      
c1.add(c2).add(c3).hide();

$("#check-1").click(function(){
	$(this).attr("checked",true);
	$("#check-2").add($("#check-3")).attr("checked",false);
	$(".check-1").slideToggle("slow");
	$(".check-2").add($(".check-3")).hide();
});

$("#check-2").click(function(){
	$(this).attr("checked",true);
	$("#check-1").add($("#check-3")).attr("checked",false);
	$(".check-2").slideToggle("slow");
	$(".check-1").add($(".check-3")).hide();
});

$("#check-3").click(function(){
	$(this).attr("checked",true);
	$("#check-2").add($("#check-1")).attr("checked",false);
	$(".check-3").slideToggle("slow");
	$(".check-2").add($(".check-1")).hide();
});
}