<?php
namespace DealMedSystem\Backend\API\Disease;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/DiseaseInclude.php';

use DealMedSystem\Backend\Controllers\DiseaseController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$diseaseController = new DiseaseController;

echo json_encode($diseaseController->createDisease($_POST['clinicID']));
exit;

?>