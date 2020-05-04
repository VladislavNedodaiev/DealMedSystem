<?php

namespace DealMedSystem\Backend\DTOs;

class RoomDTO
{
	
	// Data
	public $id;
	public $clinicID;
	public $isCabinet;
	public $title;
	public $x;
	public $y;
	public $width;
	public $height;
	
	// Relations
	public $cabinets;
	public $connections;
	
}

?>