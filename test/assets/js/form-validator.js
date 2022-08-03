function formValidator(id){
	var countEmplyEle=0;
	
	function checker(ele){
		if(ele.val()==""){
			ele.addClass('input-danger')
			++countEmplyEle;
		}else{
			ele.removeClass('input-danger')
		}
		
		if(ele.attr('type')=='email'){
			if(validateEmail(ele.val())){
				ele.removeClass('input-danger')
			}else{
				ele.addClass('input-danger')
			}
		}
	}
	
	$("#"+id+" .require").keyup(function(){
		checker($(this))
	})
	
	
	$("#"+id+" .require").each(function(){
		checker($(this))
	})
	
	
	return countEmplyEle
	
	
}

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}	