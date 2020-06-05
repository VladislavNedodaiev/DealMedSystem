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
$url = $apiurl.'/Backend/API/Specialization/Delete.php';

$_POST['specializationID'] = $_POST['input'];
unset($_POST['input']);

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
	$_SESSION['msg']['text'] = getLocalString('remove_specialization', 'SUCCESS');
	
} else {
	
	$_SESSION['msg']['type'] = 'alert-danger';
	$_SESSION['msg']['text'] = getLocalString('remove_specialization', 'UNKNOWN');
	
} 

header("Location: ../../doctor.php?doctorID=".$_POST['doctorID']);
exit;

?>