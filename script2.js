
$('document').ready(function()
{ 
     /* validation */
	 $("#forgot-form").validate({
      rules:
	  {
			user_forgot: {
            required: true,
            },
	   },
       messages:
	   {
            user_forgot:{
                      required: "please enter your Username or Mobile Phone."
                     },
       },
	   submitHandler: submitForm	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
			var data = $("#forgot-form").serialize();
				
			$.ajax({	
			type : 'POST',
			url  : 'forgot_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error2").fadeOut();
				$("#btn1-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#error2").fadeIn(1000, function(){						
				$("#error2").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; An Recovery Email has been sent.</div>');
											$("#btn1-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Resend Email');
									});
					}
					else{
									
						$("#error2").fadeIn(1000, function(){						
				$("#error2").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn1-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});