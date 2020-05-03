<?php

namespace DealMedSystem\Backend\DTOs;

class DiseaseDTO
{
	
	// Data
	public $id;
	public $clinicID;
	public $title;
	public $airSpread;
	public $immunity;
	public $description;
	
	// Relations
	public $histories;
	public $features;
	
}

?>