<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

include_once '../../localization/localization.php';

if (!isset($_SESSION['profile'])) {
	
	header("Location: ../../index.php");
	exit;
	
}

// Initialize session and set URL.
$channel = curl_init();
$_POST['clinicID'] = $_SESSION['profile']->id;
unset($_POST['input']);

$apiurl = require('../backend_host.php');
$url = $apiurl.'/Backend/API/Client/Add.php';
curl_setopt($channel, CURLOPT_URL, $url);

curl_setopt($channel, CURLOPT_POST, 1);
curl_setopt($channel, CURLOPT_POSTFIELDS, http_build_query($_POST));

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($channel);
curl_close($channel);

$response = json_decode($response);
if ($response->status == "SUCCESS") {
	
	$_SESSION['msg']['type'] = 'alert-success';
	$_SESSION['msg']['text'] = getLocalString('add_client', 'SUCCESS');
	
} else {
	
	$_SESSION['msg']['type'] = 'alert-danger';
	$_SESSION['msg']['text'] = getLocalString('add_client', 'UNKNOWN');
	
}

header("Location: ../../clients.php");
exit;

?>