<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\ClientDTO;
use DealMedSystem\Backend\Communication\Response;

class ClientService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $client, $pswd, $db, $logService) {
		
		parent::__construct($host, $client, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Client";
	
	}
	
	public function createClient($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		$response = $this->getClientsByIDs($dto->clientID, $dto->clinicID);
		if ($response->status ==$this->SUCCESS->status)
			return $response;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`clinic_id`)".
						   "VALUES ('".$dto->clinicID."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`client_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['client_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getClient($clientID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`client_id`='".$clientID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ClientDTO;
					
				$dto->id = $res['client_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->gender = $res['gender'];
				$dto->firstName = $res['first_name'];
				$dto->secondName = $res['second_name'];
				$dto->thirdName = $res['third_name'];
				$dto->birthday = $res['birthday'];
				$dto->photo = $res['photo'];
				$dto->phone = $res['phone'];

				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getClientsByClinicID($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			
			$clients = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ClientDTO;
					
				$dto->id = $res['client_id'];
				$dto->clinicID = $res['clinic_id'];
				$dto->gender = $res['gender'];
				$dto->firstName = $res['first_name'];
				$dto->secondName = $res['second_name'];
				$dto->thirdName = $res['third_name'];
				$dto->birthday = $res['birthday'];
				$dto->photo = $res['photo'];
				$dto->phone = $res['phone'];
				
				array_push($clients, $dto);
				
			}
			
			if (!empty($clients))
				return new Response($this->SUCCESS->status, $clients);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`client_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function updateClient($dto) {
		
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("UPDATE `".$this->DB_TABLE."` SET `gender`='".$dto->gender."', `first_name`='".$dto->firstName."', `second_name`='".$dto->secondName."', `third_name`='".$dto->thirdName."', `birthday`='".$dto->birthday."', `photo`='".$dto->photo."', `phone`='".$dto->phone."' WHERE `client_id`='".$dto->id."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
	public function deleteClient($clientID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `client_id`='".$clientID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>