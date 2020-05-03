<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\SpecializationDTO;
use DealMedSystem\Backend\Communication\Response;

class SpecializationService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Specialization";
	
	}
	
	public function createSpecialization($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		$response = $this->getSpecializationsByIDs($dto->doctorID, $dto->diseaseID);
		if ($response->status ==$this->SUCCESS->status)
			return $response;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`doctor_id`, `disease_id`)".
						   "VALUES (".
						   "'".$dto->doctorID."',".
						   "'".$dto->diseaseID."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`specialization_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['specialization_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getSpecialization($specializationID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`specialization_id`='".$specializationID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SpecializationDTO;
					
				$dto->id = $res['specialization_id'];
				$dto->doctorID = $res['doctor_id'];
				$dto->diseaseID = $res['disease_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getSpecializationsByIDs($doctorID, $diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`doctor_id`='".$doctorID."' AND `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SpecializationDTO;
					
				$dto->id = $res['specialization_id'];
				$dto->doctorID = $res['doctor_id'];
				$dto->diseaseID = $res['disease_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getSpecializationsByDoctorID($doctorID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`doctor_id`='".$doctorID."';")) {
			
			$specializations = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SpecializationDTO;
					
				$dto->id = $res['specialization_id'];
				$dto->doctorID = $res['doctor_id'];
				$dto->diseaseID = $res['disease_id'];
				
				array_push($specializations, $dto);
				
			}
			
			if (!empty($specializations))
				return new Response($this->SUCCESS->status, $specializations);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getSpecializationsByDiseaseID($diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			
			$specializations = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new SpecializationDTO;

				$dto->id = $res['specialization_id'];
				$dto->doctorID = $res['doctor_id'];
				$dto->diseaseID = $res['disease_id'];
				
				array_push($specializations, $dto);
				
			}
			
			if (!empty($specializations))
				return new Response($this->SUCCESS->status, $specializations);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`specialization_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function deleteSpecialization($specializationID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `specialization_id`='".$specializationID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>