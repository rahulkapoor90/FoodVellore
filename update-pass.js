$('document').ready(function()
{ 
     /* validation */
	 $("#update-pass").validate({
      rules:
	  {
			oldpass: {
            required: true,
            },
                       newpass:{
                      required:true,
                        },
                       newpass1:{
                       required:true,
                          },
	   },
       messages:
	   {
            oldpass:{
                      required: "please enter old password"
                     },
            newpass: {
                     required: "please enter your new password"
                       },
            newpass1:{
                     required: "please renter your new password"
                      },
       },
	   submitHandler: submitPass	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitPass()
	   {		
			var data = $("#update-pass").serialize();
				
			$.ajax({	
			type : 'POST',
			url  : 'updatepass_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#uperror").fadeOut();
				$("#senddata").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
                                                  	$("#uperror").fadeIn(1000, function(){						
				$("#uperror").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span><strong> &nbsp; Your Password has been updated !</strong></div>');									});
						$("#senddata").html('<img src="images/btn-ajax-loader.gif" /> &nbsp; Updating ...');
setTimeout(' window.location.href = "settings.php"; ',4100);
					
					}
					else{
									
						$("#uperror").fadeIn(1000, function(){						
				$("#uperror").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span><strong> &nbsp; '+response+' !</strong></div>');
											$("#senddata").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update Password');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});