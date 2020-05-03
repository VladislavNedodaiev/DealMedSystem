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
	public $NO_TITLE;
	public $NO_X;
	public $NO_Y;
	public $WRONG_X;
	public $WRONG_Y;
	public $NO_WIDTH;
	public $NO_HEIGHT;
	public $WRONG_WIDTH;
	public $WRONG_HEIGHT;
	
	public function __construct() {
	
		parent::__construct();
	
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_ROOMID = new Response("NO_ROOMID", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_TITLE = new Response("NO_TITLE", null);
		$this->NO_X = new Response("NO_X", null);
		$this->NO_Y = new Response("NO_Y", null);
		$this->WRONG_X = new Response("WRONG_X", null);
		$this->WRONG_Y = new Response("WRONG_Y", null);
		$this->NO_WIDTH = new Response("NO_WIDTH", null);
		$this->NO_HEIGHT = new Response("NO_HEIGHT", null);
		$this->WRONG_WIDTH = new Response("WRONG_WIDTH", null);
		$this->WRONG_HEIGHT = new Response("WRONG_HEIGHT", null);

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
	
	public function editRoom($roomID, $title, $x, $y, $width, $height) {
	
		$this->logService->logMessage("RoomController EditRoom");
	
		if (!isset($roomID))
			return $this->logResponse($this->NO_ROOMID);
		
		if (!isset($title))
			return $this->logResponse($this->NO_TITLE);
		
		if (!isset($x))
			return $this->logResponse($this->NO_X);
		
		if (!is_numeric($x))
			return $this->logResponse($this->WRONG_X);
		
		if (!isset($y))
			return $this->logResponse($this->NO_Y);
		
		if (!is_numeric($y))
			return $this->logResponse($this->WRONG_Y);
		
		if (!isset($width))
			return $this->logResponse($this->NO_WIDTH);
		
		if (!is_numeric($width) || (int)$width <= 0)
			return $this->logResponse($this->WRONG_WIDTH);
		
		if (!isset($height))
			return $this->logResponse($this->NO_HEIGHT);
		
		if (!is_numeric($height) || (int)$height <= 0)
			return $this->logResponse($this->WRONG_HEIGHT);
		
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