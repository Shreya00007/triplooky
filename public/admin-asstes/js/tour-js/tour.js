// ***************** ADD TOUR CODING START ******************//
   $(document).ready(function(){
      $(".category").on("change",function(){
      	getSubcategory($(this).val());
      });
       

   	$(".tour-form").submit(function(e){
		e.preventDefault();
		
		var editor_index=0;
		var editor=$(".tour-form .ql-editor");
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
				var textarea=$(this).find("textarea.require");
				var textarea_index=0;
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
		$(textarea).each(function(){
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
				textarea_index++;
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

	var data=new FormData($(".tour-form")[0]);
	data.append("departure_details",$(".tour-form .departure_details .ql-editor").html());
	data.append("return_detail",$(".tour-form .return_detail .ql-editor").html());
	data.append("cancel_policy",$(".tour-form .cancel_policy .ql-editor").html());
	data.append("description",$(".tour-form .desc .ql-editor").html());
	data.append("highlight",$(".tour-form .highlight .ql-editor").html());
	data.append("know_more",$(".tour-form .know-more .ql-editor").html());
	data.append("inclusion",$(".tour-form .inclusion .ql-editor").html());
	data.append("exclusion",$(".tour-form .exclusion .ql-editor").html());
	data.append("add_info",$(".tour-form .add-info .ql-editor").html());
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/tour/add-tour-data",
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

     //update tour 

     	$(".update-tour-form").submit(function(e){
		e.preventDefault();
		
		var editor_index=0;
		var editor=$(".tour-form .ql-editor");
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

	var data=new FormData($(".update-tour-form")[0]);
	data.append("departure_details",$(".update-tour-form .departure_details .ql-editor").html());
	data.append("return_detail",$(".update-tour-form .return_detail .ql-editor").html());
	data.append("cancel_policy",$(".update-tour-form .cancel_policy .ql-editor").html());
	data.append("description",$(".update-tour-form .desc .ql-editor").html());
	data.append("highlight",$(".update-tour-form .highlight .ql-editor").html());
	data.append("know_more",$(".update-tour-form .know-more .ql-editor").html());
	data.append("inclusion",$(".update-tour-form .inclusion .ql-editor").html());
	data.append("exclusion",$(".update-tour-form .exclusion .ql-editor").html());
	data.append("add_info",$(".update-tour-form .add-info .ql-editor").html());
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/tour/update-tour-data",
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
					 	
					 	$(".message").html("<div class='alert alert-success animated flash infinite p-font text-info'><b>Tour Details Updated Successfully </b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                   $(".tour-form").trigger("reset");

                  
					 	},3000);

					 }
					 else{
					 
					 	$(".loader-box").addClass("d-none");
					 	$(".message").html("<div class='alert alert-warning animated flash infinite text-danger p-font'><b>"+response.message+"</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                  
                   
                  
					 	},3000);
					 }
					},
					error:function(response){
						$(".loader-box").addClass("d-none");
						console.log(response);
						
					 	$(".message").html("<div class='alert alert-warning animated flash infinite text-danger p-font'><b>Something is wrong Try again</b><i class='la la-close close' data-dismiss='alert'></i></div>");
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

     //end update tour
   });

//****************** END CODING OF TOUR ADD ****************//



function getSubcategory(category){
   		$.ajax({
   			type:"GET",
   			url:"/admin/tour/get-sub-category/"+category,
   			beforeSend:function(){
   				$(".loader-box").removeClass("d-none");
   			},
   			success:function(response){
   				$(".loader-box").addClass("d-none");

   				if(response.data.length>0){
   					$(".sub-category").html("");

   					var select_option=document.createElement("OPTION");
   					select_option.innerHTML="Select Sub category";
   					$(".sub-category").append(select_option);
   					$.each(response.data,function(index,data){
   					var option=document.createElement("OPTION");
   					option.innerHTML=data.sub_category_name;
   					option.value=data.id;
   					$(".sub-category").append(option);

   				});
   				}
   				else{
   					alert("This Category Have No Any Subcategory");
   					$(".sub-category").html("");

   					var select_option=document.createElement("OPTION");
   					select_option.innerHTML="Select Sub category";
   					$(".sub-category").append(select_option);
   				}
   				
   			}

   		});
   	}