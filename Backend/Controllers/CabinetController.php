<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\CabinetDTO;
use DealMedSystem\Backend\Services\CabinetService;
use DealMedSystem\Backend\Communication\Response;

class CabinetController extends Controller
{
	
	private $cabinetService;
	
	public $SUCCESS;
	public $NO_CABINETID;
	public $NO_DOCTORID;
	public $NO_ROOMID;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_CABINETID = new Response("NO_CABINETID", null);
		$this->NO_DOCTORID = new Response("NO_DOCTORID", null);
		$this->NO_ROOMID = new Response("NO_ROOMID", null);

		$this->cabinetService = new CabinetService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createCabinet($doctorID, $roomID) {
		
		$this->logService->logMessage("CabinetController CreateCabinet");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		$dto = new CabinetDTO;
		$dto->doctorID = $doctorID;
		$dto->roomID = $roomID;
		
		return $this->logResponse($this->cabinetService->createCabinet($dto));
		
	}
	
	public function getCabinet($cabinetID) {
		
		$this->logService->logMessage("CabinetController GetCabinet");
		
		if (!isset($cabinetID))
			return $this->logResponse($this->NO_CABINETID);
		
		return $this->logResponse($this->cabinetService->getCabinet($cabinetID));
		
	}
	
	public function getCabinetsByIDs($doctorID, $roomID) {
		
		$this->logService->logMessage("CabinetController GetCabinetByIDs");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		return $this->logResponse($this->cabinetService->getCabinetsByIDs($doctorID, $roomID));
		
	}
	
	public function getCabinetsByDoctorID($doctorID) {
		
		$this->logService->logMessage("CabinetController GetCabinetByDoctorID");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		return $this->logResponse($this->cabinetService->getCabinetsByDoctorID($doctorID));
		
	}
	
	public function getCabinetsByRoomID($roomID) {
		
		$this->logService->logMessage("CabinetController GetCabinetByRoomID");
		
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		return $this->logResponse($this->cabinetService->getCabinetsByRoomID($roomID));
		
	}
	
	public function getLastCabinet() {
		
		$this->logService->logMessage("CabinetController GetLastCabinet");
		
		$cabinetID = $this->cabinetService->getLastID();
		if ($cabinetID->status != $this->cabinetService->SUCCESS->status)
			return $this->logResponse($cabinetID);
		
		return $this->logResponse($this->cabinetService->getCabinet($cabinetID->content));
		
	}
	
	public function getLastCabinetByDoctorID($doctorID) {
		
		$this->logService->logMessage("CabinetController GetLastCabinetByDoctorID");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		return $this->logResponse($this->cabinetService->getLastCabinetByDoctorID($doctorID));
		
	}
	
	public function getLastCabinetByRoomID($roomID) {
		
		$this->logService->logMessage("CabinetController GetLastCabinetByRoomID");
		
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		return $this->logResponse($this->cabinetService->getLastCabinetByRoomID($roomID));
		
	}
	
	public function deleteCabinet($cabinetID) {
	
		$this->logService->logMessage("CabinetController DeleteCabinet");
	
		if (!isset($cabinetID))
			return $this->logResponse($this->NO_CABINETID);
		
		return $this->logResponse($this->cabinetService->deleteCabinet($cabinetID));
	
	}
	
}

?>