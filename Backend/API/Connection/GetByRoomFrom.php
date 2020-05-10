<?php
namespace DealMedSystem\Backend\API\Connection;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/ConnectionInclude.php';

use DealMedSystem\Backend\Controllers\ConnectionController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$connectionController = new ConnectionController;

echo json_encode($connectionController->getConnectionsByRoomFromID($_GET['roomFromID']));
exit;

?>