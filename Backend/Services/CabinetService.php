<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\CabinetDTO;
use DealMedSystem\Backend\Communication\Response;

class CabinetService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Cabinet";
	
	}
	
	public function createCabinet($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		$response = $this->getCabinetsByIDs($dto->roomID, $dto->doctorID);
		if ($response->status ==$this->SUCCESS->status)
			return $response;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`room_id`, `doctor_id`)".
						   "VALUES (".
						   "'".$dto->roomID."',".
						   "'".$dto->doctorID."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`cabinet_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['cabinet_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getCabinet($cabinetID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`cabinet_id`='".$cabinetID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new CabinetDTO;
					
				$dto->id = $res['cabinet_id'];
				$dto->roomID = $res['room_id'];
				$dto->doctorID = $res['doctor_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getCabinetsByIDs($roomID, $doctorID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_id`='".$roomID."' AND `".$this->DB_TABLE."`.`doctor_id`='".$doctorID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new CabinetDTO;
					
				$dto->id = $res['cabinet_id'];
				$dto->roomID = $res['room_id'];
				$dto->doctorID = $res['doctor_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getCabinetsByRoomID($roomID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_id`='".$roomID."';")) {
			
			$cabinets = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new CabinetDTO;
					
				$dto->id = $res['cabinet_id'];
				$dto->roomID = $res['room_id'];
				$dto->doctorID = $res['doctor_id'];
				
				array_push($cabinets, $dto);
				
			}
			
			if (!empty($cabinets))
				return new Response($this->SUCCESS->status, $cabinets);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getCabinetsByDoctorID($doctorID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`doctor_id`='".$doctorID."';")) {
			
			$cabinets = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new CabinetDTO;

				$dto->id = $res['cabinet_id'];
				$dto->roomID = $res['room_id'];
				$dto->doctorID = $res['doctor_id'];
				
				array_push($cabinets, $dto);
				
			}
			
			if (!empty($cabinets))
				return new Response($this->SUCCESS->status, $cabinets);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`cabinet_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function deleteCabinet($cabinetID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `cabinet_id`='".$cabinetID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>