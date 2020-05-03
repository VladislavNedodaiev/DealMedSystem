<?php

namespace DealMedSystem\Backend\DTOs;

class DoctorDTO
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
	public $description;
	public $phone;
	
	// Relations
	public $specializations;
	
}

?>