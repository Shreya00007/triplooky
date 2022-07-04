$(document).ready(function(){
	$(".public-transport-form").submit(function(e){
		e.preventDefault();
		
		var editor_index=0;
		var editor=$(".public-transport-form .ql-editor");
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

	var data=new FormData($(".public-transport-form")[0]);
	data.append("desc",$(".public-transport-form .desc .ql-editor").html());
	
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/public-transportation/add-public-transportation-data",
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
					 	
					 	$(".message").html("<div class='alert alert-success animated flash infinite'><b>Private Driver Created Successfully created</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                   $(".public-transport-form").trigger("reset");

                  
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




	//update public transport
	$(".update-public-transport-form").submit(function(e){
		e.preventDefault();
		
		var editor_index=0;
		var editor=$(".update-public-transport-form .ql-editor");
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

	var data=new FormData($(".update-public-transport-form")[0]);
	data.append("desc",$(".update-public-transport-form .desc .ql-editor").html());
	
	data.append("_token",$("body").attr("data"));
	
	
	 

		if(input.length==input_index && select.length==select_index && editor.length==editor_index){
			
			
			if(1){
				
		
			
			$.ajax({
				type:"POST",
				url:"/admin/public-transportation/update-public-transportation-data",
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
					 	
					 	$(".message").html("<div class='alert alert-success animated flash infinite p-font'><b>Public Transportation Updated Successfully created</b><i class='la la-close close' data-dismiss='alert'></i></div>");
					 	setTimeout(function(){
       
                   $(".message").html("");
                   $(".update-public-transport-form").trigger("reset");

                  
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

	

	//end update public transport

});