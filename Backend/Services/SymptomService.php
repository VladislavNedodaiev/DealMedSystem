<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\SymptomDTO;
use DealMedSystem\Backend\Communication\Response;

class SymptomService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Symptom";
	
	}
	
	public function createSymptom($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`clinic_id`, `title`, `description`)".
						   "VALUES (".
						   "'".$dto->clinicID."',".
						   "'".$dto->title."',".
						   "'".$dto->description."');")) {
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`symptom_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['symptom_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getSymptom($symptomID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`symptom_id`='".$symptomID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SymptomDTO;
					
				$dto->id = $res['symptom_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->title = $res['title'];
				$dto->description = $res['description'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getSymptoms() {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."`;")) {
			
			$symptoms = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SymptomDTO;
					
				$dto->id = $res['symptom_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->title = $res['title'];
				$dto->description = $res['description'];
				
				array_push($symptoms, $dto);
				
			}
			
			if (!empty($symptoms))
				return new Response($this->SUCCESS->status, $symptoms);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getSymptomsByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			
			$symptoms = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SymptomDTO;
					
				$dto->id = $res['symptom_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->title = $res['title'];
				$dto->description = $res['description'];
				
				array_push($symptoms, $dto);
				
			}
			
			if (!empty($symptoms))
				return new Response($this->SUCCESS->status, $symptoms);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`symptom_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->DB_ERROR->status, 0);
		
	}
	
	public function getLastIDByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`symptom_id`) AS `id` FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->DB_ERROR->status, 0);
		
	}
	
	public function updateSymptom($dto) {
		
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("UPDATE `".$this->DB_TABLE."` SET `title`='".$dto->title."', `air_spread`='".$dto->airSpread."', `immunity`='".$dto->immunity."', `description`='".$dto->description."' WHERE `symptom_id`='".$dto->id."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
	public function deleteSymptom($symptomID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `symptom_id`='".$symptomID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>