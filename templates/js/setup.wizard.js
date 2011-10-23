$(function(){
	$("#regform").validate({
  		rules: {
    	password: "required",
		password_again: {
				equalTo: "#password"
			}
  		}
	});
	$('#logform').validate();
	$("#reg").hide();
});
function switchForm(type){
	if(type=='reg'){
		$('#reg').fadeIn(800);
		$('#login').hide();
	}
	else{
		$('#login').fadeIn(800);
		$('#reg').hide();
	}
}