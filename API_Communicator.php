<?php
require_once('config.php'); 
require_once('validation.php');

class API_Communicator
{
	private $city;
	private $weather;
	private $time;
	private $images;
	// can used to get images : $numOfPics = 3;
	public function __construct($city = null,$numOfPics = 3) {
        if($city == null)
        {
        	validation();
        }
        else
        {
        	$this->setCity($city,$numOfPics);
        }
    }
    public function setCity($city,$numOfPics = 3)
    {
    	$this->city = $city;
    	$this->weather = $this->weatherAPI(WEATHERKEY,$this->city);
    	$this->time = $this->timeAPI(TIMEKEY,$this->getLon(),$this->getLat());
    	$this->images =  $this->loadMyImages($numOfPics);
    }
    private function loadMyImages($numOfPics = 3)
    {
    	return API_Communicator::getImagesFor($this->city.' '.$this->getCountryName(),$numOfPics);
    }
    public static function getImagesFor($query ,$numOfPics = 3)
    {
    	$images = API_Communicator::imagesAPI(IMAGESKEY, $query , $numOfPics);
    	$result = array();
    	foreach ($images->hits as $hit) {
    		$result[] = $hit->webformatURL;
    	}
    	return $result;
    }
    public function getLon()
    {
    	return $this->weather->coord->lon;
    }
    public function getLat()
    {
    	return $this->weather->coord->lat;
    }
    public function getCityName()
    {
    	return $this->city;
    }
    public function getCountryName()
    {
    	return $this->time->countryName;
    }
    public function getTemp()
    {
    	return $this->weather->main->temp - 273.15;
    }
    public function getTime()
    {
    	return $this->time->formatted;
    }
    public function getImages()
    {
    	return $this->images;
    }
    public function getQuery()
    {
        return urlencode($this->city.' '.$this->getCountryName());
    }
	public function getCityInfo()
	{
	  $cityInfo = array();
	  $cityInfo["name"] = $this->getCityName();
	  $cityInfo["country"] = $this->getCountryName();
	  $cityInfo["temp"] = $this->getTemp();
	  $cityInfo["time"] = $this->getTime();
	  $cityInfo["images"] = $this->getImages();
	  return $cityInfo;
	}
	private function weatherAPI($key, $city)
	{
	  $city = urlencode($city);
	  $key = urlencode($key);


	  $apiData = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$city.'&APPID='.$key);
	  // validation($apiData);

	  
	  $weather = json_decode($apiData);	
	  return $weather ;
	}


	private function timeAPI($key, $lon, $lat)
	{
	  $lon = urlencode($lon);
	  $lat = urlencode($lat);
	  $key = urlencode($key);
	  $apiData = file_get_contents('http://api.timezonedb.com/v2.1/get-time-zone?key='.$key.'&format=json&by=position&lat='.$lat.'&lng='.$lon.'');
	  validation($apiData);
	  $time = json_decode($apiData);
	  return $time;
	}    


	private static function imagesAPI($key, $query, $numOfPics = 3)
	{
		$key = urlencode($key);
		$query = urlencode($query);
		$numOfPics = urlencode($numOfPics);

		$apiData = file_get_contents('https://pixabay.com/api/?key='.$key.'&q='.$query.'&safesearch=true&per_page='.$numOfPics);
		
		validation($apiData); 
		$images = json_decode($apiData);
		return $images;
	}
}