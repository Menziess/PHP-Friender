<? include __DIR__ . '/../template/head.php' ?>

<div class="container">
	<div class="grid">

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

		<div id="map" class="card full"
			style="width:100%; height:300px;background:#e5e3df;">
			<script>
				function myMap() {
					var myCenter = new google.maps.LatLng(52.355343,4.954019);
					var mapCanvas = document.getElementById("map");
					var mapOptions = {center: myCenter, zoom: 11};
					var map = new google.maps.Map(mapCanvas, mapOptions);
					var marker = new google.maps.Marker({position:myCenter});
					marker.setMap(map);
					google.maps.event.addListener(marker,'click',function() {
						var infowindow = new google.maps.InfoWindow({
							content:"Hier is het Friender hoofdkantoor gevestigd!"
						});
						infowindow.open(map,marker);
					});

					// Zoom to 15 when clicking on marker
					google.maps.event.addListener(marker,'click',function() {
						map.setZoom(15);
						map.setCenter(marker.getPosition());
					});
				}
			</script>
			<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw558myEksBqXYw4IUwyGyoKfCtRaB8lU&callback=myMap"></script>
		</div>
	</div>
</div>

<? include __DIR__ . '/../template/tail.php' ?>
