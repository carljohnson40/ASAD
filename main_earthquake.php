<!DOCTYPE html>
<html>
  <head>
    <style>
      html, body, #map_canvas { margin: 0; padding: 0; height: 80%; }
    </style>
    <script
      src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=visualization">
    </script>
    <script>
      var map;

      function initialize() {
        var mapOptions = {
          zoom: 2,
          center: new google.maps.LatLng(2.8,-187.3),
          mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        map = new google.maps.Map(document.getElementById('map_canvas'),
              mapOptions);

        // Create a <script> tag and set the USGS URL as the source.
        var script = document.createElement('script');
        script.src = 'earthquake_GeoJSONP';
        document.getElementsByTagName('head')[0].appendChild(script);
      }

      // Loop through the results array and place a marker for each
      // set of coordinates.
	  var result_length;
      window.eqfeed_callback = function(results) {
	    result_length=results.features.length;
        for (var i = 0; i < results.features.length; i++) {
          var coords = results.features[i].geometry.coordinates;
          var latLng = new google.maps.LatLng(coords[1],coords[0]);
          var marker = new google.maps.Marker({
            position: latLng,
            map: map
          });
        }
      }
	  function displayDate()
	  {
		  document.getElementById("demo").innerHTML=result_length;
	  }

  </script>
  </head>
  <body onload="initialize()">
    <div id="map_canvas"></div>
	<h1>My First JavaScript</h1>
	<p id="demo">This is a paragraph.</p>
	<button type="button" onclick="displayDate()">Display Date</button>
  </body>
</html>