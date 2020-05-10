<?php
namespace DealMedSystem\Backend\API\Client;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/ClientInclude.php';

use DealMedSystem\Backend\Controllers\ClientController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$clientController = new ClientController;

echo json_encode($clientController->getLastClient());
exit;

?>