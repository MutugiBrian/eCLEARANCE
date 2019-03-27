var myLatLng = new google.maps.LatLng(-1.2921, 36.8219);  
	var infowindow;
	var marker;
	var geocoder;
	var map;

	var image = './img/redmarker40.png';

	address='';

	temp = "10.76754--";

	function initialize() {

		var mapOptions = {

		  zoom: 10,

		  mapTypeId: google.maps.MapTypeId.ROADMAP,

		  center: myLatLng

		};



    	map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);
		geocoder = new google.maps.Geocoder();
		

        document.getElementById("lat").value = myLatLng.lat().toFixed(5);

    	document.getElementById("lng").value =myLatLng.lng().toFixed(5);

		marker = new google.maps.Marker({

			  map:map,

			  draggable:true,

			  animation: google.maps.Animation.DROP,

			  position: myLatLng,

			  icon: image

		});   	

		

		//Create a infowindow

		infowindow = new google.maps.InfoWindow({

				content: 'Move or Select new location !',

				position: myLatLng

			});

		infowindow.open(map);

		// Create a Geocoder() to get address

		geocoder = new google.maps.Geocoder();

		var newaddress;

		function getAddress(latLng) {

			

			geocoder.geocode( {'latLng': latLng},

			  function(results, status) {

				if(status == google.maps.GeocoderStatus.OK) {

				  if(results[0]) {

					document.getElementById("newaddress").value = results[0].formatted_address;

					address=results[0].formatted_address;

					temp = results[0].formatted_address;

					

					infowindow.setContent('Address: '+address);	

			infowindow.setPosition(latLng);

				  }

				  else {

					document.getElementById("newaddress").value = "No results";

					address="No results";

					infowindow.setContent('Latitude: ' + latLng.lat().toFixed(5)+'<br/>Longitude: '+latLng.lng().toFixed(5)+'<br/>Adress: '+address);	

			infowindow.setPosition(latLng);

				  }

				}

				else {

				  document.getElementById("newaddress").value = status;

				  address=status;

				  infowindow.setContent('Latitude: ' + latLng.lat().toFixed(5)+'<br/>Longitude: '+latLng.lng().toFixed(5)+'<br/>Adress: '+address);	

			infowindow.setPosition(latLng);

				}

				infowindow.open(map);

			  });

		}

		

		// Listen mouseup event

		google.maps.event.addListener(marker, 'mouseup', function(event) {   

			document.getElementById("lat").value = event.latLng.lat().toFixed(5);

			document.getElementById("lng").value =event.latLng.lng().toFixed(5);

			getAddress(event.latLng);

			map.setCenter(event.latLng);			

		});

		google.maps.event.addListener(map, 'click', function(event) {   

			document.getElementById("lat").value = event.latLng.lat().toFixed(5);

			document.getElementById("lng").value =event.latLng.lng().toFixed(5);

			getAddress(event.latLng);	

			marker.setPosition(event.latLng);

			map.setCenter(event.latLng);		

		});
		/*
		google.maps.event.addListener(map, 'zoom_changed', function() {			

			map.setCenter(marker.getPosition());			

	 	});*/

	//google.maps.event.addListener(marker, 'click', toggleBounce);

  }	
  
  function getLatLng() {
	 var a= document.getElementById('selectDistrict').options[document.getElementById('selectDistrict').selectedIndex].text;
		var b=document.getElementById('selectTinhTP').options[document.getElementById('selectTinhTP').selectedIndex].text;  
			
	 var address2 = a+','+b;
	 //alert(address2);
    geocoder.geocode({
      'address': address2,
      'partialmatch': true}, geocodeResult);	  
	 
    }
	function geocodeResult(results, status) {
    if (status == 'OK' && results.length > 0) {
      map.fitBounds(results[0].geometry.viewport);
	  marker.setPosition(map.getCenter());
	   infowindow.setContent("Address:"+ results[0].formatted_address);	
			infowindow.setPosition(map.getCenter());
			document.getElementById("lat").value = map.getCenter().lat().toFixed(5);
    	document.getElementById("lng").value =map.getCenter().lng().toFixed(5);
		document.getElementById("newaddress").value = results[0].formatted_address;

	 // alert(results.length);
    }
  }