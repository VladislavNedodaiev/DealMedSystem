<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\RoomDTO;
use DealMedSystem\Backend\Services\RoomService;
use DealMedSystem\Backend\Communication\Response;

class RoomController extends Controller
{
	
	private $roomService;
	
	public $SUCCESS;
	public $NO_ROOMID;
	public $NO_CLINICID;
	public $NO_ISCABINET;
	public $NO_TITLE;
	public $NO_X;
	public $NO_Y;
	public $INCORRECT_X;
	public $INCORRECT_Y;
	public $NO_WIDTH;
	public $NO_HEIGHT;
	public $INCORRECT_WIDTH;
	public $INCORRECT_HEIGHT;
	
	public function __construct() {
	
		parent::__construct();
	
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_ROOMID = new Response("NO_ROOMID", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_ISCABINET = new Response("NO_ISCABINET", null);
		$this->NO_TITLE = new Response("NO_TITLE", null);
		$this->NO_X = new Response("NO_X", null);
		$this->NO_Y = new Response("NO_Y", null);
		$this->INCORRECT_X = new Response("INCORRECT_X", null);
		$this->INCORRECT_Y = new Response("INCORRECT_Y", null);
		$this->NO_WIDTH = new Response("NO_WIDTH", null);
		$this->NO_HEIGHT = new Response("NO_HEIGHT", null);
		$this->INCORRECT_WIDTH = new Response("INCORRECT_WIDTH", null);
		$this->INCORRECT_HEIGHT = new Response("INCORRECT_HEIGHT", null);

		$this->roomService = new RoomService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createRoom($clinicID) {
		
		$this->logService->logMessage("RoomController CreateRoom");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		$dto = new RoomDTO;
		$dto->clinicID = $clinicID;
		
		return $this->logResponse($this->roomService->createRoom($dto));
		
	}
	
	public function getRoom($roomID) {
		
		$this->logService->logMessage("RoomController GetRoom");
		
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		return $this->logResponse($this->roomService->getRoom($roomID));
		
	}
	
	public function getRoomsByClinicID($clinicID) {
		
		$this->logService->logMessage("RoomController GetRoomByClinicID");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->roomService->getRoomsByClinicID($clinicID));
		
	}
	
	public function getLastRoom() {
		
		$this->logService->logMessage("RoomController GetLastRoom");
		
		$roomID = $this->roomService->getLastID();
		if ($roomID->status != $this->roomService->SUCCESS->status)
			return $this->logResponse($roomID);
		
		return $this->logResponse($this->roomService->getRoom($roomID->content));
		
	}
	
	public function getLastRoomByClinicID($clinicID) {
		
		$this->logService->logMessage("RoomController GetLastRoomByClinicID");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->roomService->getLastRoomByClinicID($clinicID));
		
	}
	
	public function editRoom($roomID, $isCabinet, $title, $x, $y, $width, $height) {
	
		$this->logService->logMessage("RoomController EditRoom");
	
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		if (!isset($title))
			return $this->logResponse($this->NO_TITLE);
		
		if (!isset($isCabinet))
			return $this->logResponse($this->NO_ISCABINET);
		
		if (!isset($x))
			return $this->logResponse($this->NO_X);
		
		if (!is_numeric($x))
			return $this->logResponse($this->INCORRECT_X);
		
		if (!isset($y))
			return $this->logResponse($this->NO_Y);
		
		if (!is_numeric($y))
			return $this->logResponse($this->INCORRECT_Y);
		
		if (!isset($width))
			return $this->logResponse($this->NO_WIDTH);
		
		if (!is_numeric($width) || (int)$width <= 0)
			return $this->logResponse($this->INCORRECT_WIDTH);
		
		if (!isset($height))
			return $this->logResponse($this->NO_HEIGHT);
		
		if (!is_numeric($height) || (int)$height <= 0)
			return $this->logResponse($this->INCORRECT_HEIGHT);
		
		$dto = new RoomDTO;
		$dto->id = $roomID;
		$dto->title = $title;
		$dto->x = (int)$x;
		$dto->y = (int)$y;
		$dto->width = (int)$width;
		$dto->height = (int)$height;
		
		return $this->logResponse($this->roomService->updateRoom($dto));
	
	}
	
	public function deleteRoom($roomID) {
	
		$this->logService->logMessage("RoomController DeleteRoom");
	
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		return $this->logResponse($this->roomService->deleteRoom($roomID));
	
	}
	
}

?>