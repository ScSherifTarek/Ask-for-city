<?php 
require_once('API_Communicator.php');


if (isset($_POST['getWeather']) && isset($_POST['city'])) {
  
  $city = new API_Communicator($_POST['city']);
  echo '<pre>';
  print_r($city->getCityInfo());
  echo '</pre>';  
}
    // validation($apiData);
  // $city = new API_Communicator($_POST['city']);
  // echo '<pre>';
  // print_r($city->getCityInfo()) ;
  // echo '</pre>';
  // $weatherData = weatherAPI(WEATHERKEY,$_POST['city']);
  // echo '<pre>';
  // print_r($weatherData);
  // echo '</pre>';


  // $timeData = timeAPI(TIMEKEY,$weatherData->coord->lon,$weatherData->coord->lat);
  // echo '<pre>';
  // print_r($timeData);
  // echo '</pre>';

  // try {
  //   $imagesData = imagesAPI(PEXELSKEY,$_POST['city'], $timeData->countryName, 15,2);
  //   echo '<pre>';
  //   print_r($imagesData);
  //   echo '</pre>';
  // } catch (Exception $e) {
  //   echo "lol";
  // }
  


// }