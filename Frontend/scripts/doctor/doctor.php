<?php

if (!isset($_GET['doctorID']) || !isset($_SESSION['profile']))
	return null;

// Initialize session and set URL.
$channel = curl_init();

$api_url = require('scripts/backend_host.php');
$doctor_url = '/Backend/API/Doctor/Get.php?';

$doctorID_url = "doctorID=";
$doctorID_url .= $_GET['doctorID'];

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

// user problem
$url = $api_url.$doctor_url.$doctorID_url;
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