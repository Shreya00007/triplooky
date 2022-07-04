$(document).ready(function(){
	$(".select-region-of-hotel").on("change",function(){
		$.ajax({
			type:"GET",
			url:"/admin/hotel/get-city/"+$(this).val(),
			beforeSend:function(){
				$(".loader-box").removeClass("d-none");
			},
			success:function(response){
				$(".loader-box").addClass("d-none");
				if(response.data.length>0){
					$(".select-city").html("");
				var option1=document.createElement("OPTION");
				option1.innerHTML="Select City";
				$(".select-city").append(option1);
				$.each(response.data,function(index,data){
					var option=document.createElement("OPTION");
					option.value=data.id;
					option.innerHTML=data.ville;
					$(".select-city").append(option);


				});
				}
			}
		});
	});

		$(".hotel-form").submit(function(e){
		e.preventDefault();
		
		var editor_index=0;
		var editor=$(".hotel-form .ql-editor");
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

	var data=new FormData($(".hotel-form")[0]);
	data.append("desc",$(".hotel-form .desc .ql-editor").html());
	
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/hotel/add-hotel-data",
				data:data,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$(".loader-box").removeClass("d-none");

				},
				success:function(response){
					$(".loader-box").addClass("d-none");
				window.scrollTo({ top: 0, behavior: 'smooth' });
					console.log(response);
					 if(response.message=="success"){
					 	
					 	$(".message").html("<div class='alert alert-success animated flash infinite'><b>Tour Successfully created</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                   $(".tour-form").trigger("reset");

                  
					 	},3000);

					 }
					 else{
					 
					 	$(".loader-box").addClass("d-none");
					 	$(".message").html("<div class='alert alert-warning animated flash infinite text-danger'><b>"+response.message+"</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                  
                   
                  
					 	},3000);
					 }
					},
					error:function(response){
						$(".loader-box").addClass("d-none");
						console.log(response);
						
					 	$(".message").html("<div class='alert alert-warning animated flash infinite text-danger'><b>Something is wrong Try again</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                  
                   
                  
					 	},3000);
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


		//update hotel 
		$(".update-hotel-form").submit(function(e){
		e.preventDefault();
		
		var editor_index=0;
		var editor=$(".update-hotel-form .ql-editor");
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

	var data=new FormData($(".update-hotel-form")[0]);
	data.append("desc",$(".update-hotel-form .desc .ql-editor").html());
	
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/hotel/update-hotel-data",
				data:data,
				contentType:false,
				processData:false,
				cache:false,
				beforeSend:function(){
					$(".loader-box").removeClass("d-none");

				},
				success:function(response){
					$(".loader-box").addClass("d-none");
				window.scrollTo({ top: 0, behavior: 'smooth' });
					console.log(response);
					 if(response.message=="success"){
					 	
					 	$(".message").html("<div class='alert alert-success animated flash infinite'><b>Tour Successfully created</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                   $(".tour-form").trigger("reset");

                  
					 	},3000);

					 }
					 else{
					 
					 	$(".loader-box").addClass("d-none");
					 	$(".message").html("<div class='alert alert-warning animated flash infinite text-danger'><b>"+response.message+"</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                  
                   
                  
					 	},3000);
					 }
					},
					error:function(response){
						$(".loader-box").addClass("d-none");
						console.log(response);
						
					 	$(".message").html("<div class='alert alert-warning animated flash infinite text-danger'><b>Something is wrong Try again</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                  
                   
                  
					 	},3000);
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

		//end update hotels



		//add image in multiple image insert of hotel
		$(".hotel-multiple-image-form").submit(function(e){
			e.preventDefault();
			  $.ajax({
			  	type:"POST",
			  	url:"/admin/hotel/add-more-image",
			  	data:new FormData($(".hotel-multiple-image-form")[0]),
			  	contentType:false,
			  	processData:false,
			  	cache:false,
			  	beforeSend:function(){
			  		$(".loader-box").removeClass("d-none");
			  	},
			  	success:function(response){
			  		
			  		$(".loader-box").addClass("d-none");
			  		if(response.message=="success"){
			  			$(".message").addClass("text-success p-font");
			  			$(".message").html("<b>Photo Uploaded Successfully</b>");
			  			setTimeout(function(){
			  				$(".message").removeClass("text-success p-font");
			  			$(".message").html("");
			  			$(".hotel-multiple-image-form").trigger("reset");

			  			},2000);
			  		}
			  		else{
			  			$(".message").addClass("text-danger p-font");
			  			$(".message").html("<b>Something is wrong try again</b>");
			  			setTimeout(function(){
			  				$(".message").removeClass("text-danger p-font");
			  			$(".message").html("");

			  			},2000);

			  		}
			  	},
			  	error:function(){
			  		alert(response);
			  	}
			  });
		});
		//end coding of add image



		//update multple image 
		$(".edit-hotel-image-btn").each(function(){
			$(this).click(function(){
				var id=$(this).attr("data");
				var tr=this.parentElement.parentElement.parentElement;
			var img_src=$(tr).find("img").attr("src");
			  $("#update-image-modal").modal("show");
			  $(".update-image-show").attr("src",img_src);
			  $(".update-hotel-multiple-image-form input[name=image_id]").val(id);
			  $(".update-hotel-multiple-image-form").submit(function(e){
			  	e.preventDefault();
			  $.ajax({
			  	type:"POST",
			  	url:"/admin/hotel/update--more-image",
			  	data:new FormData($(".update-hotel-multiple-image-form")[0]),
			  	contentType:false,
			  	processData:false,
			  	cache:false,
			  	beforeSend:function(){
			  		$(".loader-box").removeClass("d-none");
			  	},
			  	success:function(response){
			  		
			  		
			  		$(".loader-box").addClass("d-none");
			  		if(response.message=="success"){
			  			$(".message").addClass("text-success p-font");
			  			$(".message").html("<b>Photo Updated Successfully</b>");
			  			setTimeout(function(){
			  				$(".message").removeClass("text-success p-font");
			  			$(".message").html("");
			  			$(".update-hotel-multiple-image-form").trigger("reset");

			  			},2000);
			  		}
			  		else{
			  			$(".message").addClass("text-danger p-font");
			  			$(".message").html("<b>Something is wrong try again</b>");
			  			setTimeout(function(){
			  				$(".message").removeClass("text-danger p-font");
			  			$(".message").html("");

			  			},2000);

			  		}
			  	},
			  	error:function(response){
			  		console.log(response);
			  	}
			  });


			  });
			});
		});
		//end update multiple image
});