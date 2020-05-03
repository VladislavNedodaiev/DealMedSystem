<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\ConnectionDTO;
use DealMedSystem\Backend\Services\ConnectionService;
use DealMedSystem\Backend\Communication\Response;

class ConnectionController extends Controller
{
	
	private $connectionService;
	
	public $SUCCESS;
	public $NO_CONNECTIONID;
	public $NO_ROOMFROMID;
	public $NO_ROOMTOID;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_CONNECTIONID = new Response("NO_CONNECTIONID", null);
		$this->NO_ROOMFROMID = new Response("NO_ROOMFROMID", null);
		$this->NO_ROOMTOID = new Response("NO_ROOMTOID", null);

		$this->connectionService = new ConnectionService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createConnection($roomFromID, $roomToID) {
		
		$this->logService->logMessage("ConnectionController CreateConnection");
		
		if (!isset($roomFromID))
			return $this->logResponse($this->NO_ROOMFROMID);
		
		if (!isset($roomToID))
			return $this->logResponse($this->NO_ROOMTOID);
		
		$dto = new ConnectionDTO;
		$dto->roomFromID = $roomFromID;
		$dto->roomToID = $roomToID;
		
		return $this->logResponse($this->connectionService->createConnection($dto));
		
	}
	
	public function getConnection($connectionID) {
		
		$this->logService->logMessage("ConnectionController GetConnection");
		
		if (!isset($connectionID))
			return $this->logResponse($this->NO_CONNECTIONID);
		
		return $this->logResponse($this->connectionService->getConnection($connectionID));
		
	}
	
	public function getConnectionsByIDs($roomFromID, $roomToID) {
		
		$this->logService->logMessage("ConnectionController GetConnectionByIDs");
		
		if (!isset($roomFromID))
			return $this->logResponse($this->NO_ROOMFROMID);
		
		if (!isset($roomToID))
			return $this->logResponse($this->NO_ROOMTOID);
		
		return $this->logResponse($this->connectionService->getConnectionsByIDs($roomFromID, $roomToID));
		
	}
	
	public function getConnectionsByRoomFromID($roomFromID) {
		
		$this->logService->logMessage("ConnectionController GetConnectionByRoomFromID");
		
		if (!isset($roomFromID))
			return $this->logResponse($this->NO_ROOMFROMID);
		
		return $this->logResponse($this->connectionService->getConnectionsByRoomFromID($roomFromID));
		
	}
	
	public function getConnectionsByRoomToID($roomToID) {
		
		$this->logService->logMessage("ConnectionController GetConnectionByRoomToID");
		
		if (!isset($roomToID))
			return $this->logResponse($this->NO_ROOMTOID);
		
		return $this->logResponse($this->connectionService->getConnectionsByRoomToID($roomToID));
		
	}
	
	public function getLastConnection() {
		
		$this->logService->logMessage("ConnectionController GetLastConnection");
		
		$connectionID = $this->connectionService->getLastID();
		if ($connectionID->status != $this->connectionService->SUCCESS->status)
			return $this->logResponse($connectionID);
		
		return $this->logResponse($this->connectionService->getConnection($connectionID->content));
		
	}
	
	public function getLastConnectionByRoomFromID($roomFromID) {
		
		$this->logService->logMessage("ConnectionController GetLastConnectionByRoomFromID");
		
		if (!isset($roomFromID))
			return $this->logResponse($this->NO_ROOMFROMID);
		
		return $this->logResponse($this->connectionService->getLastConnectionByRoomFromID($roomFromID));
		
	}
	
	public function getLastConnectionByRoomToID($roomToID) {
		
		$this->logService->logMessage("ConnectionController GetLastConnectionByRoomToID");
		
		if (!isset($roomToID))
			return $this->logResponse($this->NO_ROOMTOID);
		
		return $this->logResponse($this->connectionService->getLastConnectionByRoomToID($roomToID));
		
	}
	
	public function deleteConnection($connectionID) {
	
		$this->logService->logMessage("ConnectionController DeleteConnection");
	
		if (!isset($connectionID))
			return $this->logResponse($this->NO_CONNECTIONID);
		
		return $this->logResponse($this->connectionService->deleteConnection($connectionID));
	
	}
	
}

?>