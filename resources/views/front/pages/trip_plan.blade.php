@extends("front.layout.header")

@section("title","Trip Plan")
@section("content")
<style>
	#reportrange, .travL, .travL p.txtL{width:100%;border-radius:6px 6px;}
</style>
<main id="main">  
	<div id="tripBanner">
		<div class="container-fluid bodyPad">
			<div class="d-flex justify-content aligns-center">
				<div class="bnLeft">
					<h2>
						The new way to plan your next trip. Create a fully customize day by day itinerary for free 
					</h2>
				</div>
				<div class="bnRight">
					<div class="trip-form">
						<form>
							<h2 class="text-center" style="color:#ffffff;">Itinerary planner</h2>
							<!-- <div class="form-middle mt-5 mb-5">
								<div style="position: relative;">
									<input role="combobox" id="" type="text" class="search biginput form-control" autocomplete="off" aria-owns="res" aria-autocomplete="both" placeholder="Enter Destination {Region, City}"><i class="fas fa-question-circle" id="help"></i>
								</div>
								<div class="apF">
									
								</div>
								<div class="autocomplete-suggestions" id="search-autocomplete"></div>
								<a href="javascript:void(0);" class="addDestination">+ Add destination</a>
							</div> -->
							<div class="d-flex mt-5">
								<div id="reportrange" class="pull-left posRe">
			                          <i class="fas fa-calendar-alt"></i>&nbsp;
			                          <span></span> <b class="caret"></b>
			                          <input type="text" class="form-control abs g" placeholder="Arrival Date 🠒 Departure Date" id="reportrange">
			                          <i class="fas fa-calendar-alt g" id="reportrange"></i>
			                      </div>
							</div>

								<div class="travL mt-3">
									<p class="txtL"><span>0</span> Travelers</p>
									<div class="travlNo">
											<div>
												<span class="tb">Adult</span>
												<span class="bt">
													<div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
													  <input type="number" id="number" value="0"/>
													<div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
												</span>
											</div>
											<div>
												<span class="tb">Teens</span>
												<span class="bt">
													<div class="value-button" id="decrease1" onclick="decreaseValue1()" value="Decrease Value">-</div>
													  <input type="number" id="number1" value="0" />
													<div class="value-button" id="increase1" onclick="increaseValue1()" value="Increase Value">+</div>
												</span>
											</div>
											<div>
												<span class="tb">Kids</span>
												<span class="bt">
													<div class="value-button" id="decrease2" onclick="decreaseValue2()" value="Decrease Value">-</div>
													  <input type="number" id="number2" value="0" />
													<div class="value-button" id="increase2" onclick="increaseValue2()" value="Increase Value">+</div>
												</span>
											</div>
										<a href="javascript:void(0);" class="addPass">Save</a>
									</div>
								</div>
							<a href="/pick-city" class="btn btn-success" id="saveTrip">Next</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Blog listing section start -->
	<input type="hidden" value="0" id="firstV" class="add">
	<input type="hidden" value="0" id="secondV" class="add">
	<input type="hidden" value="0" id="thirdV" class="add">
</main>

<script>
	$(document).ready(function() {
	var suburbs = ["Aberfeldy Township", "Altona", "Arthurs Creek", "Arthurs Seat", "Ashwood", "Bacchus Marsh Werribee River", "Ballan", "Beaconsfield Upper", "Beenak", "Berwick", "Blackburn", "Blackburn North", "Blue Mountain", "Box Hill", "Braeside", "Braeside Park", "Broadmeadows", "Brooklyn", "Bulla", "Bulla North", "Bulleen", "Bundoora", "Burnley", "Burwood East", "Cambarville", "Cardinia", "Caulfield", "Caulfield North", "Cement Creek", "Christmas Hills", "Clarkefield", "Clarkefield", "Clayton", "Clearwater Aqueduct", "Coburg", "Coldstream", "Collingwood", "Craigieburn", "Craigieburn East", "Cranbourne", "Dandenong", "Dandenong South", "Dandenong West", "Darraweit", "Deer Park", "Devilbend Reservoir", "Diggers Rest", "Dixons Creek", "Doncaster", "Doncaster East", "Drouin West", "Durdidwarrah", "Eastern G.C. Doncaster", "Elsternwick", "Eltham", "Emerald", "Epping", "Essendon", "Fairfield", "Fawkner", "Fiskville", "Flemington", "Footscray", "Frankston North", "Frankston Pier", "Gardiner", "Glen Forbes South", "Glen Waverley", "Graceburn", "Graceburn Creek Aqueduct", "Greensborough", "Greenvale Reservoir", "Groom's Hill", "Hampton", "Hampton Park", "Hawthorn", "Headworks", "Healesville", "Heathmont", "Heidelberg", "Hurstbridge", "Iona", "Ivanhoe", "Kangaroo Ground", "Keilor", "Keilor North", "Kew", "Keysborough", "Kinglake", "Knox", "Konagaderra", "Kooweerup", "Lake Borrie", "Lancefield", "Lancefield North", "Launching Place", "Lilydale Lake", "Little River", "Loch", "Longwarry North", "Lower Plenty", "Lyndhurst", "Lysterfield", "Maribyrnong", "Maroondah Reservoir", "Melton Reservoir", "Melton Sth Toolern Creek", "Mentone", "Mernda", "Millgrove", "Mitcham", "Montrose", "Mooroolbark", "Mornington", "Mount Dandenong", "Mount Evelyn", "Mount View", "Mt Blackwood", "Mt Bullengarook", "Mt Donna Buang", "Mt Evelyn Stringybark Creek", "Mt Gregory", "Mt Hope", "Mt Horsfall", "Mt Juliet", "Mt Macedon", "Mt St Gwinear", "Mt St Leonard", "Mt Waverley", "Myrrhee", "Narre Warren North", "Nayook", "Neerim South", "Neerim-Elton Rd", "Neerim-Neerim Creek", "Neerim-Tarago East Branch", "Neerim-Tarago West Branch", "North Wharf", "Northcote", "Notting Hill", "Nutfield", "O'Shannassy Reservoir", "Oakleigh South", "Officer", "Officer South", "Olinda", "Pakenham", "Pakenham East", "Pakenham West", "Parwon Parwan Creek", "Poley Tower", "Preston", "Reservoir", "Ringwood", "Rockbank", "Romsey", "Rosslynne Reservoir", "Rowville", "Sandringham", "Scoresby", "Seaford", "Seaford North", "Seville East", "Silvan", "Smiths Gully", "Somerton", "Southbank", "Spotswood", "Springvale", "St Albans", "St Kilda Marina", "Sunbury", "Sunshine", "Surrey Hills", "Tarago Reservoir", "Tarrawarra", "Templestowe", "The Basin", "Thomson Dam", "Tonimbuk", "Toolern Vale", "Torourrong Reservoir", "U/S Goodman Creek Lerderderg River", "Upper Lang Lang", "Upper Pakenham", "Upper Yarra Dam", "Wallaby Creek", "Wallan", "Wantirna South", "Warrandyte", "Williamstown", "Woori Yallock", "Woori Yallock Creek", "Wyndham Vale", "Yallock outflow Cora Lyn", "Yannathan", "Yarra Glen", "Yarra Glen Steels Creek", "Yarra Junction", "Yarra River downstream Doctors Creek", "Yellingbo", "Yering"];
	var cache = {};
	var searchedBefore = false;
	var counter = 1;
	var highligtCounter = 0;
	var keys = {
		ESC: 27,
		TAB: 9,
		RETURN: 13,
		LEFT: 37,
		UP: 38,
		RIGHT: 39,
		DOWN: 40
	};
	$(".search").on("input", function(event) {
		doSearch(suburbs);
	});

	$(".search").on("keydown", function(event) {
		doKeypress(keys, event);
	});
	});

	function doSearch(suburbs) {
		var query = $(".search").val();
		$(".search").removeAttr("aria-activedescendant");
		//$('#hint').val('');

		if ($(".search").val().length >= 2) {

			//Case insensitive search and return matches to build the  array
			var results = $.grep(suburbs, function(item) {
				return item.search(RegExp("^" + query, "i")) != -1;

			});

			if (results.length >= 1) {
				$("#res").remove();
				$('#announce').empty();
				$(".autocomplete-suggestions").show();
				$(".autocomplete-suggestions").append('<div id="res" role="listbox" tabindex="-1"></div>');
				counter = 1;
			}

			//Bind click event to list elements in results
			$("#res").on("click", "div", function() {
				$(".search").val($(this).text());
				$("#res").remove();
				$('#announce').empty();
				$(".autocomplete-suggestions").hide();
				counter = 1;

			});

			//Add results to the list
			for (term in results) {

				if (counter <= 5) {
					$("#res").append("<div role='option' tabindex='-1' class='autocomplete-suggestion py-3' id='suggestion-" + counter + "'>" + results[term] + "</div>");
					counter = counter + 1;
				}

			}
			var number = $("#res").children('[role="option"]').length
			if (number >= 1) {
				$("#announce").text(+number + " suggestions found" + ", to navigate use up and down arrows");
			}

		} else {
			$("#res").remove()
			$('#announce').empty();
			$(".autocomplete-suggestions").hide();
		}

	}

	function doKeypress(keys, event) {
		var highligted = false;
		highligted = $('#res').children('div').hasClass('highligt');
		switch (event.which) {

			case keys.ESC:
				$(".search").removeAttr("aria-activedescendant");
				//$('#hint').val('');
				$("#res").remove();
				$('#announce').empty();
				$(".autocomplete-suggestions").hide();
				break;

			case keys.RIGHT:

				return selectOption(highligted)
				break;

			case keys.TAB:
				$(".search").removeAttr("aria-activedescendant");
				//$('#hint').val('');
				$("#res").remove();
				$('#announce').empty();
				$(".autocomplete-suggestions").hide();
				break;

			case keys.RETURN:
				if (highligted) {
					event.preventDefault();
					event.stopPropagation();
					return selectOption(highligted)
				}

			case keys.UP:
				event.preventDefault();
				event.stopPropagation();
				return moveUp(highligted);
				break;

			case keys.DOWN:
				event.preventDefault();
				event.stopPropagation();

				return moveDown(highligted);
				break;

			default:
				return;
		}
	}

	function moveUp(highligted) {
		var current;
		$(".search").removeAttr("aria-activedescendant");
		//$('#hint').val('');
		if (highligted) {
			console.log("Highlighted - " + highligted + "");
			current = $('.highligt');
			current.attr('aria-selected', false);
			current.removeClass('highligt').prev('div').addClass('highligt');
			current.prev('div').attr('aria-selected', true);
			$(".search").attr("aria-activedescendant", current.prev('div').attr('id'));
			//$('#hint').val($('.highligt').text());
			highligted = false;
		} else {

			//Go back to the bottom of the list

			current = $("#res").children().last('div');
			current.addClass('highligt');
			current.attr('aria-selected', true);
			$(".search").attr("aria-activedescendant", current.attr('id'));
			//$('#hint').val($('.highligt').text());

		}
	}

	function moveDown(highligted) {

		var current;
		$(".search").removeAttr("aria-activedescendant");
		//$('#hint').val('');
		if (highligted) {
			console.log("Highlighted - " + highligted + "");
			current = $('.highligt');
			current.attr('aria-selected', false);
			current.removeClass('highligt').next('div').addClass('highligt');
			current.next('div').attr('aria-selected', true);
			$(".search").attr("aria-activedescendant", current.next('div').attr('id'));
			//$('#hint').val($('.highligt').text());
			highligted = false;
		} else {

			//Go back to the top of the list
			current = $("#res").children().first('div');
			current.addClass('highligt');
			current.attr('aria-selected', true);
			$(".search").attr("aria-activedescendant", current.attr('id'));
			//$('#hint').val($('.highligt').text());

		}
	}

	function selectOption(highligted) {
		if (highligted) {
			$(".search").removeAttr("aria-activedescendant");
			//$('#hint').val('');
			$('.search').val($('.highligt').text());
			$('.search').focus();
			$("#res").remove();
			$('#announce').empty();
			$(".autocomplete-suggestions").hide();
		} else {
			return;
		}
	}
</script>
<script>
	$('.addDestination').click(function() {
		$(".apF").append('<div style="position: relative;">	<input role="combobox" id="" type="text" class="biginput search form-control" autocomplete="off" aria-owns="res" aria-autocomplete="both" placeholder="Enter Destination {Region, City}"><i class="fas fa-question-circle" id="help"></i></div>');
	})
	
</script>
<script>
	function increaseValue() {
	  var value = parseInt(document.getElementById('number').value, 10);
	  var hidValue = parseInt(document.getElementById('firstV').value, 10);
	  value = isNaN(value) ? 0 : value;
	  value++;
	  hidValue = isNaN(hidValue) ? 0 : hidValue;
	  hidValue++;
	  document.getElementById('number').value = value;
	  document.getElementById('firstV').value = hidValue;
	}

	function decreaseValue() {
	  var value = parseInt(document.getElementById('number').value, 10);
	  value = isNaN(value) ? 0 : value;
	  var hidValue = parseInt(document.getElementById('firstV').value, 10);
	  value < 1 ? value = 1 : '';
	  value--;

	  hidValue = isNaN(hidValue) ? 0 : hidValue;
	  hidValue--;
	  document.getElementById('number').value = value;
	  document.getElementById('firstV').value = value;
	}
	// 
	function increaseValue1() {
	  var value = parseInt(document.getElementById('number1').value, 10);
	  var hidValue = parseInt(document.getElementById('secondV').value, 10);
	  value = isNaN(value) ? 0 : value;
	  value++;

	  hidValue = isNaN(hidValue) ? 0 : hidValue;
	  hidValue++;
	  document.getElementById('number1').value = value;
	  document.getElementById('secondV').value = value;
	}

	function decreaseValue1() {
	  var value = parseInt(document.getElementById('number1').value, 10);
	  var hidValue = parseInt(document.getElementById('secondV').value, 10);
	  value = isNaN(value) ? 0 : value;
	  value < 1 ? value = 1 : '';
	  value--;

	  hidValue = isNaN(hidValue) ? 0 : hidValue;
	  hidValue--;
	  document.getElementById('number1').value = value;
	  document.getElementById('secondV').value = value;
	}
	// 
	function increaseValue2() {
	  var value = parseInt(document.getElementById('number2').value, 10);
	  var hidValue = parseInt(document.getElementById('thirdV').value, 10);
	  value = isNaN(value) ? 0 : value;
	  value++;

	  hidValue = isNaN(hidValue) ? 0 : hidValue;
	  hidValue++;
	  document.getElementById('number2').value = value;
	  document.getElementById('thirdV').value = value;
	}

	function decreaseValue2() {
	  var value = parseInt(document.getElementById('number2').value, 10);
	  var hidValue = parseInt(document.getElementById('thirdV').value, 10);
	  value = isNaN(value) ? 0 : value;
	  value < 1 ? value = 1 : '';
	  value--;


	  hidValue = isNaN(hidValue) ? 0 : hidValue;
	  hidValue--;
	  document.getElementById('number2').value = value;
	  document.getElementById('thirdV').value = value;
	}

</script>
<script>
	$('.txtL').click(function(){
		$('.travlNo').toggleClass('show');
	});
	// 


$('.addPass').click( function(){
  
  var a_value = $('#firstV').val();
  var b_value = $('#secondV').val();
  var c_value = $('#thirdV').val();
  
  $('.txtL span').text(parseInt(a_value) + parseInt(b_value)+ parseInt(c_value));
  $('.travlNo').removeClass('show');
});

	
</script>
<script>
	/Initialize the modal
const myModal = new modal({
  target: document.getElementById("modal"),
  props: {
    visible: false,  //Don't show on page start
    bgclose: true,   //Close the modal if you click the background
    heading: "Cool modal, man",
    content: "<p>And it's so easy to use!</p>",
    topoffset: "-3rem",  //Move the inner modal up from middle of page
    buttons: [
      {
        text: "Close me!",
        class: "red",
        event: "close"
      },
      {
        text: "Alert me!",
        event: "alert"
      }
    ]
  }
})

//Bind modal open to function (called by button click)
function openModal(){
  myModal.$set({
    visible: true
  })
}

//Bind to button clicks
let button = document.getElementById("btn")
button.addEventListener("click", openModal)

//Bind modal's close event to a function
myModal.$on("close", function(){
  myModal.$set({
    visible: false
  })
})

//Bind modal's alert event to a function
myModal.$on("alert", function(){
  alert("Hey! You got an alert!")
})
</script>
@endsection