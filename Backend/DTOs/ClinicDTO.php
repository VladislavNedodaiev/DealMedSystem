<?php

namespace DealMedSystem\Backend\DTOs;

class ClinicDTO
{
	
	// Data
	public $id;
	public $title;
	public $email;
	public $password;
	public $phone;
	public $address;
	public $verification;
	public $registerDate;
	
	// Relations
	public $rooms;
	public $doctors;
	public $clients;
	
}

?>