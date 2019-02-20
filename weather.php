<?php
require_once('config.php');

if (isset($_POST['getWeather']) && isset($_POST['city'])) {
    

    $apiData = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$_POST['city'].'&APPID='.WEATHERKEY);
    $weather = json_decode($apiData);



    echo '<h1>'.$_POST['city'].'</h1>';
    // echo '<pre>';
    // print_r($weather);
    // echo '</pre>';

    $lon = $weather->coord->lon;
    $lat = $weather->coord->lat;



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
    <?php

}
else
{
	echo 'Some thing went wrong';
	die();
}
?>


