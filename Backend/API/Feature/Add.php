<?php
namespace DealMedSystem\Backend\API\Feature;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/FeatureInclude.php';

use DealMedSystem\Backend\Controllers\FeatureController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$featureController = new FeatureController;

echo json_encode($featureController->createFeature($_POST['symptomID'], $_POST['diseaseID']));
exit;

?>