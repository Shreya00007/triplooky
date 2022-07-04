@extends("front.layout.header")
@section("title","Pick city")
@section("content")
<style>
    span {cursor:pointer; }
    .minus, .plus{
      width: 40px;
      height: 33px;
      background: #f2f2f2;
      border-radius: 4px;
      padding: 0px 5px 0px 5px;
      border: 1px solid #ddd;
      display: inline-block;
      line-height: 1.3;
      vertical-align: middle;
      text-align: center;
      font-size: 26px;
    }
    .pm{
      height:34px;
      width: 100px;
      text-align: center;
      font-size: 26px;
      border:1px solid #ddd;
      border-radius:4px;
      display: inline-block;
      vertical-align: middle;
}
div.number{display: none;}
.button-group-pills .btn{height: 200px;}
</style>
<main id="main">
   <div id="banner">
      <div class="container">
         <h2 class="text-center">Pick up cities to visit</h2>
      </div>
   </div>
   <section class="form-section mt-3">
     <div class="container">
       <form>
         <div class="row">
           <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Marrakech</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                  <label class="btn btn-default active">
                    <input type="checkbox" class="chbox" name="options">     
                    <img src="{{url('')}}/front-assets/assets/img/Mask Group 47.png" class="citiesImg">               
                  </label>
                  <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Casablanca</div>
              <div class="citiesS">
               <div class="button-group-pills text-center" data-toggle="buttons">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">  
                  <img src="{{url('')}}/front-assets/assets/img/valburis.png" class="citiesImg">                
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Rabat</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
              <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">                  
                  <img src="{{url('')}}/front-assets/assets/img/Mask Group 47.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
              </div>
            </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Tangier</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/mauly idris.png" class="citiesImg">                  
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Chefchaouen</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/img2.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Agadir</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/img2.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Ouarzazate</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/Group 48.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Essaouira</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/Mask Group 47.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Dakhla</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/valburis.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Taroudant</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/mauly idris.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
              <div class="text-center">Fez</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/afrrica.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 pick-city-box">
             <div class="form-group">
               <div class="text-center">Meknes</div>
               <div class="button-group-pills text-center" data-toggle="buttons">
                <div class="citiesS">
                <label class="btn btn-default">
                  <input type="checkbox" class="chbox" name="options">
                  <img src="{{url('')}}/front-assets/assets/img/img2.png" class="citiesImg">
                </label>
                <div class="number">
                    <span class="minus">-</span>
                    <input class="pm" type="text" value="1"/>
                    <span class="plus">+</span>
                  </div>
                </div>
              </div>
             </div>
           </div>
         </div>
       </form>
       <div class="text-right">
         <a href="/trip-start" class="btn btn-default">Next</a>
       </div>
     </div>
   </section>
</main>

<script>
    $(document).ready(function() {
      $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
      });
      $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
      });
    });
</script>
<script>
 
  $(".chbox").click(function() {
    if($(this).is(":checked")) {
        $(this).parent().parent().find(".number").show();
    } else {
      $(this).parent().parent().find(".number").hide();
    }
});
</script>
@endsection