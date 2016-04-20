function verifyotp()
{		
$.ajax({
				
			type : 'POST',
			url  : 'verify_otp.php',
			data : data,
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-verify").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {						
					if(response=="ok"){
									
						$("#phone").html('<p class="otp-tag">An OTP has been sent to your phone.<p><input type="tel" name="otp" class="form-control otp" autocomplete="off" id="mobile" placeholder="Enter OTP">');
						$(".modal-footer").html('<button type="submit" class="btn btn-default" name="btn-verify" onclick="verifyotp()" id="btn-verify"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Verify</button>');		}
					else{
									
						$("#error").fadeIn(1000, function(){						
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn-signup").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register');
									});
					}
			  }
			});
}