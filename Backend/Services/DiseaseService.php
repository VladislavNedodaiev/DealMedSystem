<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\DiseaseDTO;
use DealMedSystem\Backend\Communication\Response;

class DiseaseService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Disease";
	
	}
	
	public function createDisease($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`clinic_id`, `title`, `air_spread`, `immunity`, `description`)".
						   "VALUES (".
						   "'".$dto->clinicID."',".
						   "'".$dto->title."',".
						   "'".$dto->airSpread."', ".
						   "'".$dto->immunity."', ".
						   "'".$dto->description."');")) {
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`disease_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['disease_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getDisease($diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new DiseaseDTO;
					
				$dto->id = $res['disease_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->title = $res['title'];
				$dto->airSpread = $res['air_spread'];
				$dto->immunity = $res['immunity'];
				$dto->description = $res['description'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getDiseases() {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."`;")) {
			
			$diseases = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new DiseaseDTO;
					
				$dto->id = $res['disease_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->title = $res['title'];
				$dto->airSpread = $res['air_spread'];
				$dto->immunity = $res['immunity'];
				$dto->description = $res['description'];
				
				array_push($diseases, $dto);
				
			}
			
			if (!empty($diseases))
				return new Response($this->SUCCESS->status, $diseases);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getDiseasesByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			
			$diseases = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new DiseaseDTO;
					
				$dto->id = $res['disease_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->title = $res['title'];
				$dto->airSpread = $res['air_spread'];
				$dto->immunity = $res['immunity'];
				$dto->description = $res['description'];
				
				array_push($diseases, $dto);
				
			}
			
			if (!empty($diseases))
				return new Response($this->SUCCESS->status, $diseases);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`disease_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->DB_ERROR->status, 0);
		
	}
	
	public function getLastIDByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`disease_id`) AS `id` FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->DB_ERROR->status, 0);
		
	}
	
	public function updateDisease($dto) {
		
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("UPDATE `".$this->DB_TABLE."` SET `title`='".$dto->title."', `air_spread`='".$dto->airSpread."', `immunity`='".$dto->immunity."', `description`='".$dto->description."' WHERE `disease_id`='".$dto->id."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
	public function deleteDisease($diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `disease_id`='".$diseaseID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>