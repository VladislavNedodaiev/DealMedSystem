<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\DiseaseDTO;
use DealMedSystem\Backend\Services\DiseaseService;
use DealMedSystem\Backend\Communication\Response;

class DiseaseController extends Controller
{
	
	private $diseaseService;
	
	public $SUCCESS;
	public $NO_DISEASEID;
	public $NO_CLINICID;
	public $NO_TITLE;
	public $NO_AIR_SPREAD;
	public $NO_IMMUNITY;
	public $NO_DESCRIPTION;
	
	public function __construct() {
	
		parent::__construct();
	
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_DISEASEID = new Response("NO_DISEASEID", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_TITLE = new Response("NO_TITLE", null);
		$this->NO_AIR_SPREAD = new Response("NO_AIR_SPREAD", null);
		$this->NO_IMMUNITY = new Response("NO_IMMUNITY", null);
		$this->NO_DESCRIPTION = new Response("NO_DESCRIPTION", null);

		$this->diseaseService = new DiseaseService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createDisease($clinicID) {
		
		$this->logService->logMessage("DiseaseController CreateDisease");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		$dto = new DiseaseDTO;
		$dto->clinicID = $clinicID;
		
		return $this->logResponse($this->diseaseService->createDisease($dto));
		
	}
	
	public function getDisease($diseaseID) {
		
		$this->logService->logMessage("DiseaseController GetDisease");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->diseaseService->getDisease($diseaseID));
		
	}
	
	public function editDisease($diseaseID, $title, $airSpread, $immunity, $description) {
	
		$this->logService->logMessage("DiseaseController EditDisease");
	
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		if (!isset($title))
			return $this->logResponse($this->NO_TITLE);
		
		if (!isset($airSpread))
			return $this->logResponse($this->NO_AIR_SPREAD);
		
		if (!isset($immunity))
			return $this->logResponse($this->NO_IMMUNITY);
		
		if (!isset($description))
			return $this->logResponse($this->NO_DESCRIPTION);
		
		$dto = new DiseaseDTO;
		$dto->id = $diseaseID;
		$dto->title = $title;
		$dto->airSpread = $airSpread;
		$dto->immunity = $immunity;
		$dto->description = $description;
		
		return $this->logResponse($this->diseaseService->updateDisease($dto));
	
	}
	
	public function deleteDisease($diseaseID) {
	
		$this->logService->logMessage("DiseaseController DeleteDisease");
	
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->diseaseService->deleteDisease($diseaseID));
	
	}
	
}

?>