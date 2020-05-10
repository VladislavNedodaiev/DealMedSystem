<?php
namespace DealMedSystem\Backend\API\Room;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/RoomInclude.php';

use DealMedSystem\Backend\Controllers\RoomController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$roomController = new RoomController;

echo json_encode($roomController->editRoom($_POST['roomID'], $_POST['isCabinet'], $_POST['title'], $_POST['x'], $_POST['y'], $_POST['width'], $_POST['height']));
exit;

?>