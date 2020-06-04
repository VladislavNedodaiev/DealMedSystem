<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\DoctorDTO;
use DealMedSystem\Backend\Communication\Response;

class DoctorService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Doctor";
	
	}
	
	public function createDoctor($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`clinic_id`, `gender`, `first_name`, `second_name`, `third_name`)".
						   "VALUES ('".$dto->clinicID."', ".
									"'".$dto->firstName."', ".
									"'".$dto->secondName."', ".
									"'".$dto->thirdName."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`doctor_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['doctor_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getDoctor($doctorID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`doctor_id`='".$doctorID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new DoctorDTO;
					
				$dto->id = $res['doctor_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->gender = $res['gender'];
				$dto->firstName = $res['first_name'];
				$dto->secondName = $res['second_name'];
				$dto->thirdName = $res['third_name'];
				$dto->birthday = $res['birthday'];
				$dto->photo = $res['photo'];
				$dto->description = $res['description'];
				$dto->phone = $res['phone'];

				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getDoctorsByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			
			$doctors = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new DoctorDTO;
					
				$dto->id = $res['doctor_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->gender = $res['gender'];
				$dto->firstName = $res['first_name'];
				$dto->secondName = $res['second_name'];
				$dto->thirdName = $res['third_name'];
				$dto->birthday = $res['birthday'];
				$dto->photo = $res['photo'];
				$dto->description = $res['description'];
				$dto->phone = $res['phone'];
				
				array_push($doctors, $dto);
				
			}
			
			if (!empty($doctors))
				return new Response($this->SUCCESS->status, $doctors);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`doctor_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function getLastIDByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`doctor_id`) AS `id` FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function updateDoctor($dto) {
		
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("UPDATE `".$this->DB_TABLE."` SET `gender`='".$dto->gender."', `first_name`='".$dto->firstName."', `second_name`='".$dto->secondName."', `third_name`='".$dto->thirdName."', `birthday`='".$dto->birthday."', `photo`='".$dto->photo."', `description`='".$dto->description."', `phone`='".$dto->phone."' WHERE `doctor_id`='".$dto->id."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
	public function deleteDoctor($doctorID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `doctor_id`='".$doctorID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>