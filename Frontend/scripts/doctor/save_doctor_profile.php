<?php
header('Content-Type: text/html; charset=utf-8');

if (!isset($_SESSION))
	session_start();

include_once '../../localization/localization.php';

if (!isset($_SESSION['profile']) || !isset($_GET['doctorID'])) {

	header("Location: ../../index.php");
	exit;

}

$newpath = "";
$moveResult = false;
if (isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != "") {
	
	$imageFileType = strtolower(pathinfo(basename($_FILES['photo']['name']),PATHINFO_EXTENSION));
	$newpath = 'images/doctors/'.$_GET['doctorID'].'/';
	
	if(!is_dir('../../'.$newpath)) {
		mkdir('../../'.$newpath);
	}
	
	$newpath .= 'photo.'.$imageFileType;
	
	$moveResult = move_uploaded_file($_FILES['photo']['tmp_name'], '../../'.$newpath);
	if (!$moveResult) {
	
		$_SESSION['msg']['type'] = 'alert-danger';
		$_SESSION['msg']['text'] = getLocalString('save_doctor_profile', 'PHOTO_ERROR');
		
	} 	
	
}


// Initialize session and set URL.
$channel = curl_init();

$api_url = require('../backend_host.php');
$doctor_url = '/Backend/API/Doctor/Edit.php';

$url = $api_url.$doctor_url;

curl_setopt($channel, CURLOPT_URL, $url);
curl_setopt($channel, CURLOPT_POST, 1);

$_POST['doctorID'] = $_GET['doctorID'];
if ($moveResult)
	$_POST['photo'] = $newpath;
else
	$_POST['photo'] = $_POST['oldphoto'];
unset($_POST['oldphoto']);

curl_setopt($channel, CURLOPT_POSTFIELDS, http_build_query($_POST));

// Set so curl_exec returns the result instead of outputting it.
curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);
    
// Get the response and close the channel.
$response = curl_exec($channel);
curl_close($channel);

$response = json_decode($response);

if ($response->status == "SUCCESS") {
	
	$_SESSION['msg']['type'] = 'alert-success';
	$_SESSION['msg']['text'] = getLocalString('save_doctor_profile', 'SUCCESS');
	
} else if ($response->status == "DB_ERROR") {
	
	$_SESSION['msg']['type'] = 'alert-danger';
	$_SESSION['msg']['text'] = getLocalString('save_doctor_profile', 'DB_ERROR');
	
} else {
	
	$_SESSION['msg']['type'] = 'alert-danger';
	$_SESSION['msg']['text'] = getLocalString('save_doctor_profile', 'UNKNOWN');
	
} 

header("Location: ../../doctor.php?doctorID=".$_GET['doctorID']);
exit;

?>