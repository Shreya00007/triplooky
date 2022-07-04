// *********************** ADD NEW PLACE PAGE CODING START *********************************************//
$(document).ready(function(){
	$("#place-region").on("change",function(){
		
		if($(this).val()!="Select Region"){
			$.ajax({
			type:"GET",
			url:"/admin/place/get-city/"+$(this).val(),
			beforeSend:function(){
         $(".loader-box").removeClass("d-none");
             
			},
			success:function(response){
				$(".loader-box").addClass("d-none");
				if(response.data.length>0){
					$(".place-city").html("");
					var option1=document.createElement("OPTION");
				option1.innerHTML="Select Region";
				$(".place-city").append(option1);
				$.each(response.data,function(i,data){
					var option=document.createElement("OPTION");
					option.innerHTML=data.ville;
					option.value=data.id;
					$(".place-city").append(option);
				})
				}
				else{
					var option1=document.createElement("OPTION");
				option1.innerHTML="Select Region";
				$(".place-city").append(option1);
				}

				 
			}
		});
		}
	});

	$(".place-form").submit(function(e){
		e.preventDefault();
		var select=$(this).find("select.require");
		var select_index=0;

		$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){

				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" is required</span>");
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

		var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val()==""){
				if($(this).next().is("span")==false){

				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+$(this).attr("placeholder")+" is required</span>");
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
				input_index++;
			}
		});

		if(input_index==input.length && select.length==select_index){
			var formdata=new FormData($(".place-form")[0]);
			formdata.append("desc",$(".place-form .desc .ql-editor").html());
			$.ajax({
				type:"POST",
			    url:"/admin/add-place-data",
			    data:formdata,
			    contentType:false,
			    processData:false,
			    cache:false,
			    beforeSend:function(){
			    	 $(".loader-box").removeClass("d-none");
			    },
			    success:function(response){
			    	 $(".loader-box").addClass("d-none");
			    	if(response.message=="success"){
			    		
			    		
			    		var message=`<div class='alert alert-success animated flash p-font infinite'><b>Place Created Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>`;
                       $(".message").html(message);
                       setTimeout(function(){
                       	$(".message").html("");
                       	$(".place-form").trigger('reset');
                       	$(".place-form .desc .ql-editor").html("");
                       },4500); 
			    	}
			    	else{
			    		var message=`<div class='alert alert-warning animated flash p-font text-danger infinite'><b>`+response.message+`</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>`;
                       $(".message").html(message);
                       setTimeout(function(){
                       	$(".message").html("");
                       },4500); 

			    	}

			    }
			});
		}

	});

	// ****** update place **********//
	$(".update-place-form").submit(function(e){
		e.preventDefault();
		var select=$(this).find("select.require");
		var select_index=0;

		$(select).each(function(){
		var option=this.getElementsByTagName("OPTION")[0];

		if($(this).val()==option.value){
			if($(this).next().is("span")==false){

				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+option.value+" is required</span>");
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

		var input=$(this).find("input.require");
		var input_index=0;
		$(input).each(function(){
			if($(this).val()==""){
				if($(this).next().is("span")==false){

				$(this).after("<span class='text-danger p-font'> <i class='la la-warning'></i>  "+$(this).attr("placeholder")+" is required</span>");
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
				input_index++;
			}
		});

		if(input_index==input.length && select.length==select_index){
			var formdata=new FormData($(".update-place-form")[0]);
			formdata.append("desc",$(".update-place-form .desc .ql-editor").html());
			$.ajax({
				type:"POST",
			    url:"/admin/update-place-data",
			    data:formdata,
			    contentType:false,
			    processData:false,
			    cache:false,
			    beforeSend:function(){
			    	 $(".loader-box").removeClass("d-none");
			    },
			    success:function(response){
			    	console.log(response);

			    	$(".loader-box").addClass("d-none");
			    	
			    	if(response.message=="success"){
			    		
			    		
			    		var message=`<div class='alert alert-success animated flash p-font infinite'><b>Place Updated Successfully</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>`;
                       $(".message").html(message);
                       setTimeout(function(){
                       	$(".message").html("");
                       	$(".place-form").trigger('reset');
                       	$(".place-form .desc .ql-editor").html("");
                       },4500); 
                       window.location.href="/admin/view-place-list";
			    	}
			    	else{
			    		var message=`<div class='alert alert-warning animated flash p-font text-danger infinite'><b>`+response.message+`</b><i class='la la-close close' data-dismiss='alert' style='cursor:pointer'></i></div>`;
                       $(".message").html(message);
                       setTimeout(function(){
                       	$(".message").html("");
                       },4500); 

			    	}

			    }
			});
		}

	});
	//******* end update place *******//
});
// *********************** END PLACE PAGE CODING ***************************************************//