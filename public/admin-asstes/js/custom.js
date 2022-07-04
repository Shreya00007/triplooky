//admin profile page cdoing start

//end admin profile page



//banner page coding start
$(document).ready(function(){
   //file upload validation
    function banner_valid(){
     $(".banner-form input[type=file]").on("change",function(){
   	   var file=this.files[0];
   	   var url=URL.createObjectURL(file);
   	   
   	   if(file.type=="image/jpg" || file.type=="image/jpeg" || file.type=="image/gif" || file.type=="image/png" || file.type=="image/svg"){
   	   	  var image=new Image();
   	   	 image.src=url;
   	   	 image.onload=function(){
   	   	 	if(this.width==1340){
   	   	 		if(this.height==400){
   	   	 			$(".banner-preview-img").attr("src",url);
   	   	 			return true;


   	   	 		}
   	   	 		else{
                    
                     $(".banner-preview-img").attr("src","");
                      alert("Banner Height Should Be 400px");
   	   	 		}
   	   	 	}
   	   	 	else{
   	   	 		$(".banner-form input[type=file]").val("");
   	   	 		 $(".banner-preview-img").attr("src","");
   	   	 		alert("Banner Width Should Be 1340px");

   	   	 	}
   	   	 }

   	   }
   	   else{
   	   	$(this).val("");
   	   	alert("File Should Be png,jpg,jped,svg,git expect this another format not allow");
   	   }
   });
    }

    banner_valid();
   //end file upload validation

	$(".banner-form").submit(function(e){
		e.preventDefault();
		var formdata=new FormData($(".banner-form")[0]);
		formdata.append("_token",$("body").attr("data"));
		  if($(this).find("button").attr("role")=="insert"){

		  	if(formvalid(this)){
			
			$.ajax({
				type:"POST",
				url:"/admin/banner-create",
				 data:formdata,
				 processData:false,
				 contentType:false,
				 cache:false,
                
                 beforeSend:function(){
                 	$("#loader-modal").modal("show");
                 	$(this).find("button").html("Please Wait....");

                 },
                 success:function(response){
                 		$("#loader-modal").modal("hide");

                 	$(this).find("button").html("Create New Banner");
                 	if(response=="success"){
                 		$("#add-slider").modal("hide");
                 	alert("Banner Created Successfully");
                 	  	window.location=location.href;

                 	}
                 	else{
                 		alert(response);
                 	}
                 }
			});
			
		}
		  }
		  if($(this).find("button").attr("role")=="update"){
		  	if(formvalid(this)){
			
			
			
		}
		  }

	});

	//edit bannner coding start

		$(".banner-edit-btn").click(function(){
			var pre_image_url=$(this).parent().parent().parent().find("img").attr("src");
			$(".banner-preview-img").attr("src",pre_image_url);

		 $("#edit-banner-moal").modal("show");
		 var id=$(this).attr("data");
		     $(".update-banner-form input[type=file]").on("change",function(){
   	   var file=this.files[0];
   	   var url=URL.createObjectURL(file);
   	   
   	   if(file.type=="image/jpg" || file.type=="image/jpeg" || file.type=="image/gif" || file.type=="image/png" || file.type=="image/svg"){
   	   	  var image=new Image();
   	   	 image.src=url;
   	   	 image.onload=function(){
   	   	 	if(this.width>=1340){
   	   	 		if(this.height>=400){
   	   	 			$(".banner-preview-img").attr("src",url);
   	   	 			return true;


   	   	 		}
   	   	 		else{
                    
                     $(".banner-preview-img").attr("src","");
                      alert("Banner Height Should Be 400px;");
   	   	 		}
   	   	 	}
   	   	 	else{
   	   	 		$(".banner-form input[type=file]").val("");
   	   	 		 $(".banner-preview-img").attr("src","");
   	   	 		alert("Banner Width Should Be 1340px;");

   	   	 	}
   	   	 }

   	   }
   	   else{
   	   	$(this).val("");
   	   	alert("File Should Be png,jpg,jped,svg,git expect this another format not allow");
   	   }
   });
		    
   $(".update-banner-form").submit(function(e){
   	e.preventDefault();
   	var formdata=new FormData(this);
   	formdata.append("_token",$("body").attr("data"));
   	formdata.append("id",id);
   	$.ajax({
				type:"POST",
				url:"/admin/banner-update",
				 data:formdata,
				 processData:false,
				 contentType:false,
				 cache:false,
                
                 beforeSend:function(){
                 	$(this).find("button").html("Please Wait....");
                 		$("#loader-modal").modal("show");

                 },
                 success:function(response){
                 		$("#loader-modal").modal("hide");
                 
       
                 	
                 	if(response=="success"){
                 		$("#add-slider").modal("hide");
                 	alert("Banner Updated Successfully");
                 	 $("#edit-banner-moal").modal("hide");
                 	window.location=location.href;

                 	}
                 	else{
                 		alert(response.message);
                 	}
                 },

			});

   });

		});

	//end coding of banner edit

	//edit status btn
	$(".banner-status-btn").each(function(){
		$(this).click(function(){
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
				$.ajax({
					type:"POST",
					url:"/admin/banner-status",
					data:{
						id:id,
						status:0,
						_token:$("body").attr("data"),
					},
					beforeSend:function(){
						$(btn).html("Process");
						$(btn).attr("disabled",true);
							$("#loader-modal").modal("show");
					},
					success:function(response){
							$("#loader-modal").modal("hide");
						$(btn).attr("disabled",false);
						if(response.message=="success"){
							$(btn).removeClass("btn-success");
							$(btn).addClass("btn-danger");
							$(btn).html("inactive");
							$(btn).attr("status",0);
						}
						else{
							alert(response.message);
						}
					}
				});
			}
			else{
				$.ajax({
					type:"POST",
					url:"/admin/banner-status",
					data:{
						id:id,
						status:1,
						_token:$("body").attr("data"),
					},
					beforeSend:function(){
						$(btn).html("Process");
						$(btn).attr("disabled",true);
							$("#loader-modal").modal("show");
					},
					success:function(response){
							$("#loader-modal").modal("hide");
						$(btn).attr("disabled",false);
						if(response.message=="success"){
							$(btn).removeClass("btn-danger");
							$(btn).addClass("btn-success");
							$(btn).html("Active");
							$(btn).attr("status",1);
						}
						else{
							alert(response.message);
						}
					}
				});
			}
		});
	});
	//end status btn

//delete banner coding start

	$(".banner-delete-btn").click(function(){

		var id=$(this).attr("data");
		var tr=this.parentElement.parentElement.parentElement;
   $("#banner-delete-modal").modal("show");
   $(".confirm-delete-banner-btn").click(function(){
   	
			$.ajax({
				type:"POST",
				url:"/admin/banner-delete",
				data:{
					id:id,
					_token:$("body").attr("data"),
				},
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},

				success:function(response){
						$("#loader-modal").modal("hide");
					 $("#banner-delete-modal").modal("hide");
					if(response.message=="success"){
					alert("Successfully delete");
					  $(tr).addClass("animated infinite flash bg-info text-white");
					  setTimeout(()=>{
					  	$(tr).remove();
					  },2000);
					}
					else{
						alert(response.message);
					}

				}

			});
		
   });
		
	});


//end delete banner
//banner order change
$(".banner-order-change-btn").click(function(){
	var btn=this;
	var select_value=$(this).parent().parent().find("select").val();
	$.ajax({
		type:"POST",
		url:"/admin/banner-order-change",
		data:{
			id:$(this).attr("data"),
			order:select_value,
			_token:$("body").attr("data"),
		},
		beforeSend:function(){
			$(btn).html("Process");
			$(btn).attr("disabled",true);
				$("#loader-modal").modal("show");
		},
		success:function(response){
				$("#loader-modal").modal("hide");
				$(btn).html("Change");
			$(btn).attr("disabled",false);
			if(response.message=="success"){
				window.location.href=window.location;
			}
			else{

				alert(response.message);
			}
		}


	});
});
//end border change

});
//end coding of banner page

//contact us page coding start
$(document).ready(function(){
	$(".contact-us-form").submit(function(e){
		e.preventDefault();
		var input=$(this).find("input");
		$(input).each(function(){
			if($(this).val()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}
		});
		if($(".contact-us-form .contact-us .ql-editor").hasClass("ql-blank")){
			alert("Contact us con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/contact-data",
				data:{
					_token:$("body").attr("data"),
					contact:$(".contact-us .ql-editor").html(),
					phone:$(".contact-us-form input[name=phone]").val().trim(),
					email:$(".contact-us-form input[name=email]").val().trim(),
				},
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					if(response=="success"){
						$(".contact-us-form").trigger("reset");
						$(".contact-us .ql-editor").html("");
						alert("Successfully Created");
					}
					else{
						alert(response);
					}
				}
			});
		}

	});



	//edit contact us function
	$(".contact-us-update-data-form").submit(function(e){
			e.preventDefault();
		var input=$(this).find("input");
		$(input).each(function(){
			if($(this).val()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}
		});
		if($(".contact-us-update-data-form .contact-us .ql-editor").hasClass("ql-blank")){
			alert("Contact us con`t be empty");
		}
		else{
		
			
			$.ajax({
				type:"POST",
				url:"/admin/update-contact-data",
				data:{
					_token:$("body").attr("data"),
					id:$(".contact-us-update-data-form input[name=id]").val(),
					contact:$(".contact-us-update-data-form .contact-us .ql-editor").html(),
					phone:$(".contact-us-update-data-form input[name=phone]").val(),
					email:$(".contact-us-update-data-form input[name=email]").val(),
				},
				beforeSend:function(){
						$("#loader-modal").modal("show");

				},

				success:function(response){
						$("#loader-modal").modal("hide");
					if(response.message=="success"){
						$(".contact-us-update-data-form .contact-us-form").trigger("reset");
						$(".contact-us-update-data-form .contact-us .ql-editor").html("");
						alert("Successfully Updated");
						window.location.href="/admin/view-contact-us";
						$(".contact-us-update-data-form").trigger("reset");
					}
					else{
						alert(response.message);
					}
				}
			});
		}

	});
	//end conatct us function

	//edit 
});
//end coding of contact us page

//start coding of about page
//create about us
$(document).ready(function(){
	$(".about-us-form").submit(function(e){
		e.preventDefault();
		if($(".about-us-form .about-us .ql-editor").hasClass("ql-blank")){
			alert("About us con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/about-data",
				data:{
					_token:$("body").attr("data"),
					about:$(".about-us .ql-editor").html(),
				},
				success:function(response){
					if(response=="success"){
						$(".about-us .ql-editor").html("");
						alert("About Us Created Successfully");
					}
					else{
						alert(response);
					}
				}
			});
		}

	});


//edit about us
$(".about-us-update-form").submit(function(e){
		e.preventDefault();
	
		if($(".about-us-update-form .about-us .ql-editor").hasClass("ql-blank")){
			alert("About us con`t be empty");
		}
		else{

			$.ajax({
				type:"POST",
				url:"/admin/about-update-data",
				data:{
					_token:$("body").attr("data"),
					id:$(".about-us-update-form input[name=id]").val(),
					about:$(".about-us-update-form .about-us .ql-editor").html(),
				},
				success:function(response){
					if(response.message=="success"){
						$("about-us-update-form .about-us .ql-editor").html("");
						alert("About Us Updated Successfully");
						window.location.href="/admin/about-us-show";
					}
					else{
						alert(response.message);
					}
				}
			});
		}

	});
//end edit about us
});
//end create about us
//end coding of about page


//start coding of copyright
//create copyright
$(document).ready(function(){
	$(".copyright-form").submit(function(e){
		e.preventDefault();
		if($(".copyright-form .copyright .ql-editor").hasClass("ql-blank")){
			alert("CopyRight us con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/copyright-data",
				data:{
					_token:$("body").attr("data"),
					copyright:$(".copyright .ql-editor").html(),
				},
				success:function(response){
					if(response=="success"){
						$(".copyright .ql-editor").html("");
						alert("CopyRight Created Successfully");
					}
					else{
						alert(response);
					}
				}
			});
		}

	});

	$("#copyright-form-update").submit(function(e){
		e.preventDefault();
		if($("#copyright-form-update .copyright .ql-editor").hasClass("ql-blank")){
			alert("CopyRight us con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/copyright-update-data",
				data:{
					id:$("#copyright-form-update input[name=id]").val(),
					_token:$("body").attr("data"),
					copyright:$("#copyright-form-update .copyright .ql-editor").html(),
				},
				success:function(response){
					if(response.message=="success"){
						$("#copyright-form-update .copyright .ql-editor").html("");
						alert("CopyRight Created Successfully");
						window.location.href="/admin/view-copy-right";
					}
					else{
						alert(response.message);
					}
				}
			});
		}

	});
});
//end create copyright
//end coding of copyright page


//start coding of cookie policy
//create cookie policy
$(document).ready(function(){
	$(".cookie-policy-form").submit(function(e){
		e.preventDefault();
		if($(".cookie-policy-form .cookie-policy .ql-editor").hasClass("ql-blank")){
			alert("Cookie policy us con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/cookie-policy-data",
				data:{
					_token:$("body").attr("data"),
					cookie_policy:$(".cookie-policy .ql-editor").html(),
				},
				success:function(response){
					if(response=="success"){
						$(".cookie-policy .ql-editor").html("");
						alert("Cooki policy Created Successfully");
					}
					else{
						alert(response);
					}
				}
			});
		}

	});

	//edit cookie policy
	$("#cookie-policy-form-updates").submit(function(e){
		e.preventDefault();
		
		$.ajax({
			type:"POST",
			url:"/admin/cookie-policy-update-data",
			data:{
				id:$("#cookie-policy-form-updates input[name=id]").val(),
				cookie_policy:$("#cookie-policy-form-updates .cookie-policy .ql-editor").html(),
				_token:$("body").attr("data"),
			},
			success:function(response){
				if(response=="success"){
					alert("Cookie Policy Updated Successfully");
				}
				else{
					alert(response);
				}
			}
		});
	});
	//end edit cookie policy
});
//end create cookie policy
//end coding of cookie policy


//start coding of faq
//create faq
$(document).ready(function(){
	$(".faq-form").submit(function(e){
		e.preventDefault();
		if($(".faq-form .faq .ql-editor").hasClass("ql-blank")){
			alert("FAQ con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/faq-data",
				data:{
					_token:$("body").attr("data"),
					faq:$(".faq .ql-editor").html(),
				},
				success:function(response){
					if(response=="success"){
						$(".faq .ql-editor").html("");
						alert("FAQ Created Successfully");
					}
					else{
						alert(response);
					}
				}
			});
		}

	});

	//edit faq
	$(".faq-form-update").submit(function(e){
		e.preventDefault();
		if($(".faq-form-update .faq .ql-editor").hasClass("ql-blank")){
			alert("FAQ con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/faq-update-data",
				data:{
					id:$(".faq-form-update input[name=id]").val(),
					_token:$("body").attr("data"),
					faq:$(".faq-form-update .faq .ql-editor").html(),
				},
				beforeSend:function(){
					$(".faq-form-update").find("button").html("Processing");
					$(".faq-form-update").find("button").attr("disabled",true);
				},
				success:function(response){
					if(response.message=="success"){
						
						alert("FAQ Updated Successfully");
						$(".faq-form-update").find("button").html("Update FAQ`s");
					$(".faq-form-update").find("button").attr("disabled",false);
						window.location.href="/admin/faq-show";
					}
					else{
						alert(response);
					}
				}
			});
		}

	});
	//end edit fa
});
//end create faq
//end coding of faq page

//start coding of term
//create term
$(document).ready(function(){
	$(".term-form").submit(function(e){
		e.preventDefault();
		if($(".term-form .term .ql-editor").hasClass("ql-blank")){
			alert("Terms con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/term-data",
				data:{
					_token:$("body").attr("data"),
					term:$(".term .ql-editor").html(),
				},
				success:function(response){
					if(response=="success"){
						$(".term .ql-editor").html("");
						alert("Term Created Successfully");
					}
					else{
						alert(response);
					}
				}
			});
		}

	});

	$(".terms-form-update").submit(function(e){
		e.preventDefault();
		if($(".terms-form-update .term .ql-editor").hasClass("ql-blank")){
			alert("Terms con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/term-update-data",
				data:{
					id:$(".terms-form-update input[name=id]").val(),
					_token:$("body").attr("data"),
					term:$(".terms-form-update .term .ql-editor").html(),
				},
				success:function(response){
					if(response.message=="success"){
						$(".terms-form-update .term .ql-editor").html("");
						alert("Term Updated Successfully");
						window.location.href="/admin/view-terms";
					}
					else{
						alert(response.message);
					}
				}
			});
		}

	});
});
//end create term
//end coding of term

//start coding of privacy policy
//create privacy policy
$(document).ready(function(){
	$(".privacy-policy-form").submit(function(e){
		e.preventDefault();
		if($(".privacy-policy-form .privacy .ql-editor").hasClass("ql-blank")){
			alert("Privacy Policy con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/privacy-data",
				data:{
					_token:$("body").attr("data"),
					privacy:$(".privacy .ql-editor").html(),
				},
				success:function(response){
					if(response.message=="success"){
						$(".privacy .ql-editor").html("");
						alert("Privacy Policy Created Successfully");
					}
					else{
						alert(response.message);
					}
				}
			});
			
		}

	});

	$(".privacy-policy-form-update").submit(function(e){
		e.preventDefault();
		if($(".privacy-policy-form-update .privacy .ql-editor").hasClass("ql-blank")){
			alert("Privacy Policy con`t be empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/privacy-update-data",
				data:{
					_token:$("body").attr("data"),
					id:$(".privacy-policy-form-update input[name=id]").val(),
					privacy:$(".privacy .ql-editor").html(),
				},
				success:function(response){
					if(response.message=="success"){
						$(".privacy .ql-editor").html("");
						alert("Privacy Policy Updated Successfully");
						window.location.href="/admin/view-policy";
					}
					else{
						alert(response.message);
					}
				}
			});
			
		}

	});
});
//end create privacy policy
//end coding of privacy policy

//language page coding start
$(document).ready(function(){
	$(".lang-form").submit(function(e){
		e.preventDefault();
		if($(this).find("button").attr("role")=="insert"){
			var input=$(this).find("input");
		var input_index=0;
		$(input).each(function(){
			if($(this).val().trim()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}else{
				input_index++;
			}
		});

		if(input.length==input_index){
			$.ajax({
				type:"POST",
				url:"/admin/create-lang",
				data:{
					lang:$(".lang-form input[name=lang]").val(),
					_token:$("body").attr("data"),
				},
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					if(response.message=="success"){
						alert("Language Created Successfully");
						
						$(".lang-form").trigger("reset");
						$("#lang-modal").modal("hide");
						var name=response.data.lang_name;
						var id=(response.data.lang_name);
						console.log(id);
						
						 var data=`<tr >
                                                   
                                                   <td>`+name+`</td>
                                                   <td>
                                                    <button class="btn btn-danger shadow-none p-font edit-lang-staus-btn" data="`+id+`" status="0">incative</button>
                                                
                                                  
                                                  
                                               </td>
                                                   <td class="d-flex justify-content-center align-items-center">
                                                      <button class="icon-btn bg-success mr-2 edit-lang-btn" data="`+id+`"> <i class="la la-edit  text-white"></i></button>
                                                       <a href='/admin/delete-lang/`+id+`' onclick="return confirm('Are you sure')"><button class="icon-btn bg-danger delete-lang-btn" data="`+id+`" > <i class="la la-trash text-white"></i></button></a>
                                                   </td>
                                               </tr>`;
                                               $(".lang-table tr:first").after(data);
                                               
                                                  location.reload();
                                             

                                              
                                               $(".edit-lang-staus-btn").click(function(){
                                               		var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:"inactive",

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           		console.log(response);
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:"active",

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
                                               });

					}
					else{
						alert(response.message);
					}
				}
			});
		}
		}

	});

	//edit language
	$(".edit-lang-btn").each(function(){
		$(this).click(function(){
			var id=$(this).attr("data");
			var tr=this.parentElement.parentElement;
			var td=tr.getElementsByTagName("TD");
			$("#lang-modal").modal("show");
			$(".lang-form input[name=lang]").val($(td[0]).html().trim());
			$(".lang-form").find("button").html("Update Language");
			$(".lang-form").find("button").attr("role","update")
			$(".lang-form").submit(function(e){
					e.preventDefault();
					var lang_name=$(".lang-form input[name=lang]").val();
	                  if($(this).find("button").attr("role")=="update"){
	                  		var input=$(this).find("input");
		var input_index=0;
		$(input).each(function(){
			if($(this).val().trim()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}else{
				input_index++;
			}
		});

		if(input.length==input_index){
			$.ajax({
				type:"POST",
				url:"/admin/update-lang",
				data:{
					lang:$(".lang-form input[name=lang]").val(),
					id:id,
					_token:$("body").attr("data"),
				},
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					if(response.message=="success"){
						alert("Language Updated Successfully");
						location.reload();
						$(".lang-form").trigger("reset");
						$(tr).addClass("animated flash bg-info text-white infinite");
					
						$(td[1]).html(lang_name);
						$("#lang-modal").modal("hide");
						setTimeout(function(){
							$(tr).removeClass("animated flash bg-info text-white infinite");
						},2000);
					}
					else{
						alert(response.message);

					}
				}
			});
		}
	                  }

			});

		});
	});
	//end edit language

	//language status change
	$(".lang-table .edit-lang-staus-btn").each(function(){
		$(this).click(function(){
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:"inactive",

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:"active",

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
		});
	});
	//edn cdoing of languae status change


});
//end cdoing of language page


//currency page coding start
$(document).ready(function(){
	$(".currency-form").submit(function(e){
		e.preventDefault();
		
		if(formvalid(this)){
			
			var formdata=new FormData(this);
			formdata.append("_token",$("body").attr("data"));
			$.ajax({
				type:"POST",
				url:"/admin/add-currency",
				data:formdata,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},
				success:function(response){
					console.log(response);
						$("#loader-modal").modal("hide");
					if(response.message=="success"){
						$("#currency-modal").modal("hide");
						if(response.data.status=="Active"){
							var button=`<a href="/admin/currency-status-update/update-status/`+btoa(response.data.id)+`"><button class="btn-success btn "  data="`+response.data.id+`">active</button></a>`;
						}
						else{
							var button=`<a href="/admin/currency-update/update-status/`+btoa(response.data.id)+`"><button class="btn-danger btn "  data="`+response.data.id+`">inactive</button></a>`;

						}
						var data=`<tr class="new-row-added">
                              <td>`+response.data.country_name+`</td>
                               <td>`+response.data.currency_name+`</td>
                                <td>`+response.data.symbol+`</td>
                                 <td>`+button+`</td>
                                  <td>
                                      <div class="d-flex justify-content-center align-items-center">
                                          <button class="btn-danger btn icon-btn mr-1 delete-currency-btn" data="`+response.data.id+`"><i class="la la-trash"></i></button>
                                          <button class="btn-success btn icon-btn edit-currency-btn"  data="`+response.data.id+`"><i class="la la-edit"></i></button>
                                      </div>
                                  </td>

                          </tr>`;

                          $(".currency-table tr:first").after(data);
                          //delete currency
                          $(".delete-currency-btn:first").click(function(){
                          	var id=$(this).attr("data");
                          		var tr=this.parentElement.parentElement.parentElement;
                          	$("#currency-delete-modal").modal("show");
			$(".confirm-delete-currency-btn").click(function(){
				$.ajax({
					type:"POST",
					url:"/admin/delete-currency",
					data:{
						id:id,
						_token:$("body").attr("data"),
					},
					success:function(response){
						if(response.message=="success"){
							$("#currency-delete-modal").modal("hide");
							$(tr).addClass("animated infinite flash bg-info text-white");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response);
						}
					}
				});
			});
                          });  
                          //end delete currency
                          //edit currency
                          $(".edit-currency-btn:first").click(function(){
			var id=$(this).attr("data");
			var tr=this.parentElement.parentElement.parentElement;
			var td=tr.getElementsByTagName("TD");

			$("#editCurrency").modal("show");
			$(".currency-update-form input[name=country_name]").val(td[0].innerHTML);
			$(".currency-update-form input[name=currency_name]").val(td[1].innerHTML);
			$(".currency-update-form input[name=symbol]").val(td[2].innerHTML);
			$(".currency-update-form input[name=status]").val(td[3].innerHTML);

			 $(".currency-update-form").submit(function(e){
			 	e.preventDefault();
			 	if(formvalid(this)){
			 		var formdata=new FormData(this);
			 		formdata.append("id",id);
			 		formdata.append("_token",$("body").attr("data"));
			 		$.ajax({
			 			type:"POST",
			 			url:"/admin/currency-update",
			 			data:formdata,
			 			processData:false,
			 			contentType:false,
			 			cache:false,
			 			beforeSend:function(){
			 					$("#loader-modal").modal("show");
			 			},
			 			success:function(response){
			 			
			 					$("#loader-modal").modal("hide");
			 				if(response.message=="success"){
			 					$("#editCurrency").modal("hide");
			 					$(tr).addClass("animated infinite flash bg-info text-white");
			 					$(td[0]).html($(".currency-update-form input[name=country_name]").val());
			 					$(td[1]).html($(".currency-update-form input[name=currency_name]").val());
			 					$(td[2]).html($(".currency-update-form input[name=symbol]").val());
			 					$(td[3]).html($(".currency-update-form input[name=status]").val());
			 					setTimeout(()=>{
			 						$(".currency-update-form").trigger("reset");
			 						$(tr).removeClass("animated infinite flash bg-info text-white");
			 						location.reload();
			 					},2000);
			 				}
			 				else{
			 					alert(response.message);
			 				}
			 			}
			 		});

			 	}

			 });
		});
                          //end edit currency           
                          $(".currency-form").trigger("reset");
                          $(".new-row-added").addClass("animated infinite flash bg-info");
                           $(".currency-message").addClass("text-success animated infinite flash");
                          $(".currency-message").html("<b>Successfully Country Currency Created</b>");

                          setTimeout(()=>{
                             $(".new-row-added").removeClass("animated infinite flash bg-info");
                          	
                          $(".currency-form").trigger("reset");
                           $(".currency-message").removeClass("text-success animated infinite flash");
                          $(".currency-message").html("");

                          },3000);
					}
				}
			});
		}
	});

	//edit currency 
	$(".edit-currency-btn").each(function(){
		$(this).click(function(){
			var id=$(this).attr("data");
			var tr=this.parentElement.parentElement.parentElement;
			var td=tr.getElementsByTagName("TD");

			$("#editCurrency").modal("show");
			$(".currency-update-form input[name=country_name]").val(td[0].innerHTML);
			$(".currency-update-form input[name=currency_name]").val(td[1].innerHTML);
			$(".currency-update-form input[name=symbol]").val(td[2].innerHTML);
			$(".currency-update-form input[name=status]").val(td[3].innerHTML);

			 $(".currency-update-form").submit(function(e){
			 	e.preventDefault();
			 	if(formvalid(this)){
			 		var formdata=new FormData(this);
			 		formdata.append("id",id);
			 		formdata.append("_token",$("body").attr("data"));
			 		$.ajax({
			 			type:"POST",
			 			url:"/admin/currency-update",
			 			data:formdata,
			 			processData:false,
			 			contentType:false,
			 			cache:false,
			 			beforeSend:function(){
			 					$("#loader-modal").modal("show");
			 			},
			 			success:function(response){
			 				
			 					$("#loader-modal").modal("hide");
			 				if(response.message=="success"){
			 					alert("Currency Updated Successfully");
			 					$("#editCurrency").modal("hide");
			 					$(tr).addClass("animated infinite flash bg-info text-white");
			 					$(td[0]).html($(".currency-update-form input[name=country_name]").val());
			 					$(td[1]).html($(".currency-update-form input[name=currency_name]").val());
			 					$(td[2]).html($(".currency-update-form input[name=symbol]").val());
			 					$(td[3]).html($(".currency-update-form input[name=status]").val());
			 					setTimeout(()=>{
			 						$(".currency-update-form").trigger("reset");
			 					
			 						window.location=location.href;
			 					},2000);
			 				}
			 				else{
			 					alert(response.message);
			 					
			 				}
			 			}
			 		});

			 	}

			 });
		});
	});
	//end currency page

	//delete currency
	$(".delete-currency-btn").each(function(){
		$(this).click(function(){
			var id=$(this).attr("data");
			var tr=this.parentElement.parentElement.parentElement;
			
			$("#currency-delete-modal").modal("show");
			$(".confirm-delete-currency-btn").click(function(){
				$.ajax({
					type:"POST",
					url:"/admin/delete-currency",
					data:{
						id:id,
						_token:$("body").attr("data"),
					},
					success:function(response){
						if(response.message=="success"){
							$("#currency-delete-modal").modal("hide");
							$(tr).addClass("animated infinite flash bg-info text-white");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response);
						}
					}
				});
			});
		});
	});
	//end delete currency
});
//end coding of currency page

//start coding of activity page
//create activity
$(document).ready(function(){
	$("#select-region").on("change",function(){

		if($(this).val()=="Select Region"){
			

		}
		else{
			
			$.ajax({
			type:"POST",
			url:"/admin/get-city-for-activity",
			data:{
				id:this.value,
				_token:$("body").attr("data"),
			},
			beforeSend:function(){
					$("#loader-modal").modal("show");
			},
			success:function(response){
					$("#loader-modal").modal("hide");
				if(response.message=="success"){
					if(response.data.length>0){
						$(".select-activity-city").empty();
						var option1=document.createElement("OPTION");
						option1.value="0";
						option1.innerHTML="Select City";
						$(".select-activity-city").append(option1);
						
						$(response.data).each(function(i,data){
							var option=document.createElement("OPTION");
							option.value=data.id;
							option.innerHTML=data.ville;
							$(".select-activity-city").append(option);
						});
					}
				}
			}
		});
		}
	});
	$(".activity-form").submit(function(e){
		e.preventDefault();
		var editor_index=0;
		var editor=$(".activity-form .ql-editor1");
		$(editor).each(function(){
			if($(this).hasClass("ql-blank")){
				var attr=$(this).parent().attr("data");
				if($(this).parent().parent().next().is("span")==false){
					$(this).parent().parent().after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+attr+" is can`t be empty</span>");
				    $(this).parent().on("input",function(){
				    	$(this).parent().next("span").remove();
				    });
				}
			}
			else{
				editor_index++;
			}
			
			
		});
	 
		
		
			var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val()==""){
				if($(this).next().is("span")==false){
						var attr=$(this).attr("placeholder");
						$(this).after("<span class='text-danger p-font'><i class='la la-warning'></i> "+attr+ " can`t be empty</span>");
					    $(this).addClass("input-place");
					    $(this).on("input",function(){
					$(this).removeClass("input-place");
					$(this).next("span").remove();

				});
					}
				
				
			}else{
				input_index++;
			}
		});

			var select=$(this).find("select.require");
		var select_index=0;
			$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){
          
				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" </span>");
				  $(this).css({
					border:"1px solid red",
				});
				$(this).on("change",function(){
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});

				});
			}
		}
		else{
			select_index++;
		}
	});
		var data=new FormData($(".activity-form")[0]);
	data.append("departure_details",$(".activity-form .departure_details .ql-editor").html());
	data.append("return_detail",$(".activity-form .return_detail .ql-editor").html());
	data.append("cancel_policy",$(".activity-form .cancel_policy .ql-editor").html());
	data.append("description",$(".activity-form .desc .ql-editor").html());
	data.append("highlight",$(".activity-form .highlight .ql-editor").html());
	data.append("know_more",$(".activity-form .know-more .ql-editor").html());
	data.append("inclusion",$(".activity-form .inclusion .ql-editor").html());
	data.append("exclusion",$(".activity-form .exclusion .ql-editor").html());
	data.append("add_info",$(".activity-form .add-info .ql-editor").html());
	data.append("_token",$("body").attr("data"));
	
	   console.log(data);

	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			$.ajax({
				type:"POST",
				url:"/admin/activity-data",
				data:data,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");

					console.log(response);
					

				if(response.message=="required"){
					if( $(".activity-form input[name=activity_name]").next().is("span")==false){
						 $(".activity-form input[name=activity_name]").after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+response.error.activity_name[0]+"</span>");

						 $(".activity-form input[name=activity_name]").on("input",function(){
						 	$(this).next("span").remove();
						 });
					}
					if( $(".activity-form input[name=activity_image]").next().is("span")==false){
						 $(".activity-form input[name=activity_image]").after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+response.error.activity_image[0]+"</span>");

						 $(".activity-form input[name=activity_image]").on("input",function(){
						 	$(this).next("span").remove();
						 });
					}
					if( $(".activity-form input[name=activity_date]").next().is("span")==false){
						 $(".activity-form input[name=activity_date]").after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+response.error.activity_date[0]+"</span>");

						 $(".activity-form input[name=activity_date]").on("input",function(){
						 	$(this).next("span").remove();
						 });
					}

					$(".activity-message").removeClass("d-none");
					$(".activity-message").addClass("alert-danger animated flash p-font");

					$(".activity-message span").html("<b>All filed is required</b>");
					setTimeout(()=>{
						$(".activity-message").addClass("d-none");
					$(".activity-message").removeClass("alert-danger animated flash p-font");

					$(".activity-message span").html("");

					},5000);
					
				}

				if(response.message=="success"){
					$(".activity-message").removeClass("d-none");
					$(".activity-message").addClass("alert-success animated flash p-font");

					$(".activity-message span").html("<b>Culture Activity Create Successfully</b>");
					setTimeout(()=>{
						$(".activity-message").addClass("d-none");
					$(".activity-message").removeClass("alert-success animated flash p-font");

					$(".activity-message span").html("");

					$(".activity-form").trigger("reset");

					},2000);
					
				}
				else{
					$(".activity-message").removeClass("d-none");
					$(".activity-message").addClass("alert-warning animated flash p-font");

					$(".activity-message span").html("<b>"+response.message+"</b>");
					setTimeout(()=>{
						$(".activity-message").addClass("d-none");
					$(".activity-message").removeClass("alert-warning animated flash p-font");

					$(".activity-message span").html("");

					},2000);
				}
				
				},
				error(response){
					console.log(response);
				}
			});
		}
		else{
			alert("All filed is required");
		}
		

	});

	//update activity
	$(".update-activity-form").submit(function(e){
		e.preventDefault();
		var editor_index=0;
		var editor=$(".update-activity-form .ql-editor1");
		$(editor).each(function(){
			if($(this).hasClass("ql-blank")){
				var attr=$(this).parent().attr("data");
				if($(this).parent().parent().next().is("span")==false){
					$(this).parent().parent().after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+attr+" is can`t be empty</span>");
				    $(this).parent().on("input",function(){
				    	$(this).parent().next("span").remove();
				    });
				}
			}
			else{
				editor_index++;
			}
			
			
		});
	 
		
		
			var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val()==""){
				if($(this).next().is("span")==false){
						var attr=$(this).attr("placeholder");
						$(this).after("<span class='text-danger p-font'><i class='la la-warning'></i> "+attr+ " can`t be empty</span>");
					    $(this).addClass("input-place");
					    $(this).on("input",function(){
					$(this).removeClass("input-place");
					$(this).next("span").remove();

				});
					}
				
				
			}else{
				input_index++;
			}
		});

			var select=$(this).find("select.require");
		var select_index=0;
			$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){
          
				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" </span>");
				  $(this).css({
					border:"1px solid red",
				});
				$(this).on("change",function(){
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});

				});
			}
		}
		else{
			select_index++;
		}
	});
				var data=new FormData($(".update-activity-form")[0]);
	data.append("departure_details",$(".update-activity-form .departure_details .ql-editor").html());
	data.append("return_detail",$(".update-activity-form .return_detail .ql-editor").html());
	data.append("cancel_policy",$(".update-activity-form .cancel_policy .ql-editor").html());
	data.append("description",$(".update-activity-form .desc .ql-editor").html());
	data.append("highlight",$(".update-activity-form .highlight .ql-editor").html());
	data.append("know_more",$(".update-activity-form .know-more .ql-editor").html());
	data.append("inclusion",$(".update-activity-form .inclusion .ql-editor").html());
	data.append("exclusion",$(".update-activity-form .exclusion .ql-editor").html());
	data.append("add_info",$(".update-activity-form .add-info .ql-editor").html());
	data.append("_token",$("body").attr("data"));
		
		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			$.ajax({
				type:"POST",
				url:"/admin/activity-update-data",
				data:data,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					console.log(response);
					

				if(response.message=="required"){
					if( $(".activity-form input[name=activity_name]").next().is("span")==false){
						 $(".activity-form input[name=activity_name]").after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+response.error.activity_name[0]+"</span>");

						 $(".activity-form input[name=activity_name]").on("input",function(){
						 	$(this).next("span").remove();
						 });
					}
					if( $(".activity-form input[name=activity_image]").next().is("span")==false){
						 $(".activity-form input[name=activity_image]").after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+response.error.activity_image[0]+"</span>");

						 $(".activity-form input[name=activity_image]").on("input",function(){
						 	$(this).next("span").remove();
						 });
					}
					if( $(".activity-form input[name=activity_date]").next().is("span")==false){
						 $(".activity-form input[name=activity_date]").after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+response.error.activity_date[0]+"</span>");

						 $(".activity-form input[name=activity_date]").on("input",function(){
						 	$(this).next("span").remove();
						 });
					}

					$(".activity-message").removeClass("d-none");
					$(".activity-message").addClass("alert-danger animated flash p-font");

					$(".activity-message span").html("<b>All filed is required</b>");
					setTimeout(()=>{
						$(".activity-message").addClass("d-none");
					$(".activity-message").removeClass("alert-danger animated flash p-font");

					$(".activity-message span").html("");

					},5000);
					
				}

				if(response.message=="success"){
					$(".activity-message").removeClass("d-none");
					$(".activity-message").addClass("alert-success animated flash p-font");

					$(".activity-message span").html("<b>Culture Activity Updated Successfully</b>");
					setTimeout(()=>{
						$(".activity-message").addClass("d-none");
					$(".activity-message").removeClass("alert-success animated flash p-font");

					$(".activity-message span").html("");

					$(".activity-form").trigger("reset");
					window.location.href="/admin/view-activity";

					},2000);
					
				}
				else{
					$(".activity-message").removeClass("d-none");
					$(".activity-message").addClass("alert-warning animated flash p-font");

					$(".activity-message span").html("<b>"+response.message+"</b>");
					setTimeout(()=>{
						$(".activity-message").addClass("d-none");
					$(".activity-message").removeClass("alert-warning animated flash p-font");

					$(".activity-message span").html("");

					},2000);
				}
				
				},
				error(response){
					console.log(response);
				}
			});
		}
		else{
			alert("All filed is required");
		}
		

	});
	//end coding of update activity

	//start coding of delete activity
	$(".delete-activity-btn").each(function(){
		$(this).click(function(){
			var tr=this.parentElement.parentElement.parentElement;

			if(confirm("Are You Sure")){
				$.ajax({
					type:"POST",
					url:"/admin/delete-activity",
					data:{
						id:$(this).attr("data"),
						_token:$("body").attr("data"),
					},
					
					success:function(response){
						if(response=="success"){
							$(tr).addClass("animated infinite flash bg-info text-white");
							setTimeout(()=>{
							$(tr).remove();	
							},2000);
						}
						else{
							alert(response);
						}
					}
				});
			}
		});
	});
	//end cdoing of delete activity

	//edit activity status functionality
	
	$(".edit-activity-status-btn").each(function(){
		$(this).click(function(){
		
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
				$.ajax({
					type:"POST",
					url:"/admin/activity-status",
					data:{
						id:id,
						status:0,
						_token:$("body").attr("data"),
					},
					beforeSend:function(){
							$(btn).html("Processing");
								$(btn).attr("disabled",true);
									$("#loader-modal").modal("show");
					},
					success:function(response){
							$("#loader-modal").modal("hide");
						$(btn).attr("disabled",false);
						if(response.message=="success"){
							$(btn).removeClass("btn-success");
							$(btn).addClass("btn-danger");
							$(btn).html("inactive");
							$(btn).attr("status",0);
						}
						else{
							alert(response.message);
						}
					}
				});
			}
			else{
				$.ajax({
					type:"POST",
					url:"/admin/activity-status",
					data:{
						id:id,
						status:1,
						_token:$("body").attr("data"),
					},
					beforeSend:function(){
							$(btn).html("Processing");
								$(btn).attr("disabled",true);
									$("#loader-modal").modal("show");
					},
					success:function(response){
							$("#loader-modal").modal("hide");
						
							$(btn).attr("disabled",false);
						if(response.message=="success"){
							$(btn).removeClass("btn-danger");
							$(btn).addClass("btn-success");
							$(btn).html("active");
							$(btn).attr("status",1);
						}
						else{
							alert(response.message);
						}
					}
				});
			}
		});
	});
	//edn edit activity status functionality
});
//end create activity
//end coding of activity

//start coding of thing to do
//create thing to do
$(document).ready(function(){
	$(".select-region-thing-to-do").on("change",function(){
		$.ajax({
			type:"POST",
			url:"/admin/fetch_city",
			data:{
				id:this.value,
				_token:$("body").attr("data"),
			},
			beforeSend:function(){
				$("#loader-modal").modal("show");
			},
			success:function(response){
				$("#loader-modal").modal("hide");

				  if(response.message=="success"){
				  	$(".select-city-thing-to-do").html("");
				  	var option1=document.createElement("OPTION");
				  	option1.innerHTML="Select City";
				  	option1.value="0";
				  	$(".select-city-thing-to-do").append(option1);
				  	  if(response.data.length>0){
				  	  	$(response.data).each(function(i,data){
				  	  		var option=document.createElement("OPTION");
				  	  		option.value=data.id;
				  	  		option.innerHTML=data.ville;
				  	  		$(".select-city-thing-to-do").append(option);


				  	  	});
				  	  }
				  }
			}
		});
	});
});
$(".thing-to-do-form").submit(function(e){
		e.preventDefault();
		var editor_index=0;
		var editor=$(".thing-to-do-form .ql-editor1");
		$(editor).each(function(){
			if($(this).hasClass("ql-blank")){
				var attr=$(this).parent().attr("data");
				if($(this).parent().parent().next().is("span")==false){
					$(this).parent().parent().after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+attr+" is can`t be empty</span>");
				    $(this).parent().on("input",function(){
				    	$(this).parent().next("span").remove();
				    });
				}
			}
			else{
				editor_index++;
			}
			
			
		});
	 
		
		
			var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val()==""){
				if($(this).next().is("span")==false){
						var attr=$(this).attr("placeholder");
						$(this).after("<span class='text-danger p-font'><i class='la la-warning'></i> "+attr+ " can`t be empty</span>");
					    $(this).addClass("input-place");
					    $(this).on("input",function(){
					$(this).removeClass("input-place");
					$(this).next("span").remove();

				});
					}
				
				
			}else{
				input_index++;
			}
		});

			var select=$(this).find("select.require");
		var select_index=0;
			$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){
          
				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" </span>");
				  $(this).css({
					border:"1px solid red",
				});
				$(this).on("change",function(){
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});

				});
			}
		}
		else{
			select_index++;
		}
	});

	var data=new FormData($(".thing-to-do-form")[0]);
	data.append("departure_details",$(".thing-to-do-form .departure_details .ql-editor").html());
	data.append("return_detail",$(".thing-to-do-form .return_detail .ql-editor").html());
	data.append("cancel_policy",$(".thing-to-do-form .cancel_policy .ql-editor").html());
	data.append("description",$(".thing-to-do-form .desc .ql-editor").html());
	data.append("highlight",$(".thing-to-do-form .highlight .ql-editor").html());
	data.append("know_more",$(".thing-to-do-form .know-more .ql-editor").html());
	data.append("inclusion",$(".thing-to-do-form .inclusion .ql-editor").html());
	data.append("exclusion",$(".thing-to-do-form .exclusion .ql-editor").html());
	data.append("add_info",$(".thing-to-do-form .add-info .ql-editor").html());
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/thing-to-do-data",
				data:data,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$("#loader-modal").modal("show");
				},
				success:function(response){
					$("#loader-modal").modal("hide");
					console.log(response);
					 if(response.message=="success"){
					 	alert("Things to do Created Successfully");
					 		window.location.href="/admin/view-thing-to-do";
					 }
					 else{
					 	alert(response.message);
					 }
					},
					error:function(response){
						console.log(response);
					}
			});
			}
			else{
				alert("Description can`t be empty");
			}
		}
		else{
			alert("All filed is required");
		}
		

	});
//end create Thing to do
//update hing to do
$(".update-thing-to-do-form").submit(function(e){
		e.preventDefault();

		
		var editor_index=0;
		var editor=$(".update-thing-to-do-form .ql-editor1");
		$(editor).each(function(){
			if($(this).hasClass("ql-blank")){
				var attr=$(this).parent().attr("data");
				if($(this).parent().parent().next().is("span")==false){
					$(this).parent().parent().after("<span class='text-danger p-font'><i class='la la-exclamation-circle'></i> "+attr+" is can`t be empty</span>");
				    $(this).parent().on("input",function(){
				    	$(this).parent().next("span").remove();
				    });
				}
			}
			else{
				editor_index++;

			}
			
			
		});
	 
		
		
			var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val()==""){
				if($(this).next().is("span")==false){
						var attr=$(this).attr("placeholder");
						$(this).after("<span class='text-danger p-font'><i class='la la-warning'></i> "+attr+ " can`t be empty</span>");
					    $(this).addClass("input-place");
					    $(this).on("input",function(){
					$(this).removeClass("input-place");
					$(this).next("span").remove();

				});
					}
				
				
			}else{
				input_index++;
			}
		});


			var select=$(this).find("select.require");
		var select_index=0;
			$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){
          
				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" </span>");
				  $(this).css({
					border:"1px solid red",
				});
				$(this).on("change",function(){
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});

				});
			}
		}
		else{
			select_index++;
		}
	});
		



        var data=new FormData($(".update-thing-to-do-form")[0]);
	data.append("departure_details",$(".update-thing-to-do-form .departure_details .ql-editor").html());
	data.append("return_detail",$(".update-thing-to-do-form .return_detail .ql-editor").html());
	data.append("cancel_policy",$(".update-thing-to-do-form .cancel_policy .ql-editor").html());
	data.append("description",$(".update-thing-to-do-form .desc .ql-editor").html());
	data.append("highlight",$(".update-thing-to-do-form .highlight .ql-editor").html());
	data.append("know_more",$(".update-thing-to-do-form .know-more .ql-editor").html());
	data.append("inclusion",$(".update-thing-to-do-form .inclusion .ql-editor").html());
	data.append("exclusion",$(".update-thing-to-do-form .exclusion .ql-editor").html());
	data.append("add_info",$(".update-thing-to-do-form .add-info .ql-editor").html());
	data.append("_token",$("body").attr("data"));
		
		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
		
				
			
			
			
			$.ajax({
				type:"POST",
				url:"/admin/thing-to-do-update-data",
				data:data,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$("#loader-modal").modal("show");
				},
				success:function(response){
					$("#loader-modal").modal("hide");
				
					console.log(response);
					 if(response=="success"){
					 	$(".message").html("<div class='alert alert-success'>Thing To Do Updated Successfully</div>");
					 		setTimeout(()=>{
					 			window.location.href="/admin/view-thing-to-do";
					 		},2000);
					 }
					 else{
					 	$(".message").html("<div class='alert alert-success'>Whoops! something to do</div>");
					 }
					},
					error:function(response){
						
					}
			});
			}
			else{
				alert("All filed is required");
			}
		
		

	});
//end thing to do

//end coding of thing to do

//why triplooky

//start coding of thing to do
//create thing to do
$(".triplooky-form").submit(function(e){
		e.preventDefault();
		
		
			var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val().trim()==""){
				$(this).addClass("input-place");
				$(this).on("input",function(){
					$(this).removeClass("input-place");
				});
			}else{
				input_index++;
			}
		});
	

		if(input.length==input_index){
			
			if(!$(".triplooky-form .desc .ql-editor").hasClass("ql-blank")){
				var formdata=new FormData(this);
			formdata.append("_token",$("body").attr("data"));
			formdata.append("desc",$(".triplooky-form .desc .ql-editor").html().trim());
			
			$.ajax({
				type:"POST",
				url:"/admin/triplooky-data",
				data:formdata,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$("#loader-modal").modal("show");
				},
				success:function(response){
					$("#loader-modal").modal("hide");
					console.log(response);
					 if(response.message=="success"){
					 	alert("Whu use Triplooky  Created Successfully");
					 		window.location.href="/admin/view-triplooy-use";
					 }
					 else{
					 	alert(response.message);
					 }
					}
			});
			}
			else{
				alert("Description can`t be empty");
			}
		}
		

	});
//end create Thing to do
//update hing to do
$(".update-why-triplooky-form").submit(function(e){
		e.preventDefault();
		
		
			var input=$(".update-why-triplooky-form input.require");
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
		

		if(1){
			
			if(!$(".update-why-triplooky-form .desc .ql-editor").hasClass("ql-blank")){
				var formdata=new FormData(this);
			formdata.append("_token",$("body").attr("data"));
			formdata.append("desc",$(".update-why-triplooky-form .desc .ql-editor").html().trim());
			
			$.ajax({
				type:"POST",
				url:"/admin/why-triplooky-update-data",
				data:formdata,
				contentType:false,
				processData:false,
				cache:false,
				success:function(response){
					console.log(response);
					 if(response=="success"){
					 	alert("Why Triplooky Updated Successfully");
					 	window.location.href="/admin/view-triplooy-use";
					 }
					 else{
					 	alert(response);
					 }
					},
					error:function(response){
						console.log(response);
					}
			});
			}
			else{
				alert("Description can`t be empty");
			}
		}
		

	});
//end thing to do

//end coding of thing to do


//start coding of page travel looking partner 
$(document).ready(function(){
	$(".travel-looking-partner").submit(function(e){
		e.preventDefault();
			var input=$(".travel-looking-partner input.require");
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

		var formdata=new FormData(this);
		formdata.append("desc",$(".partner .ql-editor").html());
		$.ajax({
			type:"POST",
			url:"/admin/add-trave-looking-partner-data",
			data:formdata,
			  contentType:false,
		     processData:false,
		     cache:false,
		    beforeSend:function(){
		    	$(this).find("button").html("Please Wait We Processing....");
		    	$(this).find("button").attr("disabled",true);
		    		$("#loader-modal").modal("show");
       
		    },

		    success:function(response){
		    		$("#loader-modal").modal("hide");
		   
		    	if(response.message=="success"){
            var message="<div class='alert alert-success p-font'>Successfully Travel Looking Partner Created<i class='la la-close close' data-dismiss='alert'></i></div>";
		    		$(".message").html(message);
		    		setTimeout(()=>{
		    			$(".message").html("");
		    			$(".travel-looking-partner").trigger("reset");

		    		},2000);
		    	}
		    	else{
		    		var message="<div class='alert alert-warning'>"+response.message +"<i class='la la-close close' data-dismiss='alert'></i></div>";
		    		$(".message").html(message);
		    		setTimeout(()=>{
		    			$(".message").html("");
		    		},2000);
		    	}
		    }


		});

		




	});


	//edit functionality
	
	$(".travel-looking-partner-status-btn").each(function(){
		$(this).click(function(){
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;

			if(status==1){
				$.ajax({
					type:"POST",
					url:"/admin/trave-looking-partner-status",
					data:{
						id:id,
						status:"inactive",
						_token:$("body").attr("data"),
					},
					beforeSend:function(){
							$(btn).html("Process");
								$(btn).attr("disabled",true);
									$("#loader-modal").modal("show");
					},
					success:function(response){
							$("#loader-modal").modal("hide");
						$(btn).attr("disabled",false);
						if(response.message=="success"){
							$(btn).removeClass("btn-success");
							$(btn).addClass("btn-danger");
							$(btn).html("inactive");
							$(btn).attr("status",0);
						}
						else{
							alert(response.message);
						}
					}
				});
			}
			else{
				$.ajax({
					type:"POST",
					url:"/admin/trave-looking-partner-status",
					data:{
						id:id,
						status:"active",
						_token:$("body").attr("data"),
					},
					beforeSend:function(){
							$(btn).html("Process");
								$(btn).attr("disabled",true);
									$("#loader-modal").modal("show");
					},
					success:function(response){
							$("#loader-modal").modal("hide");
						
							$(btn).attr("disabled",false);
						if(response.message=="success"){
							$(btn).removeClass("btn-danger");
							$(btn).addClass("btn-success");
							$(btn).html("active");
							$(btn).attr("status",1);
						}
						else{
							alert(response.message);
						}
					}
				});
			}
		});
	});
	//edn edit functionality

	//delete functionality
	$(".delete-travel-looking-partner-btn").each(function(){
		$(this).click(function(){
			var id=$(this).attr("data");
		var tr=this.parentElement.parentElement.parentElement;

		if(confirm("Are You Sure")){
			$.ajax({
				type:"POST",
				url:"/admin/delete-travel-looking-parter",
				data:{
					id:id,
					_token:$("body").attr("data"),
				},
				success:function(response){
					if(response.message=="success"){
					alert("Successfully delete");
					tr.remove();
					}
					else{
						alert(response.message);
					}

				}

			});
		}
		});
	});
	//end delete functionality

	//edit 
	$(".update-travel-looking-partner input[name=partner-company-logo]").on("change",function(){
		var file=this.files[0];
		var url=URL.createObjectURL(file);
		$(".update-travel-looking-partner img").attr("src",url);
	});


	$(".update-travel-looking-partner").submit(function(e){
		e.preventDefault();
			var input=$(".update-travel-looking-partner input.require");
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

		var formdata=new FormData(this);
		formdata.append("desc",$(".partner .ql-editor").html());
		$.ajax({
			type:"POST",
			url:"/admin/update-travel-looking-partner-data",
			data:formdata,
			  contentType:false,
		     processData:false,
		     cache:false,
		    beforeSend:function(){
		    	$(this).find("button").html("Please Wait We Processing....");
		    	$(this).find("button").attr("disabled",true);
		    		$("#loader-modal").modal("show");
       
		    },

		    success:function(response){
		    	console.log(response);
		       	$("#loader-modal").modal("hide");
		    	if(response.message=="success"){
            var message="<div class='alert alert-success p-font'>Successfully Updated Travel Looking Partner<i class='la la-close close' data-dismiss='alert'></i></div>";
		    		$(".message").html(message);
		    		setTimeout(()=>{
		    			$(".message").html("");
		    			$(".travel-looking-partner").trigger("reset");

		    		},2000);
		    	}
		    	else{
		    		var message="<div class='alert alert-warning'>"+response.message +"<i class='la la-close close' data-dismiss='alert'></i></div>";
		    		$(".message").html(message);
		    		setTimeout(()=>{
		    			$(".message").html("");
		    		},2000);
		    	}
		    }


		});

		




	});
	//end edit
});
//end coding of page travel looking partner


//city page coding start
$(document).ready(function(){
	$(".city-form").submit(function(e){
		e.preventDefault();
		if(formvalid(this)){
			$.ajax({
				type:"POST",
				url:"/admin/add-city-data",
				data:new FormData(this),
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$(this).find("button").html("Please Wait...");
					$(this).find("button").attr("disabled",true);
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					if(response.status=="success"){
						$(".city-form .message").html(response.message);
						setTimeout(function(){
							$(".city-form .message").html("");
							$(".city-form").trigger("reset");

						},3000);
					}
					else{
						$(".city-form .message").html(response.message);
						setTimeout(function(){
							$(".city-form .message").html("");

						},3000);

					}
				}

			});
		}

	});

	//edit status of city
	$(".city-status-btn").each(function(){
		$(this).click(function(){
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-city-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:0,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-city-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:1,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
		});
	});
	//end edit status of city

	//delete city
	
		

		
		$(".delete-city-btn").click(function(){
			var btn=this;
			var tr=this.parentElement.parentElement.parentElement;
			$("#city-delete-modal").modal("show");
			$(".confirm-delete-city-btn").click(function(){
				$.ajax({
					type:"POST",
					url:"/admin/delete-city",
					data:{
                     id:$(btn).attr("data"),
                     _token:$("body").attr("data"),

					},
					success:function(response){
						if(response.message=="success"){
							$("#city-delete-modal").modal("hide");
							$(tr).addClass("bg-info animated flash text-white infinite");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response.message);
						}

					}
				});
			});
		});

	//end delete city

	//edit edit city coding
	// 	$(".update-city-form-data").submit(function(e){
	// 	e.preventDefault();
	// 	if(formvalid(1)){
	// 		$.ajax({
	// 			type:"POST",
	// 			url:"/admin/update-city-data",
	// 			data:new FormData(this),
	// 			contentType:false,
	// 			processData:false,
	// 			cache:false,
	// 			beforeSend:function(){
	// 				$(this).find("button").html("Please Wait...");
	// 				$(this).find("button").attr("disabled",true);
	// 					$("#loader-modal").modal("show");
	// 			},
	// 			success:function(response){
	// 					$("#loader-modal").modal("hide");
	// 				if(response.status=="success"){
	// 					$(".update-city-form .message").html(response.message);
	// 					setTimeout(function(){
	// 						$(".update-city-form .message").html("");
	// 						$(".update-city-form").trigger("reset");
	// 						window.location.href="/admin/view-city";

	// 					},3000);
	// 				}
	// 				else{
	// 					$(".update-city-form .message").html(response.message);
	// 					setTimeout(function(){
	// 						$(".update-city-form .message").html("");

	// 					},3000);

	// 				}
	// 			}

	// 		});
	// 	}

	// })
	//edn edit city coding
});
//end coding of city page 


//start coding of region
//city page coding start
$(document).ready(function(){
	$(".region-form").submit(function(e){
		e.preventDefault();
		alert();
		if(formvalid(this)){
			$.ajax({
				type:"POST",
				url:"/admin/add-region-data",
				data:new FormData(this),
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$(this).find("button").html("Please Wait...");
					$(this).find("button").attr("disabled",true);
						$("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					if(response.status=="success"){
						$(".region-form .message").html(response.message);
						setTimeout(function(){
							$(".region-form .message").html("");
							$(".region-form").trigger("reset");

						},3000);
					}
					else{
						$(".region-form .message").html(response.message);
						setTimeout(function(){
							$(".region-form .message").html("");

						},3000);

					}
				}

			});
		}

	});

	//edit status of city
	$(".city-status-btn").each(function(){
		$(this).click(function(){
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-city-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:0,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-city-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:1,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
              	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
		});
	});
	//end edit status of city

	//delete city
	
		

		
		$(".delete-city-btn").click(function(){
			var btn=this;
			var tr=this.parentElement.parentElement.parentElement;
			$("#city-delete-modal").modal("show");
			$(".confirm-delete-city-btn").click(function(){
				$.ajax({
					type:"POST",
					url:"/admin/delete-city",
					data:{
                     id:$(btn).attr("data"),
                     _token:$("body").attr("data"),

					},
					success:function(response){
						if(response.message=="success"){
							$("#city-delete-modal").modal("hide");
							$(tr).addClass("bg-info animated flash text-white infinite");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response.message);
						}

					}
				});
			});
		});

	//end delete city

	});

	//edit edit city coding
		$(".update-city-form").submit(function(e){
		e.preventDefault();
		if(formvalid(this)){
			$.ajax({
				type:"POST",
				url:"/admin/update-city-data",
				data:new FormData(this),
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$(this).find("button").html("Please Wait...");
					$(this).find("button").attr("disabled",true);
				},
				success:function(response){
					if(response.status=="success"){
						$(".update-city-form .message").html(response.message);
						setTimeout(function(){
							$(".update-city-form .message").html("");
							$(".update-city-form").trigger("reset");
							window.location.href="/admin/view-city";

						},3000);
					}
					else{
						$(".update-city-form .message").html(response.message);
						setTimeout(function(){
							$(".update-city-form .message").html("");

						},3000);

					}
				}

			});
		}

	})
	//edn edit city coding
//end coding of region 


//activity gallery image page
$(document).ready(function(){
	
	$(".activity-gallery-form").submit(function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"/admin/activity-gallery-data",
			data:new FormData(this),
			contentType:false,
			processData:false,
			cache:false,
			success:function(response){
				if(response=="success"){
					alert("Activity Gallery Successfully Created");
					$(".activity-gallery-form").trigger("reset");
				}
				else{
					alert(response);
				}
			}
		});

	});
});
//end activity gallery image

//show activity gallery 
$(".activity-name-gallery").on("change",function(){
	$.ajax({
		type:"POST",
		url:"/admin/show-activity-gallery",
		data:{
			activity_id:$(this).val(),
			_token:$("body").attr("data"),
		},
		success:function(response){
			if(response.data.length>0){
				$(response.data).each(function(i,data){
					var tr=document.createElement("TR");
					var td1=document.createElement("TD");
					var td2=document.createElement("TD");
					var td3=document.createElement("TD");
					var td4=document.createElement("TD");
					var td5=document.createElement("TD");
					td1.innerHTML=i+1;
					td2.innerHTML=response.activity_name;
					var image=document.createElement("IMG");
					image.src="http://127.0.0.1:8000/Activity Gallery/"+response.activity_name+"/"+data.image;
					 image.width="100";
					$(td3).append(image);
					if(data.status==1){
						td4.innerHTML=`<button class="btn btn-success shadow-none activity-gallery-status-btn" data="`+data.id+`" status="1">Active</button>`;
					}
					else{
						td4.innerHTML=`<button class="btn btn-danger shadow-none activity-gallery-status-btn" data="`+data.id+`" status="0">inctive</button>`;
					}

					td5.innerHTML=`<div class="d-flex justify-content-center align-items-center">
                                                        <a href="/admin/edit-activity-gallery/`+data.id+`"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <button class="icon-btn delete-activity-gallery-btn btn-danger text-white shadow-none" data="`+data.id+`"><i class="la la-trash"></i></button>
                                                    </div>`;



					$(tr).append(td1);
					$(tr).append(td2);
					$(tr).append(td3);
					$(tr).append(td4);
					$(tr).append(td5);
					$(".view-activity-gallery-table").append(tr);



				});
				//edit status of activity gallery
				$(".activity-gallery-status-btn").click(function(){
					
						
	
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-activity-gallery-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:0,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
           	},
           	success:function(response){
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-activity-gallery-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:1,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
           	},
           	success:function(response){
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
	
	
	//end edit status of actvity-gallery
					
					});

				//delete activity gallery
$(".delete-activity-gallery-btn").click(function(){
	var btn=this;
			var tr=this.parentElement.parentElement.parentElement;
	
	$("#activity-gallery-delete-modal").modal("show");
	$(".confirm-delete-activity-gallery-btn").click(function(){

		$.ajax({
					type:"POST",
					url:"/admin/delete-activity-gallery",
					data:{
                     id:$(btn).attr("data"),
                     _token:$("body").attr("data"),

					},
					success:function(response){
						if(response.message=="success"){
							$("#activity-gallery-delete-modal").modal("hide");
							$(tr).addClass("bg-info animated flash text-white infinite");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response.message);
						}

					}
				});
	});
});
//end delete gallery
			

			}
			else{
				alert("This Active Have No Gallery Image");
			}
		}
	});
});
//end show activity gallery 

//update activity gallery
$(".update-activity-gallery-form").submit(function(e){
	e.preventDefault();
	$.ajax({
			type:"POST",
			url:"/admin/activity-gallery-update-data",
			data:new FormData(this),
			contentType:false,
			processData:false,
			cache:false,
			success:function(response){
			
				if(response.message=="success"){
					alert("Activity Gallery Successfully Updated");
					$(".activity-gallery-form").trigger("reset");
					window.location.href="/admin/view-gallery-photo";
				}
				else{
					alert(response.message);
					
				}
			}
		});

	
	
});
//end update activity gallery


// thing to do gallery page coding
//activity gallery image page
$(document).ready(function(){
	
	$(".thing-to-do-gallery-form").submit(function(e){
		e.preventDefault();
		$.ajax({
			type:"POST",
			url:"/admin/thing-to-do-gallery-data",
			data:new FormData(this),
			contentType:false,
			processData:false,
			cache:false,
			success:function(response){
				if(response=="success"){
					alert("Thing to do Gallery Successfully Created");
					$(".thing-to-do-gallery-form").trigger("reset");
				}
				else{
					alert(response);
					console.log(response);
				}
			},
			error(response,xhr,error){
				console.log(response.responseText);
				console.log(xhr);
				console.log(error);
			}
		});

	});
});
//end activity gallery image

//show activity gallery 
$(".thing-to-do-name-gallery").on("change",function(){
	$.ajax({
		type:"POST",
		url:"/admin/show-thing-gallery",
		data:{
			heading_id:$(this).val(),
			_token:$("body").attr("data"),
		},
		success:function(response){
			if(response.data.length>0){
				$(response.data).each(function(i,data){
					var tr=document.createElement("TR");
					var td1=document.createElement("TD");
					var td2=document.createElement("TD");
					var td3=document.createElement("TD");
					var td4=document.createElement("TD");
					var td5=document.createElement("TD");
					td1.innerHTML=i+1;
					td2.innerHTML=response.heading_name;
					var image=document.createElement("IMG");
					image.src="http://127.0.0.1:8000/Thing-to-do-gallery/"+response.heading_name+"/"+data.image;
					 image.width="100";
					$(td3).append(image);
					if(data.status==1){
						td4.innerHTML=`<button class="btn btn-success shadow-none thing-gallery-status-btn" data="`+data.id+`" status="1">Active</button>`;
					}
					else{
						td4.innerHTML=`<button class="btn btn-danger shadow-none thing-gallery-status-btn" data="`+data.id+`" status="0">inctive</button>`;
					}

					td5.innerHTML=`<div class="d-flex justify-content-center align-items-center">
                                                        <a href="/admin/edit-thing-gallery/`+data.id+`"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <button class="icon-btn delete-thing-gallery-btn btn-danger text-white shadow-none" data="`+data.id+`"><i class="la la-trash"></i></button>
                                                    </div>`;



					$(tr).append(td1);
					$(tr).append(td2);
					$(tr).append(td3);
					$(tr).append(td4);
					$(tr).append(td5);
					$(".view-thing-gallery-table").append(tr);



				});
				//edit status of activity gallery
				$(".thing-gallery-status-btn").click(function(){
					
						
	
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-thing-gallery-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:0,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
           	},
           	success:function(response){
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-thing-gallery-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:1,

           	},
           	beforeSend:function(){
              $(btn).html("Process");
           	},
           	success:function(response){
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
	
	
	//end edit status of actvity-gallery
					
					});

				//delete activity gallery
$(".delete-thing-gallery-btn").click(function(){
	var btn=this;
			var tr=this.parentElement.parentElement.parentElement;
	
	$("#thing-gallery-delete-modal").modal("show");
	$(".confirm-delete-thing-gallery-btn").click(function(){

		$.ajax({
					type:"POST",
					url:"/admin/delete-thing-gallery",
					data:{
                     id:$(btn).attr("data"),
                     _token:$("body").attr("data"),

					},
					success:function(response){
						if(response.message=="success"){
							$("#thing-gallery-delete-modal").modal("hide");
							$(tr).addClass("bg-info animated flash text-white infinite");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response.message);
						}

					}
				});
	});
});
//end delete gallery
			

			}
			else{
				alert("This Thing To Do Have No Gallery Image");
			}
		}
	});
});
//end show activity gallery 

//update activity gallery
$(".update-thing-gallery-form").submit(function(e){
	e.preventDefault();
	$.ajax({
			type:"POST",
			url:"/admin/thing-gallery-update-data",
			data:new FormData(this),
			contentType:false,
			processData:false,
			cache:false,
			success:function(response){
			
				if(response.message=="success"){
					alert("thing Gallery Successfully Updated");
					$(".thing-gallery-form").trigger("reset");
					window.location.href="/admin/thing-gallery-photo";
				}
				else{
					alert(response.message);
					
				}
			}
		});

	
	
});
//end update activity gallery

//end thing to do page routing



//region city page coding 
$(document).ready(function(){
	$("#select-region").on("change",function(){
		$.ajax({
			type:"POST",
			url:"/admin/view-city-list",
			data:{
				id:$(this).val(),
				_token:$("body").attr("data"),
			},
			success:function(response){
				if(response.message=="success"){
					if(response.data.length>0){
						var all_tr=$(".city-table tr");
						$(all_tr).each(function(i){
							$(all_tr[i+1]).remove();

						});
						$(response.data).each(function(i,data){
							var tr=document.createElement("TR");
							var td1=document.createElement("TD");
							var td2=document.createElement("TD");
							var td3=document.createElement("TD");
							td1.innerHTML=i+1;
							td2.innerHTML=data.ville;
							td3.innerHTML=`<div class="d-flex justify-content-center align-items-center">
                                                        <a href="/admin/edit-thing-gallery/`+data.id+`"><button class="edit-city-btn icon-btn bg-success text-white mr-2" data=""><i class="la la-edit"></i>
                                                        </button></a>
                                                        <button class="icon-btn delete-thing-gallery-btn btn-danger text-white shadow-none" data="`+data.id+`"><i class="la la-trash"></i></button>
                                                    </div>`;
                        $(tr).append(td1);
                        $(tr).append(td2);
                        $(tr).append(td3);  
                        $(".city-table").append(tr);                          

						}); 
					}
				}
			}
		});
	});
});
//end region city page coding


//category page coding start
$(document).ready(function(){
	$(".category-form").submit(function(e){
		e.preventDefault();
		
	
		

		if(1){

			$.ajax({
				type:"POST",
				url:"/admin/add-category-data",
				data:new FormData(this),
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
               $(".loader-box").removeClass("d-none");
               $("body").css({
               	overflow:"hidden",

               });
				},

				success:function(response){
					 $(".loader-box").addClass("d-none");
               $("body").css({
               	overflow:"",

               });
					if(response.message=="success"){
						$(".category-message").addClass("alert-success");
						$(".category-message").html("Category Created Successfully");
						setTimeout(function(){
                  $(".category-message").removeClass("alert-success");
						$(".category-message").html("");
                     $(".category-form").trigger("reset");
						}
						,3500);
					}
					else{
                 $(".category-message").addClass("alert-warning");
						$(".category-message").html(response.message);
						setTimeout(function(){
                  $(".category-message").removeClass("alert-warning");
						$(".category-message").html("");

						}
						,3500);
					}

				}

			});
		}

	});


	//edit status of category
				$(".category-status-btn").click(function(){
					
						
	
			var status=$(this).attr("status");
			var id=$(this).attr("data");
			var btn=this;
			if(status==1){
            $.ajax({
           	type:"POST",
           	url:"/admin/update-category-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:"inactive",

           	},
           	beforeSend:function(){
              $(btn).html("Process");
               	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",0);
           			$(btn).removeClass("btn-success");
           			$(btn).addClass("btn-danger");
           			$(btn).html("inactive");
           		}
           	}
           });
			}
			else{
           $.ajax({
           	type:"POST",
           	url:"/admin/update-category-status",
           	data:{
           		id:id,
           		_token:$("body").attr("data"),
           		status:"active",

           	},
           	beforeSend:function(){
              $(btn).html("Process");
               	$("#loader-modal").modal("show");
           	},
           	success:function(response){
           			$("#loader-modal").modal("hide");
           		if(response.message=="success"){
           			$(btn).attr("status",1);
           			$(btn).removeClass("btn-danger");
           			$(btn).addClass("btn-success");
           			$(btn).html("Active");
           		}
           	}
           });
			}
	
	
	//end edit status of category
					
					});


				//update category name
				$(".update-category-form").submit(function(e){
		          e.preventDefault();
		
	
		

		if(1){

			$.ajax({
				type:"POST",
				url:"/admin/update-category-data",
				data:new FormData(this),
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
               $(".loader-box").removeClass("d-none");
              	$("#loader-modal").modal("show");
				},

				success:function(response){

					 	$("#loader-modal").modal("hide");
					if(response.message=="success"){
						$(".category-message").addClass("alert-success");
						$(".category-message").html("Category Successfully Updated");
						setTimeout(function(){
                  $(".category-message").removeClass("alert-success");
						$(".category-message").html("");
                     window.location.href="/admin/view-category";
						}
						,3000);
					}
					else{
						$("#loader-modal").modal("hide");
                 $(".category-message").addClass("alert-warning");
						$(".category-message").html(response.message);
						setTimeout(function(){
                  $(".category-message").removeClass("alert-warning");
						$(".category-message").html("");

						}
						,3000);
					}

				}

			});
		}

	});
				//end update category name


				//category delete
				$(".delete-category-btn").each(function(){
					$(this).click(function(){
						var btn=this;
						var tr=btn.parentElement.parentElement.parentElement;

						$("#category-delete-modal").modal("show");
						$(".confirm-delete-category-btn").click(function(){
							$.ajax({
					           type:"POST",
					           url:"/admin/delete-category",
					           data:{
                           id:$(btn).attr("data"),
                           _token:$("body").attr("data"),

					           },
					          
					       success:function(response){
					       	 	$("#category-delete-modal").modal("hide");

						if(response.message=="success"){
							
							$(tr).addClass("bg-info animated flash text-white infinite");
							setTimeout(()=>{
								$(tr).remove();
							},3000);
						}
						else{
							alert(response.message);
						}

					}
				});

						});
					});
				});
				//edn caregory delete
});
//edn category page coding




// map page coding start
$(document).ready(function(){
	$(".map-form").submit(function(e){
		e.preventDefault();
		if($(".map").val()==""){
			alert("Map Value empty");
		}
		else{
			$.ajax({
				type:"POST",
				url:"/admin/add-map-data",
				data:{
					map:$(".map").val(),
					_token:$("body").attr("data"),
				},
				beforeSend:function(){
					 $("#loader-modal").modal("show");
				},
				success:function(response){
						$("#loader-modal").modal("hide");
					
					 if(response.message=="success"){

					 	alert("Map Created Successfully");
					 }
					 else{
					 	alert(response.message);
					 }
				}
			});

		}

	});


	
});
//end map page coding



//edn trip looky
//formvalidation function call any where
function formvalid(form){

	var input=form.getElementsByTagName("INPUT");
	var select=form.getElementsByTagName("SELECT");
	var textarea=form.getElementsByTagName("TEXTAREA");
	var input_index=0;
	var select_index=0;
	var textarea_index=0;
	$(input).each(function(){
		if($(this).val()==""){
			if($(this).next().is("span")==false){
				var attr=$(this).attr("placeholder");
				$(this).addClass("input-place");
				$(this).after("<span class='text-danger p-font'><i class='la la-warning'></i> "+attr+ " can`t be empty</span>");
				$(this).css({
					border:"1px solid red",
				});

				$(this).on("input",function(){
						$(this).removeClass("input-place");
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});
				});
			}
		}
		else{
			input_index++;
		}
	});

	$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){

				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" </span>");
				  $(this).css({
					border:"1px solid red",
				});
				$(this).on("change",function(){
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});

				});
			}
		}
		else{
			select_index++;
		}
	});
	$(textarea).each(function(){
		if($(this).val()==""){
			if($(this).next().is("span")==false){
				var attr=$(this).attr("placeholder");
					$(this).addClass("input-place");
				$(this).after("<span class='text-danger p-font'><i class='la la-warning'></i> "+attr+ " can`t be empty</span>");
				$(this).css({
					border:"1px solid red",
				});

				$(this).on("input",function(){
						$(this).removeClass("input-place");
					$(this).next("span").remove();
					$(this).css({
					border:"",
				});
				});
			}
		}
		else{
			textarea_index++;
		}
	});
  
	if(input.length==input_index && select.length==select_index && textarea.length==textarea_index){
		return true;
	
	}
	else{
		return false;
	}


}
//end formvalidation function call any where


