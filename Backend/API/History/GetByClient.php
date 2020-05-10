<?php
namespace DealMedSystem\Backend\API\History;

include_once '../../Includes/CommonInclude.php';
include_once '../../Includes/HistoryInclude.php';

use DealMedSystem\Backend\Controllers\HistoryController;
use DealMedSystem\Backend\Communication\Response;

header('Content-Type: text/html; charset=utf-8');
session_start();

$historyController = new HistoryController;

echo json_encode($historyController->getHistoriesByClientID($_GET['clientID']));
exit;

?>