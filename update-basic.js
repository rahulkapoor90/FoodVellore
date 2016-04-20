$('document').ready(function()
{ 
     /* validation */
	 $("#update-basic").validate({
      rules:
	  {
			upname: {
            required: true,
            },
                       upemail:{
                      required:true,
                        },
	   },
       messages:
	   {
            upname:{
                      required: "please enter your name"
                     },
            upemail: {
                     required: "please enter your new email"
                       },
       },
	   submitHandler: submitPas	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitPas()
	   {		
			var data = $("#update-basic").serialize();
				
			$.ajax({	
			type : 'POST',
			url  : 'updatebasic_process.php',
			data : data,
			beforeSend: function()
			{	
				$("#uperror1").fadeOut();
				$("#sendbasic").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					if(response=="okay"){
									
                                                  	$("#uperror1").fadeIn(1000, function(){						
				$("#uperror1").html('<div class="alert alert-success"> <span class="glyphicon glyphicon-info-sign"></span><strong> &nbsp; Your Basic Information has been updated !</strong></div>');									});
						$("#sendbasic").html('<img src="images/btn-ajax-loader.gif" /> &nbsp; Updating ...');
setTimeout(' window.location.href = "settings.php"; ',4100);
					
					}
					else{
									
						$("#uperror1").fadeIn(1000, function(){						
				$("#uperror1").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span><strong> &nbsp; '+response+' !</strong></div>');
											$("#sendbasic").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update Information');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});