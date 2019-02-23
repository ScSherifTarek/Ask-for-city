<?php 
require_once('API_Communicator.php');

if (isset($_POST['getWeather']) && isset($_POST['city'])) {
	$city = new API_Communicator($_POST['city']);
	require_once('partials/header.php');
	require_once('viewLib.php');	
	require_once('views/city.php');
	require_once('partials/footer.php');
}

?>
