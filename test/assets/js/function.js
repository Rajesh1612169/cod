
    function deadline_amount(){
        var start_actual_time = $("#udeadline").val();
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();
        
        var output = d.getFullYear() + '/' +  ((''+month).length<2 ? '0' : '') + month + '/' + ((''+day).length<2 ? '0' : '') + day;
        start_actual_time = new Date(start_actual_time);
        
        end_actual_time = new Date(output);
        var diff =  start_actual_time - end_actual_time;
        
        var diffSeconds = diff / 1000;
        var HH = Math.floor(diffSeconds / 3600);
        var MM = Math.floor(diffSeconds % 3600) / 60;
        var formatted = ((HH < 10) ? ("0" + HH) : HH);
        var no_words = $("#no_words option:selected").val();
        if(formatted<=24){
            if(no_words > 40){
                alert("You cannot select greater than 10,000 words of two days deadline, kindly seclect less than 10000 words");
                $("#detail_btn").addClass("hide");
            }
            else{
                var amount = $("#s_tamu").html();
                amount =  parseInt(amount) + 5;
                $("#s_tamu").html(amount);
                $("#detail_btn").removeClass("hide");
            }
        }
        else if(formatted>24 && formatted<=48){
            if(no_words > 40){
                alert("You cannot select greater than 10,000 words of two days deadline, kindly seclect less than 10000 words");
                $("#detail_btn").addClass("hide");
            }
            else{
                var amount = $("#s_tamu").html();
                amount =  parseInt(amount) + 5;
                $("#s_tamu").html(amount);
                $("#detail_btn").removeClass("hide");
            }
        }
    }
	$(function(){
	    $("#addpreort").click(function(){
	        if (this.checked) {
	            var val = $("#addpreort").attr("value");
	            var amount = $("#s_tamu").html();
	            amount =  parseInt(amount) + parseInt(val);
	            $("#s_tamu").html(amount);
	            deadline_amount();
	        }
	        else {
	            var val = $("#addpreort").attr("value");
	            var amount = $("#s_tamu").html();
	            amount =  parseInt(amount) - parseInt(val);
	            $("#s_tamu").html(amount);
	            deadline_amount();
	        }
	    });
	    $('#no_words').change(function(){
	        deadline_amount();
	        $('#o_name').keyup(function(){
        		var s_name = $('#o_name').val();
        		$('#s_name').text(s_name);
        		$('#en').show();
        		
        	});
        	
		var p_amu = $('#ppr_stndrd option:selected').attr("data-id");
		var w_amu = $('#no_words option:selected').val();
		
		if(typeof p_amu !== 'undefined'){
			var s_tamu = p_amu * w_amu;
		}else{
			s_tamu = 'Please Select Package';
		}
		
		var s_no_words = $('#no_words option:selected').text();
		$('#s_no_words').html(s_no_words);
		$('#s_tamu').text(s_tamu);
		$('#nwd').show();
	});
	
	    $('#udeadline').datepicker({
	        format:"yyyy/mm/dd",
	        minDate:+1,
	        startDate:'+1d',
	        maxViewMode:2,
	        todayBtn:true,
	        autoclose:true,
	    }).on("change", function(){
	        deadline_amount();
	    });
    $("#form-order").submit(function(){
      var fd = new FormData();
      var amount = $("#amount").html();
      fd.append("amount",amount);
      var other_data = $('#form-order').serializeArray();
      $.each(other_data,function(key,input){
        fd.append(input.name,input.value);
      });
      $.ajax({
        url:'process.php',
        data: fd,
        contentType: false,
        processData: false,
        type: 'POST',
        success:function(response){
            var a = $("#o_payment option:selected").val();
            if(a==1){
                window.open(response,"_blank");
            }
            else{
                window.open("https://sharpers.co.uk","_self");
            }
          
        }
      });
    });
    $('#o_name').keyup(function(){
 
      var s_name = $('#o_name').val();
    $('#s_name').text(s_name);
    $('#en').show();
      
  });
  $('#o_email').keyup(function(){
        		
        		var s_email = $('#o_email').val();
        		$('#s_email').html(s_email);
        		$('#ee').show();	
        		
        	});
        	$('#o_num').keyup(function(){
        		var s_numeber = $('#o_num').val();
        		$('#s_numeber').html(s_numeber);
        		$('#em').show();
        	});
        	$('#paper_type').change(function(){
        	    deadline_amount();
		var s_ppr_type = $('#paper_type option:selected').text();
		$('#s_ppr_type').text(s_ppr_type);
		$('#pt').show();
	});
	$('#ref_style').change(function(){
		var s_ref_style = $('#ref_style option:selected').text();
		$('#s_ref_style').text(s_ref_style);
		$('#rs').show();
	});
	$('#edu_level').change(function(){
		var s_edu_level = $('#edu_level option:selected').text();
		$('#s_edu_level').text(s_edu_level);
		$('#el').show();
	});
	$('#o_subject').keyup(function(){
		var s_subject = $('#o_subject').val();
		$('#s_subject').text(s_subject);
		$('#sb').show();
	});
	$('#o_topic').keyup(function(){
		var s_topic = $('#o_topic').val();
		$('#s_topic').text(s_topic);
		$('#tp').show();
	});
	$('#o_instrcut').keyup(function(){
		var s_instrcut = $('#o_instrcut').val();
		$('#s_instrcut').text(s_instrcut);
		$('#ins').show();
	});
	$('#ppr_stndrd').change(function(){
	    
		var s_ppr_stndrd = $('#ppr_stndrd option:selected').text();
		$('#s_ppr_stndrd').text(s_ppr_stndrd);
		$('#ps').show();
		var p_amu = $('#ppr_stndrd option:selected').attr("data-id");
		var w_amu = $('#no_words option:selected').val();
		
		if(w_amu !== ''){
			var s_tamu = p_amu * w_amu;
		}else{
			s_tamu = 'Please Select No. of words';
		}
		$('#s_tamu').text(s_tamu);
		
	});
		$("#order_btn").click(function(){
			var name = $("#o_name").val();
			var o_email = $("#o_email").val();
			var o_num = $("#o_num").val();
			if(name ==''){
				alert("Name is Required");
			}
			else if(o_email ==''){
				alert("Email is Required");
			}
			else if(o_num ==''){
				alert("Number is Required");
			}
			else{
				$(".s_step_bot").removeClass("hide");
				$(".or_mid").removeClass("hide");
				$(".or_bot").removeClass("hide");
			}
		});
    $("#detail_btn").click(function(){
      
        if($('#tc').prop("checked") == true){
          $(".t_step_bot").removeClass("hide");
        }
        else{
          alert("Terms and conditions must be accept");
        }
      
    });
	});
    function Validate_email(event) {
        var regex = new RegExp("^[a-z0-9.@_-]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    function Validate_name(event) {
        var regex = new RegExp("^[a-z ]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    function Validate_number(event) {
        var regex = new RegExp("^[0-9]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    function Validate_message(event) {
        var regex = new RegExp("^[a-zA-Z0-9 ]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
    $(document).ready(function(){
       $('input').on("cut copy paste",function(e) {
          e.preventDefault();
       });
       $('textarea').on("cut copy paste",function(e) {
          e.preventDefault();
       });
    });
