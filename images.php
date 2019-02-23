<?php 
require_once('API_Communicator.php');

if (isset($_GET['q'])) {
	$images = API_Communicator::getImagesFor($_GET['q'],10);
	require_once('partials/header.php');
	require_once('viewLib.php');
	require_once('views/images.php');
	require_once('partials/footer.php');
}

?>
