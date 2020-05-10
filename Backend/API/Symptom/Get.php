<?php
namespace DealMedSystem\Backend\API\Symptom;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/SymptomInclude.php';

use DealMedSystem\Backend\Controllers\SymptomController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$symptomController = new SymptomController;

echo json_encode($symptomController->getSymptom($_GET['symptomID']));
exit;

?>