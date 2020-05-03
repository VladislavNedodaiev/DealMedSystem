<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\HistoryDTO;
use DealMedSystem\Backend\Services\HistoryService;
use DealMedSystem\Backend\Communication\Response;

class HistoryController extends Controller
{
	
	private $historyService;
	
	public $SUCCESS;
	public $NO_HISTORYID;
	public $NO_CLIENTID;
	public $NO_DISEASEID;
	public $NO_STARTDATE;
	public $INCORRECT_STARTDATE;
	public $NO_FINISHDATE;
	public $INCORRECT_FINISHDATE;
	public $NO_DATE;
	public $INCORRECT_DATE;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_HISTORYID = new Response("NO_HISTORYID", null);
		$this->NO_CLIENTID = new Response("NO_CLIENTID", null);
		$this->NO_DISEASEID = new Response("NO_DISEASEID", null);
		$this->NO_STARTDATE = new Response("NO_STARTDATE", null);
		$this->INCORRECT_STARTDATE = new Response("NO_STARTDATE", null);
		$this->NO_FINISHDATE = new Response("NO_FINISHDATE", null);
		$this->INCORRECT_FINISHDATE = new Response("NO_STARTDATE", null);
		$this->NO_DATE = new Response("NO_DATE", null);
		$this->INCORRECT_DATE = new Response("INCORRECT_DATE", null);

		$this->historyService = new HistoryService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createHistory($clientID, $diseaseID) {
		
		$this->logService->logMessage("HistoryController CreateHistory");
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		$dto = new HistoryDTO;
		$dto->clientID = $clientID;
		$dto->diseaseID = $diseaseID;
		
		return $this->logResponse($this->historyService->createHistory($dto));
		
	}
	
	public function getHistory($historyID) {
		
		$this->logService->logMessage("HistoryController GetHistory");
		
		if (!isset($historyID))
			return $this->logResponse($this->NO_HISTORYID);
		
		return $this->logResponse($this->historyService->getHistory($historyID));
		
	}
	
	public function getHistoriesByIDs($clientID, $diseaseID) {
		
		$this->logService->logMessage("HistoryController GetHistoryByIDs");
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->historyService->getHistoriesByIDs($clientID, $diseaseID));
		
	}
	
	public function getHistoriesByClientID($clientID) {
		
		$this->logService->logMessage("HistoryController GetHistoryByClientID");
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		return $this->logResponse($this->historyService->getHistoriesByClientID($clientID));
		
	}
	
	public function getHistoriesByDiseaseID($diseaseID) {
		
		$this->logService->logMessage("HistoryController GetHistoryByDiseaseID");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->historyService->getHistoriesByDiseaseID($diseaseID));
		
	}
	
	public function getLastHistory() {
		
		$this->logService->logMessage("HistoryController GetLastHistory");
		
		$historyID = $this->historyService->getLastID();
		if ($historyID->status != $this->historyService->SUCCESS->status)
			return $this->logResponse($historyID);
		
		return $this->logResponse($this->historyService->getHistory($historyID->content));
		
	}
	
	public function getLastHistoryByClientID($clientID) {
		
		$this->logService->logMessage("HistoryController GetLastHistoryByClientID");
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		return $this->logResponse($this->historyService->getLastHistoryByClientID($clientID));
		
	}
	
	public function getLastHistoryByDiseaseID($diseaseID) {
		
		$this->logService->logMessage("HistoryController GetLastHistoryByDiseaseID");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->historyService->getLastHistoryByDiseaseID($diseaseID));
		
	}
	
	public function getHistoriesActiveByClientID($someDate, $offset, $limit, $clientID) {
		
		$this->logService->logMessage("HistoryController GetHistoriesActive");
		
		if (!isset($someDate))
			return $this->logResponse($this->NO_DATE);
		
		if (!isset($offset))
			return $this->logResponse($this->NO_OFFSET);
		
		if (!isset($limit))
			return $this->logResponse($this->NO_LIMIT);
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		if (!((bool)(strtotime($someDate))))
			return $this->logResponse($this->INCORRECT_DATE);
		
		if ($offset < 0)
			$offset = 0;
		
		if ($limit < 0)
			$limit = 0;
		
		return $this->logResponse($this->historyService->getHistoriesActiveByClientID($someDate, $offset, $limit, $clientID));
		
	}
	
	public function getCountActiveDateByClientID($someDate, $clientID) {
		
		$this->logService->logMessage("HistoryController GetCountActiveDate");
		
		if (!isset($someDate))
			return $this->logResponse($this->NO_DATE);
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		if (!((bool)(strtotime($someDate))))
			return $this->logResponse($this->INCORRECT_DATE);
		
		return $this->logResponse($this->historyService->getCountActiveDateByClientID($someDate, $clientID));
		
	}
	
	public function getHistoriesActiveByDiseaseID($someDate, $offset, $limit, $diseaseID) {
		
		$this->logService->logMessage("HistoryController GetHistoriesActive");
		
		if (!isset($someDate))
			return $this->logResponse($this->NO_DATE);
		
		if (!isset($offset))
			return $this->logResponse($this->NO_OFFSET);
		
		if (!isset($limit))
			return $this->logResponse($this->NO_LIMIT);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		if (!((bool)(strtotime($someDate))))
			return $this->logResponse($this->INCORRECT_DATE);
		
		if ($offset < 0)
			$offset = 0;
		
		if ($limit < 0)
			$limit = 0;
		
		return $this->logResponse($this->historyService->getHistoriesActiveByDiseaseID($someDate, $offset, $limit, $diseaseID));
		
	}
	
	public function getCountActiveDateByDiseaseID($someDate, $diseaseID) {
		
		$this->logService->logMessage("HistoryController GetCountActiveDate");
		
		if (!isset($someDate))
			return $this->logResponse($this->NO_DATE);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		if (!((bool)(strtotime($someDate))))
			return $this->logResponse($this->INCORRECT_DATE);
		
		return $this->logResponse($this->historyService->getCountActiveDateByDiseaseID($someDate, $diseaseID));
		
	}
	
	public function editHistory($historyID, $startDate, $finishDate) {
		
		$this->logService->logMessage("HistoryController EditHistory");
		
		if (!isset($historyID))
			return $this->logResponse($this->NO_HISTORYID);
		
		if (!isset($startDate))
			return $this->logResponse($this->NO_STARTDATE);
		
		if (!((bool)(strtotime($startDate))))
			return $this->logResponse($this->INCORRECT_STARTDATE);
		
		if (isset($finishDate) && !((bool)(strtotime($finishDate))))
			return $this->logResponse($this->INCORRECT_FINISHDATE);
		
		$dto = new HistoryDTO;
		$dto->id = $historyID;
		$dto->startDate = $startDate;
		$dto->finishDate = $finishDate;
		
		return $this->logResponse($this->historyService->updateHistory($dto));
	
	}
	
	public function deleteHistory($historyID) {
	
		$this->logService->logMessage("HistoryController DeleteHistory");
	
		if (!isset($historyID))
			return $this->logResponse($this->NO_HISTORYID);
		
		return $this->logResponse($this->historyService->deleteHistory($historyID));
	
	}
	
}

?>