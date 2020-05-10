<?php
namespace DealMedSystem\Backend\API\Room;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/RoomInclude.php';

use DealMedSystem\Backend\Controllers\RoomController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$roomController = new RoomController;

echo json_encode($roomController->getRoom($_GET['roomID']));
exit;

?>