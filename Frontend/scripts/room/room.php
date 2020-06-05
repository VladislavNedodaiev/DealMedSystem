<?php

if (!isset($_GET['roomID']) || !isset($_SESSION['profile']))
	return null;

// Initialize session and set URL.
$channel = curl_init();

$api_url = require('scripts/backend_host.php');
$room_url = '/Backend/API/Room/Get.php?';

$roomID_url = "roomID=";
$roomID_url .= $_GET['roomID'];

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

// user problem
$url = $api_url.$room_url.$roomID_url;
curl_setopt($channel, CURLOPT_URL, $url);
$response = curl_exec($channel);
curl_close($channel);

$response = json_decode($response);

if (isset($response->status) && $response->status == 'SUCCESS') {
	
	$response = $response->content;
	return $response;
		
}

return null;

?>