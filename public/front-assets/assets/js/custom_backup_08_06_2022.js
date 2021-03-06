//user signup form 
$(document).ready(function(){

	$("#user-signup-form").submit(function(e){
		e.preventDefault();
		var input=$("#user-signup-form input");
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

		if(input.length==input_index){
			var formdata=new FormData(this);
			$.ajax({
			      type:"POST",
			      url:"/user-register",
			      data:formdata,
			      contentType:false,
			      processData:false,
			      cache:false,
			      success:function(response){
			      	if(response.message=="success"){
			      		$(".user-register-message").addClass("text-success");
			      		$(".user-register-message").html("Register has been  kinndly login");
                         setTimeout(()=>{
                         	$(".user-register-message").removeClass("text-success");
			      		$(".user-register-message").html("");
			      		$("#user-signup-form").trigger("reset");
			      		window.location.href="/user/dashboard-admin";
                         },2000);
			      	}
			      	else{ 
                          $(".user-register-message").addClass("text-danger");
			      		$(".user-register-message").html(response.message);
                         setTimeout(()=>{
                         	$(".user-register-message").removeClass("text-danger");
			      		$(".user-register-message").html("");
                         },2000);
			      	}
			      }
			});
		}

	});
});
//end user signup form


//user login
//user signup form 
$(document).ready(function(){
	$("#user-login-form").submit(function(e){
		e.preventDefault();
  
		

		var input=$("#user-login-form input");
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

              

		if(input.length==input_index){
			var formdata=new FormData(this);
			$.ajax({
			      type:"POST",
			      url:"/user-login",
			      data:formdata,
			      contentType:false,
			      processData:false,
			      cache:false,
			      beforeSend:function(){
			        $(".login-loader").removeClass("d-none");
                                $(".login-text").addClass("d-none");

			      
			      },
			      success:function(response){
                                      console.log(response);
                                    $(".login-loader").addClass("d-none");
                                $(".login-text").removeClass("d-none");
			      	
			      
			      	if(response=="success"){

                                    if($("#login-remember-me").is(":checked")){
                                               var date = new Date();
                                              date.setTime(date.getTime() + (24*60*60*1000*30));
                                              expires = "; expires=" + date.toUTCString();
			      		      document.cookie="_login"+"="+"logged"+expires+"; path=/";
                                                var user={e:btoa($("#user-login-form input[name='email']").val()),p:btoa($("#user-login-form input[name='password']").val()),};
                                              localStorage.setItem("_Trip_",JSON.stringify(user));

                                     }

                                      if($("#login-remember-me").is(":checked")==false){
                                             if(localStorage.getItem("_Trip_")!=null){
                                                 localStorage.removeItem("_Trip_");
                                               } 
                                             

                                     }
			      		
			      		
			      		
			         window.location=location.href;
			      		
			      	}
			      	else{ 
                                          $(".login-message").removeClass("d-none");
                                           $(".login-message").addClass("animated fadeIn");
                                      $(".login-message").html('<i class="bi bi-x-square" style="font-size:20px;margin-right:10px;"></i>  '+response);
                                     setTimeout(()=>{
                                    
                                    $(".login-message").addClass("d-none");
                                     $(".login-message").removeClass("animated fadeIn");
                                      $(".login-message").html("");

                                        },3000);
                                         
                                    
                          
			      	}
			      }
			});
		}

	});
});
//end user login


//forget password of user
$(".forget-password-form").submit((e)=>{
	e.preventDefault();
	
	var input=$(".forget-password-form input.require");
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
		
		if(input.length==input_index){
			$.ajax({
				type:"POST",
				url:"/user/forget-password",
				data:{
					email:$(".forget-password-form input[name='email']").val().trim(),
					_token:$("body").attr("data"),
					password:$(".forget-password-form input[name='password']").val().trim(),

				},
				beforeSend:function(){
					$(".forget-password-loader").removeClass("d-none");
					$(".login-text").addClass("d-none");
				},
				success:function(response){

					$(".forget-password-loader").addClass("d-none");
					$(".login-text").removeClass("d-none");
					if(response=="success"){
						   $(".login-message").removeClass("d-none");
                                           $(".login-message").addClass("animated fadeIn bg-success text-white");
                                      $(".login-message").html('<i class="bi bi-check2-square" style="font-size:25px;margin-right:10px;"></i>  Your Password has been reset successfully');
                                     
                                       if(localStorage.getItem("_Trip_")!=null){
                                       	var data=JSON.parse(localStorage.getItem("_Trip_"));
                                       	data.p=btoa($(".forget-password-form input[name='password']").val().trim());
                                      
                                       	 
                   
                                       $("#user-login-form input[name='email']").val(atob(data.e));
                                       $("#user-login-form input[name='password']").val($(".forget-password-form input[name='password']").val().trim());
                                        	localStorage.setItem("_Trip_",JSON.stringify(data));

                                       }

                                     setTimeout(()=>{
                                    
                                    $(".login-message").addClass("d-none");
                                     $(".login-message").removeClass("animated fadeIn bg-success text-white");
                                      $(".login-message").html("");
                                      $("#user-login-form").removeClass("d-none");
                                      $(".forget-password-form").addClass("d-none");
                                      $(".forget-password-form").trigger("reset");

                                        },3000);

					}
					else{
						   $(".login-message").removeClass("d-none");
                                           $(".login-message").addClass("animated fadeIn");
                                      $(".login-message").html('<i class="bi bi-x-square" style="font-size:25px;margin-right:10px;"></i>  '+response);
                                     setTimeout(()=>{
                                    
                                    $(".login-message").addClass("d-none");
                                     $(".login-message").removeClass("animated fadeIn");
                                      $(".login-message").html("");

                                        },3000);

					}
				}
			});
		}

});
//end forget password of user





//search live 
$(document).ready(function(){
    $("input[name=search-tour]").on("keyup",function(){
   
    	if($(this).val().length>0){
    		$.ajax({
    			url:"/tour/city-search",
    			type:"POST",
    		  data:{
    		  	city:$(this).val().trim(),
    		  	_token:$("body").attr("data"),
    		  },
    		  success:function(response){
    		  	if(response.message=="success"){
    		  		if(response.data.length>0){
    		  			 $(".search-city-box-ul").html("");
    		  			$(".search-city-box").css({
    		  				visibility:"visible",
    		  				opacity:"1",
    		  			});
    		  			$(response.data).each(function(i,data){

    		  				var li=document.createElement("LI");
    		  				 var a=document.createElement("A");
    		  				 a.href="/tour/search/"+data.city_name;
    		  				 a.innerHTML="<i class='fa fa-map-marker mr-2'></i>   "+data.city_name;
    		  				 $(a).css({
    		  				 	textDeoration:"none",
    		  				 	color:"black",
    		  				 });
    		  				 $(li).append(a);
    		  				 $(".search-city-box-ul").append(li);

    		  			});

    		  		}
    		  		else{
    		  			$(".search-city-box-ul").html("");
    		  			$(".search-city-box").css({
    		  				visibility:"visible",
    		  				opacity:"1",
    		  			});
    		  			

    		  			 var li=document.createElement("LI");
    		  			 li.innerHTML="Sorry ! We Couldn`t  find any city or region";
    		  			 li.style="color:red";
    		  			 $(".search-city-box-ul").append(li);
    		  			
    		  		}
    		  	}
    		  }
    		});
    	}
    	else{
    		$(".search-city-box").css({
    		  				visibility:"hidden",
    		  				opacity:"0",
    		  			});
    		  			$(".search-city-box-ul").html("");
    	}
    });
});
//end search live


   $(document).ready(function(){
      $(".highligt ul li").each(function(){
         alert();
         $(this).before("<i class='fa fa-check-circle text-warning mr-1'</i>");
      });
   });



//thing to filter page coding start by category
$(document).ready(function(){
	$(".thing-to-do-filter-by-category").each(function(){
		$(this).click(function(){
			var input_checkbox=$("input[name=category-check-box]");
			$(input_checkbox).each(function(){
				$(this).prop("checked",false);
			});
			$(this).find("input[name=category-check-box]").prop("checked",true);
			var id=$(this).attr("data");
			var city=$(this).attr("city");
			var link=this;
			var category=$(this).find("p").html();
			$.ajax({
				type:"GET",
				url:"/tour/search/"+city+"/"+id,
				beforeSend:function(){
					$("#loader-modal").modal("show");
				},
				success:function(response){
                 $("#loader-modal").modal("hide");

					if(response.message=="success"){
						$(".tour-box").html("");

						if(response.data.length>0){
							var button="<button class='btn btn-warning mb-2 text-white d-flex justify-content-between align-items-center category-cut-btn shadow-none' style='width:fit-content !important;'>"+category+"<i class='fa fa-close close' style='margin-left:10px !important;'></i></button>";
							$(".tour-box").append(button);
							$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+` ...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

							$(".category-cut-btn").click(function(){
								$.ajax({
									type:"GET",
									url:"/tour/search/"+city,
									beforeSend:function(){
										$("#loader-modal").modal("show");
									},
									success:function(response){
										$("#loader-modal").modal("hide");
										$(link).find("input[type=checkbox]").prop("checked",false);
										
										if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

											}
										}
									}
								});
							});
						}
						else{
							var button="<button class='btn btn-danger mb-2 text-white d-flex justify-content-between align-items-center category-cut-btn shadow-none' style='width:fit-content !important;'>No Any Tour<i class='fa fa-close close' style='margin-left:10px !important;'></i></button>";
							$(".tour-box").append(button);
							$(".tour-box").append("<h4 class='text-center text-danger'>This Category Have No Any Tour</h4>");
							$(".category-cut-btn").click(function(){
								$.ajax({
									type:"GET",
									url:"/tour/search/"+city,
									beforeSend:function(){
										$("#loader-modal").modal("show");
									},
									success:function(response){
										$(link).find("input[type=checkbox]").prop("checked",false);
										$("#loader-modal").modal("hide");
										$(link).find("input[type=checkbox]").prop("checked",false);
										
										if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

											}
										}
									}
								});
							});
						}
					}
				}

			});

		});
	});
});
//end coding of thing to page category filter


//start coding of thing to do filter by language
$(document).ready(function(){
	$(".thing-to-do-lang").each(function(){
		$(this).click(function(){

			var input_checkbox=$("input[name=lang-check-box]");
			$(input_checkbox).each(function(){
				$(this).prop("checked",false);
			});
			$(this).find("input[name=lang-check-box]").prop("checked",true);
			var id=$(this).attr("data");
			var city=$(this).attr("city");
			var link=this;
			var category=$(this).find("p").html();
			
			$.ajax({
				type:"GET",
				url:"/tour/search/"+city+"/lang/"+id,
				beforeSend:function(){
					$("#loader-modal").modal("show");
				},
		      success:function(response){
		      	$("#loader-modal").modal("hide");
		      	if(response.message=="success"){

		      		if(response.data.length>0){
		      			$(".tour-box").html("");
		      			var button="<button class='btn btn-warning mb-2 text-white d-flex justify-content-between align-items-center lang-cut-btn shadow-none' style='width:fit-content !important;'>"+category+"<i class='fa fa-close close' style='margin-left:10px !important;'></i></button>";
							$(".tour-box").append(button);
		      			$(response.data).each(function(i,data){


		      					var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+` ...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

		      			});


		      			$(".lang-cut-btn").click(function(){
								$.ajax({
									type:"GET",
									url:"/tour/search/"+city,
									beforeSend:function(){
										$("#loader-modal").modal("show");
									},
									success:function(response){
										$("#loader-modal").modal("hide");
										$(link).find("input[type=checkbox]").prop("checked",false);
										
										if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

											}

											else{

											}
										}
									}
								});
							});
		      		}
		      		else{
		      			$(".tour-box").html("");
		      			var button="<button class='btn btn-danger mb-2 text-white d-flex justify-content-between align-items-center lang-cut-btn shadow-none' style='width:fit-content !important;'>No Any Tour<i class='fa fa-close close' style='margin-left:10px !important;'></i></button>";
							$(".tour-box").append(button);
							$(".tour-box").append("<h4 class='text-center text-danger'>This Category Have No Any Tour</h4>");
							$(".lang-cut-btn").click(function(){
								
								$.ajax({
									type:"GET",
									url:"/tour/search/"+city,
									beforeSend:function(){
										$("#loader-modal").modal("show");
									},
									success:function(response){
										$(link).find("input[type=checkbox]").prop("checked",false);
										$("#loader-modal").modal("hide");
										$(link).find("input[type=checkbox]").prop("checked",false);
										
										if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

											}
										}
									}
								});
							});
		      		}
		      	}
		      }
			});

		});
	});
});
//end coding of thing to do filter by language


//filter thing to do by price
$(document).ready(function(){
	$(".price-filter").on("change",function(){
		var city=$(this).attr("city");
		
		if($(this).val()=="high-to-low"){
			var option_value=$(this).find("option");
		
			$.ajax({
			type:"GET",
			url:"/tour/search/"+city+"/price/"+1,
			beforeSend:function(){
				$("#loader-modal").modal("show");
			},
			success:function(response){
				$("#loader-modal").modal("hide");
					if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												var button="<button class='btn btn-danger mb-2 text-white d-flex justify-content-between align-items-center price-cut-btn shadow-none' style='width:fit-content !important;'>"+option_value[2].innerHTML+"<i class='fa fa-close close' style='margin-left:10px !important;'></i></button>";
							$(".tour-box").append(button);
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});


												$(".price-cut-btn").click(function(){
								
								$.ajax({
									type:"GET",
									url:"/tour/search/"+city,
									beforeSend:function(){
										$("#loader-modal").modal("show");
									},
									success:function(response){
										
										$("#loader-modal").modal("hide");
									
										
										if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

											}
										}
									}
								});
							});



											}
										}
			}
		});
		}

		if($(this).val()=="low-to-high"){
			var option_value=$(this).find("option");
		
			$.ajax({
			type:"GET",
			url:"/tour/search/"+city+"/price/"+0,
			beforeSend:function(){
				$("#loader-modal").modal("show");
			},
			success:function(response){
				$("#loader-modal").modal("hide");
					if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												var button="<button class='btn btn-danger mb-2 text-white d-flex justify-content-between align-items-center price-cut-btn shadow-none' style='width:fit-content !important;'>"+option_value[1].innerHTML+"<i class='fa fa-close close' style='margin-left:10px !important;'></i></button>";
							$(".tour-box").append(button);
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});


												$(".price-cut-btn").click(function(){
								
								$.ajax({
									type:"GET",
									url:"/tour/search/"+city,
									beforeSend:function(){
										$("#loader-modal").modal("show");
									},
									success:function(response){
										
										$("#loader-modal").modal("hide");
									
										
										if(response.message=="success"){
											if(response.data.length>0){
												$(".tour-box").html("");
												$(response.data).each(function(i,data){
								var tour_box=`<div class="card tour-card-box mb-3" style="box-shadow:0px 0px 5px rgba(0, 0, 0,0.4);height: fit-content;border-radius: 2px;">
   				<div class="card-body py-2 px-2">
   					<div class="row">
   				<div class="col-sm-3">
   					<img src="http://127.0.0.1:8000/thing-to-do/`+data.image+`" width="100%" class="shadow-sm">
   				</div>
   				<div class="col-sm-7">
   					<h6>
   					`+data.heading+`
</h6>
<i class="fa fa-star" style="color:orange;font-size: 15px;"></i><i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<i class="fa fa-star" style="color:orange;font-size: 15px;"></i>
   			<span class="ml-2">5 Reviews</span>
   			<div>`+data.overview.substring(0,290)+`...</div>
   				</div>
   				<div class="col-sm-2">
   					<p class="float-right" style="text-align: right;">From</p>
   					<h5>USD `+data.price+`</h5>
   					<a href="/search/tour/`+data.city_name+`/`+data.heading+`"><button class="btn btn-info shadow-none p-font px-4 text-white">Details</button></a>
   				</div>
   			</div>
   				</div>
   			</div>`;

   			$(".tour-box").append(tour_box);

							});

											}
										}
									}
								});
							});



											}
										}
			}
		});
		}
	});
});
//end coding of filter thing to do by price



// **************** USER TRIP PLAN PAGE CODING START **********************//
//trip plan page coding start
$(document).ready(function(){
  var city=[];
    var city_index=0;
    var total_day=0;

	
	if(sessionStorage.getItem("tour")!=null){
 
	
		var data=JSON.parse(sessionStorage.getItem("tour"));



var dateString1 = data.arrival_date; // Oct 23

var dateParts1 = dateString1.split("/");

// month is 0-based, that's why we need dataParts[1] - 1
var date1 = new Date(+dateParts1[2], dateParts1[1] - 1, +dateParts1[0]);

var dateString2 = data.departure_date; // Oct 23

var dateParts2 = dateString2.split("/");

// month is 0-based, that's why we need dataParts[1] - 1
var date2 = new Date(+dateParts2[2], dateParts2[1] - 1, +dateParts2[0]); 
var totaldate=date2.getTime()-date1.getTime();
var difference_day=totaldate/(1000*3600*24);


//date diff
	//check city selected or not
	//prevent not add more day after select travelling date
	  $(".add-day").each(function(i){

       $(this).click(function () {
        total_day=0;
        
       
        
         var input=$(this).parent().find("input");
        
      
      var all_select_city=$(".pick-city-box");
     
       $(all_select_city).each(function(i){
      
         if($(this).hasClass("active") || $(this).hasClass("prevSelected")){
           var input=$(this).parent().find("div.number input[type=text]").val();
          
          if(input>0){
          	total_day+=Number(input);
          }
         }
       });

     
       
       
        if(total_day>=difference_day){
            swal({
                 title: "Total Trip is "+difference_day+" Nights /"+eval(difference_day+1)+" Days",
                 text: "Can`t be select More than "+difference_day+" Nights /"+eval(difference_day+1)+" Days",
                 icon: "error",
                  dangerMode: true,
                   button: {
                   text: "Close",
                },


});
            $(".swal-modal").css('background-color', '#FFD2D2');
            input.val(parseInt(input.val())- 1);

           
            
        }
        else{
           
       
       
        }
      });
     });
	//end prevent 
	var data=JSON.parse(sessionStorage.getItem("tour"));
	var city_details=JSON.parse(sessionStorage.getItem("city_details"));
    // $(".pick-city-box").each(function(){
     	$(".pick-city-box").on('click',function(){

              var input=$(this).parent().find("div.number input.days").val();
             console.log("input:-",input)
     		if(!$(this).hasClass("active")){
     			if(data.city.indexOf($(this).attr("data"))==-1){
					 console.log("hello city id", $(this).attr("data"));
     				data.city.push($(this).attr("data"));
     			sessionStorage.setItem("tour",JSON.stringify(data));

     			
     			}
     			else{
                var index=data.city.indexOf($(this).attr("data"));
     			 if (index > -1) {
                     data.city.splice(index,1);
                     sessionStorage.setItem("tour",JSON.stringify(data));
                       $(this).parent().find("div.number input.days").val(0);
                   }
     			}
     			
     		}
     		else{
     			//remove selected city here
     			var index=data.city.indexOf($(this).attr("data"));
				 console.log("Remove",index);
     			 if (index > -1) {
                     data.city.splice(index,1);
                     sessionStorage.setItem("tour",JSON.stringify(data));
                   }

                   $(this).parent().find("div.number input.days").val(0);
                   //end remove selected city



                   

     		}
     	});
   //  });

	
	//end check city selected or not
	
}

   

// var labels = document.getElementsByTagName('label');
// for (var i = 0; i < labels.length; i++) {
// 	console.log('label',labels[i].getAttribute("data"));
// 	if( city_id_prev !=undefined)  
// 					{  
// 							//alert("Yes, the value exists!")  
// 							labels[i].classList.add("mystyle");
// 					} 
// }

	//city form submit  and city details store how many days user to want to stay in which city and also city name
	$("#pick-up-city-form").submit(function(e){
		 e.preventDefault();
       var data=JSON.parse(sessionStorage.getItem("tour"));
       var pre_city_data=data.city;
      
    //   if(pre_city_data !='' && pre_city_data != undefined && pre_city_data != null){

	// 	var labels = document.getElementsByTagName('label');
	// 		for (var i = 0; i < labels.length; i++) {
	// 			let city_id_prev = 	labels[i].getAttribute("data");
	// 			if(pre_city_data.indexOf(city_id_prev) !== -1 && city_id_prev !=undefined)  
	// 				{  
	// 						//alert("Yes, the value exists!")  

	// 				}   
	// 		}

	//   }
    
   
	


if(data.city.length!=0){
   var total_day=0;
	 var all_select_city=$(".pick-city-box");
       $(all_select_city).each(function(i){
         if(1){
           var input=$(this).parent().find("div.number input.days").val();
           if(input>0){
           	 total_day+=Number(input);
           }
         }
       });

           if(difference_day>total_day){

       	      swal({
              title: "Your Total Trip Days is "+difference_day+" Days But Select Only "+total_day+" Days",
              text:"Kindly Select All Date ",
              icon: "warning",
              dangerMode: true,
               button:"Close",
               cancelButtonColor: '#d33',

              });

       	    $(".swal-modal").css('background-color', '#FFD2D2');

       }
       else{
              var tour_data=JSON.parse(sessionStorage.getItem("tour"));
       	    if(sessionStorage.getItem("city_details")!=null){
       	    	sessionStorage.removeItem("city_details");
       	    	//remove selected city then after add
       	         

       	    	//store city details data
       	    	var data=[];
       	    	var all_select_city=$("label.active");
       	    	$(all_select_city).each(function(){
       	    		var day=$(this).parent().find("div.number input.days").val();
       	    		
       	    		if(Number(day)>0){
       	    			var object={"data":btoa($(this).attr("data")),"day":btoa(day)};
       	    		   data.push(object);
       	    		  


       	    		}
       	    		else{
       	    			
       	    		}

       	    	});
				   var old_select_city=$("label.prevSelected");
       	    	$(old_select_city).each(function(){
       	    		var days=$(this).parent().find("div.number input.days").val();
       	    		
       	    		if(Number(days)>0){
       	    			var objects={"data":btoa($(this).attr("data")),"day":btoa(days)};
       	    		   data.push(objects);
       	    		  


       	    		}

       	    	});
				
       	    	sessionStorage.setItem("city_details",JSON.stringify(data));
       	    	var all_city_details=JSON.parse(sessionStorage.getItem("city_details"));
       	    	var data=JSON.parse(sessionStorage.getItem("tour"));
       	    	//end store city details data
       	    	 
       	    	

       	    	     $.ajax({
	                 	type:"POST",
	   	               url:"/user/city",
	   	                data:{
	   		                _token:$("body").attr("data"),
	   		                 all_city_details:all_city_details,
	   		                 city:data.city,
	                      	},
	                   	success:function(response){
	   		           if(response=="success"){
	   			        sessionStorage.setItem("tour",JSON.stringify(data));

       	                window.location.href="/trip-start";
	   		            }
	   		
	   	}
	   });   
       	    }
       	    else{
       	    	//store city details data
       	    	var tour_data=JSON.parse(sessionStorage.getItem("tour"));
       	    	tour_data.city.length=0;
       	    	var data=[];
       	    	var all_select_city=$("label.active");
       	    	$(all_select_city).each(function(){
       	    		var day=$(this).parent().find("div.number input.days").val();
       	    			
       	    		if(Number(day)>0){
       	    			var object={"data":($(this).attr("data")),"day":(day)};
       	    		   data.push(object);
       	    		 
       	    		  

       	    		}
       	    		

       	    	});
       	    	sessionStorage.setItem("city_details",JSON.stringify(data));
       	    	var all_city_details=JSON.parse(sessionStorage.getItem("city_details"));
       	    	var data=JSON.parse(sessionStorage.getItem("tour"));
                 
                 
       	    	//end store city details data
       	    	    $.ajax({
	             	type:"POST",
	             	url:"/user/city",
	   	           data:{
	   		       _token:$("body").attr("data"),
	   		       all_city_details:all_city_details,
	   		       city:tour_data.city,
	   	          },
	   	           success:function(response){
	   		      if(response=="success"){
	   			     

       	            window.location.href="/trip-start";
	   		       }
	   		
	   	}
	   });

       	    }

       }
       
        
       

}
else{
	   var all_select_city=$("label.active");
       $(all_select_city).each(function(i){
         if($(this).has("active")){
           var input=$(this).parent().find("div.number input.days").val();
          total_day+=Number(input);
         }
       });

           if(difference_day>total_day){

       	      swal({
              title: "Your Total Trip Days is "+difference_day+" Days",
              text:"Kindly Select All Date ",
              icon: "warning",
              dangerMode: true,
               button:"Close",
               cancelButtonColor: '#d33',

              });

       	    $(".swal-modal").css('background-color', '#FFD2D2');

       }
}

	});
	//end city form submit

	

    var accomodation=[];
    var accomodation_index=0;
	$(".accomodation-box").each(function(){
		$(this).click(function(){
			accomodation_index++
			accomodation.push(accomodation_index);


		});
	});


	$(".accomodation-box-next-btn").click(function(){
		
		var data=JSON.parse(localStorage.getItem("tour"));
		console.log(accomodation);
            return false;
            data.accomodation.length=0;
		

		
		
	});


         var activity=[];
    var activity_index=0;
	$(".activity-box").each(function(){
		$(this).click(function(){

			var value=$(this).attr("data");
			activity.push(value);


		});
	});
	$(".activity-box-next-btn").click(function(){
		var data=JSON.parse(localStorage.getItem("tour"));
		
		if(data.activity.length==0 && activity.length==0){

			alert("Select activity");
		}
		else{
			alert();
			if(data.activity.length==0){
				for(i=0;i<activity.length;i++){
					data.activity.push(activity[i]);
				}
					localStorage.setItem("tour",(JSON.stringify(data)));

			}
			else{
				data.activity.length=0;
				for(i=0;i<activity.length;i++){
					data.activity.push(activity[i]);
				}

					localStorage.setItem("tour",(JSON.stringify(data)));

			}
			
		
		
		console.log(localStorage.getItem("tour"));
		window.location.href="/tour-excursions";
            }
		

		
		
	
		
	});


 //    var tour=[];
 //    var tour_index=0;
 //    $(".tour-box").each(function(){
 //    	$(this).click(function(){
 //    		var value=$(this).attr("data");
 //    		tour.push(value);
 //    	});
 //    });
	// $(".tour-box-next-btn").click(function(){
	// 	if(tour.length==0){
	// 		alert("Select Tour Excusrion");

	// 	}
	// 	else{
	// 	var data=JSON.parse(localStorage.getItem("tour"));
	// 	  if(data.tour.length==0){
	// 	  	  for(i=0;i<tour.length;i++){
	// 	  	  	data.tour.push(tour[i]);
	// 	  	  }

	// 	  	  localStorage.setItem("tour",JSON.stringify(data));
            
 //             tour_index=0;
	// 	  }
	// 	  else{
	// 	         data.tour.length=0; 

	// 	  	for(i=0;i<tour.length;i++){
	// 	  		data.tour.push(tour[i]);
	// 	  	}
	// 	  	localStorage.setItem("tour",JSON.stringify(data));
		  	
 //             tour_index=0;



	// 	  }
	// 	}

	// 	window.location.href="/transport";
	// });

	




//tour done 
$(".tour-done-btn").click(function(){
	$.ajax({
		type:"GET",
		url:"/user-login-check",
		success:function(response){
			
			if(response=="success"){
				$.ajax({
					type:"POST",
					url:"/tour-data",
					data:{
						data:JSON.parse(localStorage.getItem("tour")),
						_token:$("body").attr("data"),
					},
				   beforeSend:function(){
				   	$("#loader-modal").modal("show");
				   },
				   success:function(response){
				   	$("#loader-modal").modal("hide");
				   	console.log(response);
				   	alert(response);
				   	localStorage.removeItem("tour");
				   	
				   }
				});

			}
			else{
				$("#login-modal").modal("show");
			}
		}
	});
});
//edn tour done
});
//end page trip plan page routing

// **********************  END CODING OF USER TRIP PLAN   ***********************//


//customer query contact us page coding start
$(document).ready(function(){
	$(".customer-query-form").submit(function(e){
		e.preventDefault();
		var input=$(this).find("input");
		var textarea=$(this).find("textarea");
		var input_index=0;
		var textarea_index=0;
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
		$(textarea).each(function(){
			if($(this).val().trim()==""){
				$(this).addClass("textarea-place");
				$(this).on("input",function(){
					$(this).removeClass("textarea-place");
				});
			}
			else{
				textarea_index++;
			}
		});

		if(input.length==input_index&& textarea_index==textarea.length){
			$.ajax({
				type:"POST",
			    url:"/customer-query",
			    data:new FormData(this),
			    contentType:false,
			    processData:false,
			    cache:false,
			    beforeSend:function(){
			    	$("#loader-modal").modal("show");
			    },
			    success:function(response){
			    	$("#loader-modal").modal("hide");
			    	  if(response.message=="success"){
			    	  	alert("Your query has been submited successfully");
			    	  	$(".customer-query-form").trigger("reset");
			    	  }
			    	 else{
			    	 	alert(response.message);
			    	 }
			    }
			});
		}

	});
});
//end customer query contact us page ending 









function activity_show(link){
	$.ajax({
				 				type:"GET",
				 				url:"/tour/get-activity-all",
				 				beforeSend:function(){
				 					$("#loader-modal").modal("show");
				 				},
				 				success:function(response){
				 					$("#loader-modal").modal("hide");
				 					$(".activity-box").html("");
				 				
				 					$(link).find("input[type=checkbox]").prop("checked",false);
				 						$(response.data).each(function(i,data){
				 							console.log(data);
				 			var box=`<div class="listView mb-3 ">
                  <div class="row">
                     <div class="col-md-4 col-xs-5">
                        <div class="imgGrid">
                           <img src="admin-asstes/images/activity_image/`+data.activity_image+`">
                        </div>
                     </div>
                     <div class="col-md-8 col-xs-7">
                        <div class="contentGrid">
                           <div class="d-flex just">
                              <div class="gridT">
                                 <h5>`+data.activity_name+`</h5>
                                 <label><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i><i class="fas fa-star yellow"></i>2</label>
                              </div>
                              <div class="deGrid text-right">
                                 <p class="small">From</p>
                                 <h6>USD `+data.price+`</h6>
                                 <p class="small">Price varies by</p>
                                 <p class="small">group size</p>
                              </div>
                           </div>
                           <div class="abc">
                              <p>`+data.overview+`Read More</p>
                              <span>2 hours</span> <span class="mdi">English</span> <span>Free Cancellation</span>
                           </div>
                        </div>
                     </div>
                  </div>
                   </div>`;

                   $(".activity-box").append(box);

				 		});
				 				}
				 			});
}

