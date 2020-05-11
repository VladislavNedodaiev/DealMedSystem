<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\Communication\Response;

class Controller
{
	
	protected $dataRep;
	protected $logService;
	
	public function __construct() {
		
		$this->dataRep = new DataRepository;
		$this->logService = new LogService;
		
	}
	
	protected function logResponse($response) {
	
		$this->logService->logResponse($response);
	
		return $response;
	
	}
	
}

?>