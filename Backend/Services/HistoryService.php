<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\HistoryDTO;
use DealMedSystem\Backend\Communication\Response;

class HistoryService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "History";
	
	}
	
	public function createHistory($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		$response = $this->getHistoriesByIDs($dto->clientID, $dto->diseaseID);
		if ($response->status ==$this->SUCCESS->status)
			return $response;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`client_id`, `disease_id`, `start_date`, `finish_date`)".
						   "VALUES (".
						   "'".$dto->clientID."',".
						   "'".$dto->diseaseID."',".
						   "'".$dto->startDate."',".
						   "'".$dto->finishDate."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`history_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['history_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getHistory($historyID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`history_id`='".$historyID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new HistoryDTO;
					
				$dto->id = $res['history_id'];
				$dto->clientID = $res['client_id'];
				$dto->diseaseID = $res['disease_id'];
				$dto->startDate = $res['start_date'];
				$dto->finishDate = $res['finish_date'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getHistoriesByIDs($clientID, $diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`client_id`='".$clientID."' AND `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new HistoryDTO;
					
				$dto->id = $res['history_id'];
				$dto->clientID = $res['client_id'];
				$dto->diseaseID = $res['disease_id'];
				$dto->startDate = $res['start_date'];
				$dto->finishDate = $res['finish_date'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getHistoriesByClientID($clientID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`client_id`='".$clientID."';")) {
			
			$histories = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new HistoryDTO;
					
				$dto->id = $res['history_id'];
				$dto->clientID = $res['client_id'];
				$dto->diseaseID = $res['disease_id'];
				$dto->startDate = $res['start_date'];
				$dto->finishDate = $res['finish_date'];
				
				array_push($histories, $dto);
				
			}
			
			if (!empty($histories))
				return new Response($this->SUCCESS->status, $histories);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getHistoriesByDiseaseID($diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			
			$histories = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new HistoryDTO;
					
				$dto->id = $res['history_id'];
				$dto->clientID = $res['client_id'];
				$dto->diseaseID = $res['disease_id'];
				$dto->startDate = $res['start_date'];
				$dto->finishDate = $res['finish_date'];
				
				array_push($histories, $dto);
				
			}
			
			if (!empty($histories))
				return new Response($this->SUCCESS->status, $histories);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`history_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function deleteHistory($historyID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `history_id`='".$historyID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>