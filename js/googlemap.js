// JavaScript Document
var myCenter=new google.maps.LatLng(-6.257344,106.79958899999997);
		var marker;

		function initialize()
		{
		var mapProp = {
  		center:myCenter,
  		zoom:15,
  		mapTypeId:google.maps.MapTypeId.ROADMAP
  		};

		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		marker=new google.maps.Marker({
  		position:myCenter,
  		animation:google.maps.Animation.BOUNCE
  		});

		marker.setMap(map);

		var infowindow = new google.maps.InfoWindow({
  		content:"Waffle & Co         "
  		});

		infowindow.open(map,marker);
		}

		google.maps.event.addDomListener(window, 'load', initialize);