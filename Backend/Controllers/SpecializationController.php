<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\SpecializationDTO;
use DealMedSystem\Backend\Services\SpecializationService;
use DealMedSystem\Backend\Communication\Response;

class SpecializationController extends Controller
{
	
	private $specializationService;
	
	public $SUCCESS;
	public $NO_SPECIALIZATIONID;
	public $NO_DOCTORID;
	public $NO_DISEASEID;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_SPECIALIZATIONID = new Response("NO_SPECIALIZATIONID", null);
		$this->NO_DOCTORID = new Response("NO_DOCTORID", null);
		$this->NO_DISEASEID = new Response("NO_DISEASEID", null);

		$this->specializationService = new SpecializationService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createSpecialization($doctorID, $diseaseID) {
		
		$this->logService->logMessage("SpecializationController CreateSpecialization");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		$dto = new SpecializationDTO;
		$dto->doctorID = $doctorID;
		$dto->diseaseID = $diseaseID;
		
		return $this->logResponse($this->specializationService->createSpecialization($dto));
		
	}
	
	public function getSpecialization($specializationID) {
		
		$this->logService->logMessage("SpecializationController GetSpecialization");
		
		if (!isset($specializationID))
			return $this->logResponse($this->NO_SPECIALIZATIONID);
		
		return $this->logResponse($this->specializationService->getSpecialization($specializationID));
		
	}
	
	public function getSpecializationsByIDs($doctorID, $diseaseID) {
		
		$this->logService->logMessage("SpecializationController GetSpecializationByIDs");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->specializationService->getSpecializationsByIDs($doctorID, $diseaseID));
		
	}
	
	public function getSpecializationsByDoctorID($doctorID) {
		
		$this->logService->logMessage("SpecializationController GetSpecializationByDoctorID");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		return $this->logResponse($this->specializationService->getSpecializationsByDoctorID($doctorID));
		
	}
	
	public function getSpecializationsByDiseaseID($diseaseID) {
		
		$this->logService->logMessage("SpecializationController GetSpecializationByDiseaseID");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->specializationService->getSpecializationsByDiseaseID($diseaseID));
		
	}
	
	public function getLastSpecialization() {
		
		$this->logService->logMessage("SpecializationController GetLastSpecialization");
		
		$specializationID = $this->specializationService->getLastID();
		if ($specializationID->status != $this->specializationService->SUCCESS->status)
			return $this->logResponse($specializationID);
		
		return $this->logResponse($this->specializationService->getSpecialization($specializationID->content));
		
	}
	
	public function getLastSpecializationByDoctorID($doctorID) {
		
		$this->logService->logMessage("SpecializationController GetLastSpecializationByDoctorID");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		return $this->logResponse($this->specializationService->getLastSpecializationByDoctorID($doctorID));
		
	}
	
	public function getLastSpecializationByDiseaseID($diseaseID) {
		
		$this->logService->logMessage("SpecializationController GetLastSpecializationByDiseaseID");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->specializationService->getLastSpecializationByDiseaseID($diseaseID));
		
	}
	
	public function deleteSpecialization($specializationID) {
	
		$this->logService->logMessage("SpecializationController DeleteSpecialization");
	
		if (!isset($specializationID))
			return $this->logResponse($this->NO_SPECIALIZATIONID);
		
		return $this->logResponse($this->specializationService->deleteSpecialization($specializationID));
	
	}
	
}

?>