<?php

if (!isset($_GET['doctorID']) || !isset($_SESSION['profile']))
	return null;

// Initialize session and set URL.
$channel = curl_init();

$api_url = require('scripts/backend_host.php');
$cabinet_url = '/Backend/API/Cabinet/GetLastByDoctor.php?';

$cabinet_url .= "doctorID=";
$cabinet_url .= $_GET['doctorID'];

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

// user problem
$url = $api_url.$cabinet_url;
curl_setopt($channel, CURLOPT_URL, $url);
$response = curl_exec($channel);

$response = json_decode($response);
if (isset($response->status) && $response->status == 'SUCCESS') {
	
	$response = $response->content;
	
	$room_url = '/Backend/API/Room/Get.php?';

	$room_url .= "roomID=";
	$room_url .= $response->roomID;
	
	$url = $api_url.$room_url;
	curl_setopt($channel, CURLOPT_URL, $url);
	$response = curl_exec($channel);
	curl_close($channel);

	$response = json_decode($response);
	if (isset($response->status) && $response->status == 'SUCCESS') {
		
		$response = $response->content;
		return $response;
	}
		
}

return null;

?>