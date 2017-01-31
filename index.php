<!DOCTYPE html>
<html>

<!--Map Website -->
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Pin My Map</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	<script type="text/javascript" src="js/register.js"></script>
	<script type="text/javascript" src="js/initMap.js"></script>
	<link href="css/sidebar.css" rel="stylesheet" type="text/css" />
  </head>

  <body>
	<div class="container">
		<div id="idPrintArea">
			<div id="map">
			</div>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD09rEk2uHqpQ0OLGgTlWCTf61YOa6_t9g&callback=initMap"
				async defer>
			</script>
		</div>	
		<div class="sidebar">
			<!-- <div class="background">-->
				<img id="nautical" src="img/anchor.jpg" alt="Background image"> 
			<!--</div> -->
			<h1> Pin My Map </h1>
			<div class="print">
				<h2> Save and print your map </h2>
				<p id="instructions"> Click on the map to mark the places you have been.  Then press the button to save your map.</p>
				<br>
				<a id="static" class="button" href="https://maps.googleapis.com/maps/api/staticmap?size=512x512&zoom=2&markers=40.718217,-73.998284&key=AIzaSyCojkB2pnP47YUFqrJSn5E8yQNQQN-9J9A"> Save & Print Image</a>	
			</div> <!-- /print -->
				
			<div class="subscribe">
				<h2> Receive the Pin My Map Newsletter </h2>
				<p id="signup"> Sign up to receive Pin My Map updates! </p> 
				<div class="subscribe-form">
					<form id="subscribe-form">
						<input id="email" type="email" class="input-block-level" placeholder="Email" name="email" required>
						<input type="submit" value="Subscribe" name="subscribe" class="button" onClick="register()"/>
					</form>
				</div>
			</div> <!-- /subscribe -->
		</div> <!-- /sidebar -->
		
	<!--	<script>
	
			//Create a Map
			var map;
			function initMap() {
				var myLatLng = {lat: 40.044, lng: -126.738};
				map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 3,
				  center: myLatLng
				});
				
				//add LatLng to Markers array
				markers = new Array();
					
				//Add an event listener that listens for a click on the map and creates a marker there.
				google.maps.event.addListener(map, "click", function (event) {
					//create a marker
					marker = new google.maps.Marker({
						position: event.latLng,
						map: map
						});
					//remove the parentheses around LatLng for static map url
					var cleanMarker = marker.getPosition().toString(6).match(/[^()]+/);
					var cleanerMarker = cleanMarker + '|';
					markers.push(cleanerMarker);
					
					//create the static map url with Markers array
					var url = "https://maps.googleapis.com/maps/api/staticmap?size=640x640&zoom=2&format=jpg&markers="+ markers +"&key=AIzaSyCojkB2pnP47YUFqrJSn5E8yQNQQN-9J9A";
					
					//remove the commas
					var cleanURL = url.replace(/(\|,)/g, "|");
					document.getElementById("static").href = cleanURL;
				});
			}	
		
		</script>-->

	</div> <!-- end container -->
  </body>
</html>