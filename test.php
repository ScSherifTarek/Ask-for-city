<?php
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Authorization: 563492ad6f91700001000001e4733e5932e54d568907c686fccb911b" 
  )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('https://api.pexels.com/v1/search?query=cairo&per_page=15&page=1', false, $context);
$data = json_decode($file);
foreach ($data->photos as $image) {
	echo '<br>'.'<img width="50%" src="'.$image->src->original.'"><br>';
}
echo '<pre>';
print_r($data);
echo '</pre>';
die();
?>
 
<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3451.5575319463437!2d31.24469431446111!3d30.10685598185964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDA2JzI0LjciTiAzMcKwMTQnNDguOCJF!5e0!3m2!1sen!2seg!4v1550695730740" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->
<!-- <!DOCTYPE html>
<html>
  <head>
    <title>Place Searches</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var service;
      var infowindow;

      function initMap() {
        var sydney = new google.maps.LatLng(-33.867, 151.195);

        infowindow = new google.maps.InfoWindow();

        map = new google.maps.Map(
            document.getElementById('map'), {center: sydney, zoom: 15});

        var request = {
          query: 'Museum of Contemporary Art Australia',
          fields: ['name', 'geometry'],
        };

        service = new google.maps.places.PlacesService(map);

        service.findPlaceFromQuery(request, function(results, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
              createMarker(results[i]);
            }

            map.setCenter(results[0].geometry.location);
          }
        });
      }

      function createMarker(place) {
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
  </head>
  <body>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnlgIpik3NdLrHeBE9HMWbtUqqgODxOU0&libraries=places&callback=initMap" async defer></script>
  </body>
</html> -->
<?php
die();

require_once('config.php');
$apiData = file_get_contents('https://www.youtube.com/results?search_query=Laravel');
$weather = $apiData;



echo '<pre>';
print_r(htmlentities($weather));
echo '</pre>';