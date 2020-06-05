<?php

if (!isset($_GET['roomID']) || !isset($_SESSION['profile']))
	return null;

// Initialize session and set URL.
$channel = curl_init();

$api_url = require('scripts/backend_host.php');
$connection_url = '/Backend/API/Connection/GetByRoomFrom.php?';

$roomFromID_url = "roomFromID=";
$roomFromID_url .= $_GET['roomID'];

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

// user problem
$url = $api_url.$connection_url.$roomFromID_url;
curl_setopt($channel, CURLOPT_URL, $url);
$response = curl_exec($channel);
curl_close($channel);

$response = json_decode($response);

if (isset($response->status) && $response->status == 'SUCCESS') {
	
	$result = array();
	
	$response = $response->content;
	foreach ($response as &$value) {
		$result[$value->id] = $value;
	}
	
	return $result;
		
}

return null;

?>