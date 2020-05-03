<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\FeatureDTO;
use DealMedSystem\Backend\Services\FeatureService;
use DealMedSystem\Backend\Communication\Response;

class FeatureController extends Controller
{
	
	private $featureService;
	
	public $SUCCESS;
	public $NO_FEATUREID;
	public $NO_SYMPTOMID;
	public $NO_DISEASEID;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_FEATUREID = new Response("NO_FEATUREID", null);
		$this->NO_SYMPTOMID = new Response("NO_SYMPTOMID", null);
		$this->NO_DISEASEID = new Response("NO_DISEASEID", null);

		$this->featureService = new FeatureService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createFeature($symptomID, $diseaseID) {
		
		$this->logService->logMessage("FeatureController CreateFeature");
		
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		$dto = new FeatureDTO;
		$dto->symptomID = $symptomID;
		$dto->diseaseID = $diseaseID;
		
		return $this->logResponse($this->featureService->createFeature($dto));
		
	}
	
	public function getFeature($featureID) {
		
		$this->logService->logMessage("FeatureController GetFeature");
		
		if (!isset($featureID))
			return $this->logResponse($this->NO_FEATUREID);
		
		return $this->logResponse($this->featureService->getFeature($featureID));
		
	}
	
	public function getFeaturesByIDs($symptomID, $diseaseID) {
		
		$this->logService->logMessage("FeatureController GetFeatureByIDs");
		
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->featureService->getFeaturesByIDs($symptomID, $diseaseID));
		
	}
	
	public function getFeaturesBySymptomID($symptomID) {
		
		$this->logService->logMessage("FeatureController GetFeatureBySymptomID");
		
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		return $this->logResponse($this->featureService->getFeaturesBySymptomID($symptomID));
		
	}
	
	public function getFeaturesByDiseaseID($diseaseID) {
		
		$this->logService->logMessage("FeatureController GetFeatureByDiseaseID");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->featureService->getFeaturesByDiseaseID($diseaseID));
		
	}
	
	public function getLastFeature() {
		
		$this->logService->logMessage("FeatureController GetLastFeature");
		
		$featureID = $this->featureService->getLastID();
		if ($featureID->status != $this->featureService->SUCCESS->status)
			return $this->logResponse($featureID);
		
		return $this->logResponse($this->featureService->getFeature($featureID->content));
		
	}
	
	public function getLastFeatureBySymptomID($symptomID) {
		
		$this->logService->logMessage("FeatureController GetLastFeatureBySymptomID");
		
		if (!isset($symptomID))
			return $this->logResponse($this->NO_SYMPTOMID);
		
		return $this->logResponse($this->featureService->getLastFeatureBySymptomID($symptomID));
		
	}
	
	public function getLastFeatureByDiseaseID($diseaseID) {
		
		$this->logService->logMessage("FeatureController GetLastFeatureByDiseaseID");
		
		if (!isset($diseaseID))
			return $this->logResponse($this->NO_DISEASEID);
		
		return $this->logResponse($this->featureService->getLastFeatureByDiseaseID($diseaseID));
		
	}
	
	public function deleteFeature($featureID) {
	
		$this->logService->logMessage("FeatureController DeleteFeature");
	
		if (!isset($featureID))
			return $this->logResponse($this->NO_FEATUREID);
		
		return $this->logResponse($this->featureService->deleteFeature($featureID));
	
	}
	
}

?>