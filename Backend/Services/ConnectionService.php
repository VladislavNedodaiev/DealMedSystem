<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\ConnectionDTO;
use DealMedSystem\Backend\Communication\Response;

class ConnectionService extends Service
{
	
	private $DB_TABLE;
	
	public function __construct($host, $user, $pswd, $db, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
	
		$this->DB_TABLE = "Connection";
	
	}
	
	public function createConnection($dto) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;

		$response = $this->getConnectionsByIDs($dto->roomFromID, $dto->roomToID);
		if ($response->status ==$this->SUCCESS->status)
			return $response;

		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`room_from_id`, `room_to_id`)".
						   "VALUES (".
						   "'".$dto->roomFromID."',".
						   "'".$dto->roomToID."');")) {
							   
			$lastID = $this->getLastID();
			if ($lastID->status ==$this->SUCCESS->status
				&& $result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`connection_id`=".$lastID->content.";")) {
				if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					
					$dto->id = $res['connection_id'];
					
					return new Response($this->SUCCESS->status, $dto);
					
				}
			}
		}
			
		return $this->DB_ERROR;
		
	}
	
	public function getConnection($connectionID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`connection_id`='".$connectionID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ConnectionDTO;
					
				$dto->id = $res['connection_id'];
				$dto->roomFromID = $res['room_from_id'];
				$dto->roomToID = $res['room_to_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getConnectionsByIDs($roomFromID, $roomToID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_from_id`='".$roomFromID."' AND `".$this->DB_TABLE."`.`room_to_id`='".$roomToID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ConnectionDTO;
					
				$dto->id = $res['connection_id'];
				$dto->roomFromID = $res['room_from_id'];
				$dto->roomToID = $res['room_to_id'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getConnectionsByRoomToID($roomFromID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_from_id`='".$roomFromID."';")) {
			
			$connections = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ConnectionDTO;
					
				$dto->id = $res['connection_id'];
				$dto->roomFromID = $res['room_from_id'];
				$dto->roomToID = $res['room_to_id'];
				
				array_push($connections, $dto);
				
			}
			
			if (!empty($connections))
				return new Response($this->SUCCESS->status, $connections);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getConnectionsByRoomFromID($roomToID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_to_id`='".$roomToID."';")) {
			
			$connections = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ConnectionDTO;

				$dto->id = $res['connection_id'];
				$dto->roomFromID = $res['room_from_id'];
				$dto->roomToID = $res['room_to_id'];
				
				array_push($connections, $dto);
				
			}
			
			if (!empty($connections))
				return new Response($this->SUCCESS->status, $connections);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getConnectionsByRoomID($roomID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_from_id`='".$roomID."' OR `".$this->DB_TABLE."`.`room_to_id`='".$roomID."';")) {
			
			$connections = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ConnectionDTO;

				$dto->id = $res['connection_id'];
				$dto->roomFromID = $res['room_from_id'];
				$dto->roomToID = $res['room_to_id'];
				
				array_push($connections, $dto);
				
			}
			
			if (!empty($connections))
				return new Response($this->SUCCESS->status, $connections);
		}
		
		return $this->NOT_FOUND;
		
	}
	
	public function getLastID() {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`connection_id`) AS `id` FROM `".$this->DB_TABLE."`;")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function getLastIDByRoomToID($roomTo) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`feature_id`) AS `id` FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_to_id`='".$roomTo."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function getLastIDByRoomFromID($roomFromID) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`feature_id`) AS `id` FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_from_id`='".$roomFromID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function getLastIDByRoomID($roomID) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		if ($result = $this->database->query("SELECT MAX(`".$this->DB_TABLE."`.`feature_id`) AS `id` FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`room_from_id`='".$roomID."' OR `".$this->DB_TABLE."`.`room_to_id`='".$roomID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['id']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function deleteConnection($connectionID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `connection_id`='".$connectionID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>