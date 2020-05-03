<?php

namespace DealMedSystem\Backend\DTOs;

class ClientDTO
{
	
	// Data
	public $id;
	public $clinicID;
	public $gender;
	public $firstName;
	public $secondName;
	public $thirdName;
	public $birthday;
	public $photo;
	public $phone;
	
	// Relations
	public $histories;
	
}

?>