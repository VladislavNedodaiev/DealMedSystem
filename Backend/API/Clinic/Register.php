<?php
namespace DealMedSystem\Backend\API\Clinic;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/ClinicInclude.php';
include_once '../../Includes/DoctorInclude.php';
include_once '../../Includes/RoomInclude.php';
include_once '../../Includes/SymptomInclude.php';
include_once '../../Includes/DiseaseInclude.php';
include_once '../../Includes/SpecializationInclude.php';
include_once '../../Includes/CabinetInclude.php';
include_once '../../Includes/ConnectionInclude.php';

use DealMedSystem\Backend\Controllers\ClinicController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$clinicController = new ClinicController;

echo json_encode($clinicController->register($_POST['email'], $_POST['password'], $_POST['repeat_password']));
exit;

?>