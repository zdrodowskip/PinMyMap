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
		