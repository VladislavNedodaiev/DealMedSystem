<?php
namespace DealMedSystem\Backend\API\Client;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/ClientInclude.php';

use DealMedSystem\Backend\Controllers\ClientController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$clientController = new ClientController;

echo json_encode($clientController->createClient($_POST['clinicID'], $_POST['gender'], $_POST['firstName'], $_POST['secondName'], $_POST['thirdName']));
exit;

?>