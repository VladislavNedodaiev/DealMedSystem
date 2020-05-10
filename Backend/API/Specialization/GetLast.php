<?php
namespace DealMedSystem\Backend\API\Specialization;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/SpecializationInclude.php';

use DealMedSystem\Backend\Controllers\SpecializationController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$specializationController = new SpecializationController;

echo json_encode($specializationController->getLastSpecialization());
exit;

?>