<?php
require_once('config.php');

function weatherAPI($city , $key)
{
  $city = urlencode($city);
  $key = urlencode($key);
  $apiData = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID='.$key);
  validation($apiData);
  $weather = json_decode($apiData);
  return $weather ;
}
function timeAPI($lon, $lat, $key)
{
  $lon = urlencode($lon);
  $lat = urlencode($lat);
  $key = urlencode($key);
  $apiData = file_get_contents('http://api.timezonedb.com/v2.1/get-time-zone?key='.$key.'&format=json&by=position&lat='.$lat.'&lng='.$lon.'');
  $time = json_decode($apiData);
  return $time;
}    
function imagesAPI($city, $country, $numOfPages, $key, $page = 1)
{
   $opts = array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"Authorization: ".$key."" 
      )
    );
  $context = stream_context_create($opts);

  $q = urlencode($city.' '.$country);
  $numOfPages = urlencode($num);
  $page = urlencode($page);

  $file = file_get_contents('https://api.pexels.com/v1/search?query='.$city.' '.$country.'&per_page='.$numOfPages.'&page='.$page.'', false, $context);
  
  $data = json_decode($file);
  $imageSrcs = $data->photos;
  return $imageSrcs;
}
function getInfo($city, $weather, $time)
{
  $cityInfo = array();
  $cityInfo["name"] = $_POST['city'];
  $cityInfo["country"] = $time->countryName;
  $cityInfo["temperature"] = ($weather->main->temp) -273.15;
  $cityInfo["time"] = $time->formatted;
  return $cityInfo;
}
function validation ($data)
{
  if($data == "")
  {
    header('location: index.php?error="Please Enter A Valid City"');
  }
}
if (isset($_POST['getWeather']) && isset($_POST['city'])) {
    $weather = weatherAPI($_POST['city'],WEATHERKEY);
    echo '<h1>'.$_POST['city'].'</h1>';
    echo '<pre>';
    print_r($weather);
    echo '</pre>';

    
    $lon = $weather->coord->lon;
    $lat = $weather->coord->lat;
    $time = timeAPI($lon, $lat, TIMEKEY);
    echo '<pre>';
    print_r($time);
    echo '</pre>';

    $opts = array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"Authorization: ".PEXELSKEY."" 
      )
    );
    $conName = $time->countryName;
    $data = imagesAPI($_POST['city'], $conName, 15);
    echo '<pre>';
    print_r($data);
    
    echo '</pre>';


    getInfo($_POST['city'], $weather, $time);
    die();


    
/*************************************************************************************************************/



    $apiData = file_get_contents('http://api.timezonedb.com/v2.1/get-time-zone?key='.TIMEKEY.'&format=json&by=position&lat='.$lat.'&lng='.$lon.'');
    $time = json_decode($apiData);
    echo '<pre>';
    print_r($time);
    echo '</pre>';


    ?>

    <h2>Weather</h2>
	<div class="col">
		<h3><?= $weather->weather[0]->main ?></h3>
		<p><?= $weather->weather[0]->description ?></p>
	</div>

	<br>
	<br>

	<h2>Time : <span style="font-size:20px;"><?= $time->formatted ?></span></h2>

    <iframe 
      width="100%" 
      height="100%" 
      frameborder="0" 
      scrolling="no" 
      marginheight="0" 
      marginwidth="0" 
      src="https://maps.google.com/maps?q=<?= $lat ?>,<?= $lon ?>&hl=es;z=14&amp;output=embed"
     >
     </iframe>
    <?php
    $opts = array(
      'http'=>array(
        'method'=>"GET",
        'header'=>"Authorization: ".PEXELSKEY."" 
      )
    );

    $context = stream_context_create($opts);

    // Open the file using the HTTP headers set above
    echo 'https://api.pexels.com/v1/search?query='.urlencode($_POST['city'].' '.$time->countryName).'&per_page='.'15'.'&page=1';
    $file = file_get_contents('https://api.pexels.com/v1/search?query='.urlencode($_POST['city'].' '.$time->countryName).'&per_page='.'15'.'&page=1', false, $context);
    $data = json_decode($file);
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    foreach ($data->photos as $image) {
        echo '<img width="" src="'.$image->src->landscape.'">';
    }
    // echo htmlentities(file_get_contents("https://maps.google.com/maps?q=".$lat.",".$lon."&hl=es;z=14&amp;output=embed"));

}
else
{
	echo 'Some thing went wrong';
	die();
}
?>


