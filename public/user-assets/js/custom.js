//user profile page coding start
$(document).ready(function(){
	
	$("#user-image").on("change",function(){
		var file=this.files[0];
		var url=URL.createObjectURL(file);
		$(".profile-picture-view img").attr("src",url);
	});

	//update form sumit
	$(".user-profile-update-form").submit(function(e){
		e.preventDefault();
		var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val().trim()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}
			else{
				input_index++;
			}
		});

		if(input_index==input.length){
			var formdata=new FormData(this);
			formdata.append("_token",$("body").attr("data"));
			$.ajax({
				type:"POST",
				url:"/user/update-date",
				data:formdata,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$(".theme-btn1").html("Processing Wait....");
					$(".theme-btn1").attr("disabled",true);

				},
				success:function(response){
						$(".theme-btn1").html("Save Change");
					$(".theme-btn1").attr("disabled",false);

					if(response=="success"){
						window.location.href=location.href;
						alert("Your Profile has been changed");
					}
					else{
						alert(response);
					}
				}

			});
		}
	});
	//edn update form update
});



//user new password generate
$(document).ready(function(){
	$(".password-change-form").submit(function(e){
		e.preventDefault();
		
		var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val().trim()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}
			else{
				input_index++;
			}
		});

		if(input_index==input.length){
			$.ajax({
				type:"POST",
				url:"/user/update-password",
				data:{
					oldpasswor:$(".password-change-form input[name=oldpassword]").val().trim(),
					newpassword:$(".password-change-form input[name=newpassword]").val().trim(),
					_token:$("body").attr("data"),
				},

				success:function(response){
				alert(response);

				}
			});
		}
	});
});
//end password generate
//end user profile page 

