<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\SymptomDTO;
use DealMedSystem\Backend\Services\SymptomService;
use DealMedSystem\Backend\Communication\Response;

class SymptomController extends Controller
{
	
	private $symptomService;
	
	public $SUCCESS;
	public $NO_SYMPTOMID;
	public $NO_CLINICID;
	public $NO_TITLE;
	public $NO_DESCRIPTION;
	
	public function __construct() {
	
		parent::__construct();
	
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_SYMPTOMID = new Response("NO_SYMPTOMID", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_TITLE = new Response("NO_TITLE", null);
		$this->NO_DESCRIPTION = new Response("NO_DESCRIPTION", null);

		$this->symptomService = new SymptomService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createSymptom($clinicID) {
		
		$this->logService->logMessage("SymptomController CreateSymptom");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		$dto = new SymptomDTO;
		$dto->clinicID = $clinicID;
		
		return $this->logResponse($this->symptomService->createSymptom($dto));
		
	}
	
	public function getSymptom($symptomID) {
		
		$this->logService->logMessage("SymptomController GetSymptom");
		
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		return $this->logResponse($this->symptomService->getSymptom($symptomID));
		
	}
	
	public function editSymptom($symptomID, $title, $description) {
	
		$this->logService->logMessage("SymptomController EditSymptom");
	
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		if (!isset($title))
			return $this->logResponse($this->NO_TITLE);
		
		if (!isset($description))
			return $this->logResponse($this->NO_DESCRIPTION);
		
		$dto = new SymptomDTO;
		$dto->id = $symptomID;
		$dto->title = $title;
		$dto->description = $description;
		
		return $this->logResponse($this->symptomService->updateSymptom($dto));
	
	}
	
	public function deleteSymptom($symptomID) {
	
		$this->logService->logMessage("SymptomController DeleteSymptom");
	
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		return $this->logResponse($this->symptomService->deleteSymptom($symptomID));
	
	}
	
}

?>