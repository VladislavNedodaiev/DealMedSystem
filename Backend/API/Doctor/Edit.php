<?php
namespace DealMedSystem\Backend\API\Doctor;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/DoctorInclude.php';

use DealMedSystem\Backend\Controllers\DoctorController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$doctorController = new DoctorController;

echo json_encode($doctorController->editDoctor($_POST['doctorID'], $_POST['gender'], $_POST['firstName'], $_POST['secondName'], $_POST['thirdName'], $_POST['birthday'], $_POST['photo'], $_POST['description'], $_POST['phone']));
exit;

?>