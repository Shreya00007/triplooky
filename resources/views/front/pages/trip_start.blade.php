@extends("front.layout.header")
@section("title","Trip Start")
@section("content")
<style>
  /*.textBox p{margin:0;}*/
  .numericBox {
    padding: 24px 0px 0px;
  }
  .timilineBox{border-bottom:1px solid #eeeeee;cursor: move;}
  .timilineBox:first-child, .timilineBox:last-child{
    border:none;
  }
  .textBox{
    display:flex;
    justify-content:space-between;
    align-items: center;
  }
</style>
<main id="main">
  <div id="banner">
    <div class="container-fluid bodyPad">
      <h2 class="text-center">Trip Calendar</h2>
    </div>
  </div>
 

  <section class="tripStart" id="pdt-30">
  <div class="timelineSection">
               <div class="container-fluid bodyPad">
                <div class="proBar">
        <p class="prSection active">
          <span style="display:block;text-align:center;">Cities to visit</span>
          <span class="brCheck">
            <i class="fas fa-check"></i>
          </span>
        </p>
        <p class="prSection active">
          <span style="display:block;text-align:center;">Trip Calendar</span>
          <span class="brCheck">2</span>
        </p>        
        <p class="prSection ">
          <span style="display:block;text-align:center;">Accomodation Type</span>
          <span class="brCheck">3</span>
        </p>
        <p class="prSection ">
          <span style="display:block;text-align:center;">Tours & Activities</span>
          <span class="brCheck">4</span>
        </p>
        <p class="prSection">
          <span style="display:block;text-align:center;">Food & Drink</span>
          <span class="brCheck">5</span>
        </p>
        <p class="prSection">
          <span style="display:block;text-align:center;">Transportation</span>
          <span class="brCheck">6</span>
        </p>
        <!-- <p class="prSection">
          <span style="display:block;text-align:center;">Trip Summary</span>
          <span class="brCheck">7</span>
        </p> -->
      </div>
      <br>
              
                  <div class="timilineBox">
                     <div class="timeBox firstBox">
                      
                        <span>Start Date: <span class="start-time"></span></span> <i class="fas fa-sort-down"></i> From <span class="from-city"></span>
                     </div>
                  </div>
                  <div class="box-city connected-sortable droppable-area1">
                    

                   
                  </div>
                 
                  
                 
                 

                  <div class="timilineBox lastt mt-3">
                     <div class="timeBox last">
                        <span>End Date: <span class="end-time"></span></span> <i class="fas fa-sort-down"></i>  At <span class="to-city"></span>
                     </div>
                  </div>
                  
               </div>
            </div>

            <div class="container-fluid bodyPad sticy_pos"> 
                      
              <div class="text-center">
                 <a href="/pick-city" class="btn btn-default">Previous</a>
                <a href="/accomodation" class="btn btn-default">Next</a>
              </div>
            </div>

    <!-- <div class="container-fluid bodyPad">
      <p class="startDate"></p>

      <table class="table table-responsive">
        <tr>
          <th>City Name</th>
          <th>Arrival Date - Departure Date</th>
          <th>Number Of Nights</th>
        </tr>
        <tr>
          <td>Marrakech</td>
          <td>03/01/2022 - 05/01/2022</td>
          <td>2 Nights</td>
        </tr>
        <tr>
          <td>Casablanca</td>
          <td>06/01/2022 - 08/01/2022</td>
          <td>2 Nights</td>
        </tr>
        <tr>
          <td>Rabat</td>
          <td>09/01/2022 - 10/01/2022</td>
          <td>1 Nights</td>
        </tr>
        <tr>
          <td>Tangier</td>
          <td>11/01/2022 - 13/01/2022</td>
          <td>2 Nights</td>
        </tr>
        <tr>
          <td>Agadir</td>
          <td>14/01/2022 - 15/01/2022</td>
          <td>1 Nights</td>
        </tr>
      </table>


      <div class="text-right">
         <a href="accomodation.php" class="btn btn-default">Next</a>
       </div>
    </div> -->
  </section>
</main>

<script>
 
 
         $( init );
         function init() {
           $( ".droppable-area1, .droppable-area2" ).sortable({
               connectWith: ".connected-sortable",
               stack: '.connected-sortable ul'
             }).disableSelection();
         }
      </script>

<script type="text/javascript">
 var data=JSON.parse(sessionStorage.getItem("tour"));
if(data==null){
  window.location.href="/";

}else{
    if(data.arrival_date=="" && data.departure_date==""){
    window.location.href="/";
   }
}

</script>


<script type="text/javascript">

  
   $(document).ready(function(){
     
     getTripDetails();

     
      var data=   JSON.parse(sessionStorage.getItem("city_details"));
    
   });

   function getDaysInMonth(month,year){
    return new Date(year,month,0).getDate();
   }



   function getTripDetails(){
      $.ajax({
         type:"POST",
         url:"/get-trip-city",
         data:{
            data:JSON.parse(sessionStorage.getItem("tour")),
            _token:$("body").attr("data"),
         },
         beforeSend:function(){
          $(".loader").removeClass("d-none");
           

         },
         success:function(response){
          console.log(response);
       
        
           $(".loader").addClass("d-none");
        
           
  var city_details=JSON.parse(sessionStorage.getItem("city_details"));
          var data=JSON.parse(sessionStorage.getItem("tour"));
         
          //date difference
           var dateString1 = data.arrival_date; // Oct 23

var dateParts1 = dateString1.split("/");

// month is 0-based, that's why we need dataParts[1] - 1
var date1 = new Date(+dateParts1[2], dateParts1[1] - 1, +dateParts1[0]);

var dateString2 = data.departure_date; // Oct 23

var dateParts2 = dateString2.split("/");

// month is 0-based, that's why we need dataParts[1] - 1
var date2 = new Date(+dateParts2[2], dateParts2[1] - 1, +dateParts2[0]); 
    
           //end date difference
            
           
            $(".start-time").html(data.arrival_date);
            $(".end-time").html(data.departure_date);
            var selected_city=[];
              var arrival_date=date1;
            var numberOfDaysToAdd =0;
          var day_length=(response.data.length-1);
         $(data.city).each(function(index,data){
         
     var index_data=city_details.map(e => e.data).indexOf(data);
         
         
          var city_index_data=city_details[index_data];
         
     numberOfDaysToAdd += Number((city_index_data.day));

var departure_date = new Date(date1.getTime()+(numberOfDaysToAdd*24*60*60*1000));
  console.log("Arrivate Date= "+arrival_date.toLocaleDateString('pt-PT') +"Departure Date="+departure_date.toLocaleDateString('pt-PT')+"\n");
  var box=` <div class="timilineBox draggable-item">
                     <div class="timeBox numericBox">
                        <span class="nm">`+(index+1)+`</span> <span class="tt">`+(response.data[index].city_name)+`</span> <i class="fas fa-sort-down"></i>
                     </div>
                     <div class="textBox flyDrive">
                        <p>Arrival Date : <b>`+arrival_date.toLocaleDateString('pt-PT')+`</b></p> 
                        <p>Departure Date : <b>`+departure_date.toLocaleDateString('pt-PT')+`</b></p> 
                     </div>
                  </div>`;

                  $(".box-city").append(box);
                   arrival_date=departure_date;

       

         });

         

         }
      });
   }
</script>
<style type="text/css">
  button.btn.btn-default {
    background: #006994;
    color: #ffffff;
    padding: 8px 32px;
}
</style>


@endsection

