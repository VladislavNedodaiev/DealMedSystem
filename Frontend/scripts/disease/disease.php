<?php

if (!isset($_GET['diseaseID']) || !isset($_SESSION['profile']))
	return null;

// Initialize session and set URL.
$channel = curl_init();

$api_url = require('scripts/backend_host.php');
$disease_url = '/Backend/API/Disease/Get.php?';

$diseaseID_url = "diseaseID=";
$diseaseID_url .= $_GET['diseaseID'];

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

// user problem
$url = $api_url.$disease_url.$diseaseID_url;
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