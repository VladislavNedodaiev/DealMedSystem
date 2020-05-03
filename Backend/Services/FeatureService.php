<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\FeatureDTO;
use DealMedSystem\Backend\Communication\Response;

class FeatureService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $symptom, $pswd, $db, $logService) {
		
		parent::__construct($host, $symptom, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Feature";
	
	}
	
	public function createFeature($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		$response = $this->getFeaturesByIDs($dto->symptomID, $dto->diseaseID);
		if ($response->status ==$this->SUCCESS->status)
			return $response;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`symptom_id`, `disease_id`)".
						   "VALUES (".
						   "'".$dto->symptomID."',".
						   "'".$dto->diseaseID."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`feature_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['feature_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getFeature($featureID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`feature_id`='".$featureID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new FeatureDTO;
					
				$dto->id = $res['feature_id'];
				$dto->symptomID = $res['symptom_id'];
				$dto->diseaseID = $res['disease_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getFeaturesByIDs($symptomID, $diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`symptom_id`='".$symptomID."' AND `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new FeatureDTO;
					
				$dto->id = $res['feature_id'];
				$dto->symptomID = $res['symptom_id'];
				$dto->diseaseID = $res['disease_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getFeaturesBySymptomID($symptomID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`symptom_id`='".$symptomID."';")) {
			
			$features = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new FeatureDTO;
					
				$dto->id = $res['feature_id'];
				$dto->symptomID = $res['symptom_id'];
				$dto->diseaseID = $res['disease_id'];
				
				array_push($features, $dto);
				
			}
			
			if (!empty($features))
				return new Response($this->SUCCESS->status, $features);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getFeaturesByDiseaseID($diseaseID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`disease_id`='".$diseaseID."';")) {
			
			$features = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new FeatureDTO;
					
				$dto->id = $res['feature_id'];
				$dto->symptomID = $res['symptom_id'];
				$dto->diseaseID = $res['disease_id'];
				
				array_push($features, $dto);
				
			}
			
			if (!empty($features))
				return new Response($this->SUCCESS->status, $features);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`feature_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function deleteFeature($featureID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `feature_id`='".$featureID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>