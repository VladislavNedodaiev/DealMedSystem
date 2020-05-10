<?php
namespace DealMedSystem\Backend\API\Cabinet;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/CabinetInclude.php';

use DealMedSystem\Backend\Controllers\CabinetController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$cabinetController = new CabinetController;

echo json_encode($cabinetController->getLastCabinetByRoomID($_GET['roomID']));
exit;

?>