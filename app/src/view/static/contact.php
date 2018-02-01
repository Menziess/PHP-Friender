<? include __DIR__ . '/../template/head.php' ?>


<div class="card full">
	<h2 class="full">
		CONTACT
	</h2>
	<h4>
		Adres: Science Park, Amsterdam <br>
		Telefoon: <a href="tel:+310208208060">+31 (0)20 820 80 60</a> <br>
		Mobiel: <a href="tel:+31624846124">+31 6 24 84 61 24</a> <br>
		Email: info@friender.com
	</h4>
</div>

  <body>
    <div id="map" class="full card"
	style="width:100%; height:500px;background:#e5e3df;"></div>

    <script>
	  	var map, infoWindow;
	  	var friender_lat = 52.354657;
		var friender_lng = 4.955311;

		// initialize map
      	function initMap() {
        	map = new google.maps.Map(document.getElementById('map'), {
         		center: {lat: friender_lat, lng: friender_lng},
          		zoom: 12
		});

		// set friender location and marker + infowindow with zoom function
		var friender_location = new google.maps.LatLng(friender_lat, friender_lng);
		var friender_marker = new google.maps.Marker({position:friender_location});
		friender_marker.setMap(map);

		var infowindow_user = new google.maps.InfoWindow({
			content:"Hier is het Friender hoofdkantoor gevestigd!"
		});
		infowindow_user.open(map,friender_marker);

		google.maps.event.addListener(friender_marker,'click',function() {
			map.setZoom(17);
			map.setCenter(friender_marker.getPosition());
		});


        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {

			// determine user location and set marker + infowindow with zoomfuction
			var user_lat = position.coords.latitude;
			var user_lng = position.coords.longitude;
			var user_location = new google.maps.LatLng(user_lat, user_lng);

			// add custom pegman marker
			var pegman = {
				url: '/../../res/img/pegman.png',
				scaledSize: new google.maps.Size(50, 50),
			};
			var user_marker = new google.maps.Marker({
				position:user_location,
				icon:pegman
			});
			user_marker.setMap(map);

			var infowindow_user = new google.maps.InfoWindow({
				content:"U bevindt zich hier!"
			});
			infowindow_user.open(map,user_marker);

			google.maps.event.addListener(user_marker,'click',function() {
				map.setZoom(17);
				map.setCenter(user_marker.getPosition());
				});


			// calculate middle position and set center of map
			var middle_lat = ((friender_lat + user_lat) / 2);
			var middle_lng = ((friender_lng + user_lng) / 2);
			var middle_location = new google.maps.LatLng(middle_lat, middle_lng);
			map.setCenter(middle_location);

          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, friender_location) {
        infoWindow.setPosition(friender_location);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: Jouw huidige locatie kan niet worden gevonden' :
                              'Error: Je browser support geen geolocation diensten');
        infoWindow.open(map);
	  }

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw558myEksBqXYw4IUwyGyoKfCtRaB8lU&callback=initMap">
    </script>
  </body>
</html>
<? include __DIR__ . '/../template/tail.php' ?>
