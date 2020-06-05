<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

include_once '../../localization/localization.php';

if (!isset($_POST['input']) || !isset($_SESSION['profile'])) {
	
	header("Location: ../../index.php");
	exit;
	
}

// Initialize session and set URL.
$channel = curl_init();

$apiurl = require('../backend_host.php');
$url = $apiurl.'/Backend/API/Connection/Delete.php';

$_POST['connectionID'] = $_POST['input'];
unset($_POST['input']);

curl_setopt($channel, CURLOPT_URL, $url);

curl_setopt($channel, CURLOPT_POST, 1);
curl_setopt($channel, CURLOPT_POSTFIELDS, http_build_query($_POST));

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($channel);

$buf = $_POST['roomFromID'];
$_POST['roomFromID'] = $_POST['roomToID'];
$_POST['roomToID'] = $buf;
curl_setopt($channel, CURLOPT_POSTFIELDS, http_build_query($_POST));
$response = curl_exec($channel);

curl_close($channel);

$response = json_decode($response);
if ($response->status == "SUCCESS") {
	
	$_SESSION['msg']['type'] = 'alert-success';
	$_SESSION['msg']['text'] = getLocalString('remove_connection', 'SUCCESS');
	
} else {
	
	$_SESSION['msg']['type'] = 'alert-danger';
	$_SESSION['msg']['text'] = getLocalString('remove_connection', 'UNKNOWN');
	
} 

header("Location: ../../room.php?roomID=".$_POST['roomToID']);
exit;

?>