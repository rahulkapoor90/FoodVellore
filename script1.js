$('document').ready(function()
{ 
     /* validation */
	 $("#signup-form").validate({
      rules:
	  {
			name: {
			required: true,
			},
			username: {
			required: true,
			},
			email: {
			required: true,
			email: true
			},
			password: {
			required: true,
			},
			mobile: {
            required: true,
            },
	   },
       messages:
	   {
            name:{
                      required: "please enter your name"
                     },
		    username:{
                      required: "please enter your username"
                     },
		    email:{
                      required: "please enter your email"
                     },
			password:{
                      required: "please enter your password"
                     },
			mobile:{
                      required: "please enter your mobile"
                     },
            email: "please enter your email address",
       },
	   submitHandler: submitForm	
       });  
	   /* signup submit */
	   function submitForm()
	   {		
			var data = $("#signup-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : 'signup_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-signup").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {
				   console.log(response);
					if(response=="ok"){
						$("#mobilesignup").prop("disabled", true);	
                                                $("#namesignup").prop("disabled", true);
                                                 $("#usernamesignup").prop("disabled", true);
                                                $("#user_email").prop("disabled", true);
                                                 $("#passsignup").prop("disabled", true);	
                                                 $("#mobilesignup").prop("disabled", true);
						$("#phone").html('<p class="otp-tag">An OTP has been sent to your phone.</p><p class="otp-msg">Note: Your phone number is needed to be verified to have successful sign up.</p> <input type="tel" name="otp" class="form-control otp" autocomplete="off" placeholder="Enter OTP">');
						$(".modalsignup").html('<button class="btn btn-default" id="mobile" onclick="verifyotp()"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Verify Phone Number</button>');		}
					else{
						$("#error").fadeIn(1000, function(){						
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
													});
$("#btn-signup").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
					}
			  }
			});
				return false;
		}
	   /* signup submit */
});