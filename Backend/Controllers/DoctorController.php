<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\DoctorDTO;
use DealMedSystem\Backend\Services\DoctorService;
use DealMedSystem\Backend\Communication\Response;

class DoctorController extends Controller
{
	
	private $doctorService;
	
	public $SUCCESS;
	public $NO_DOCTORID;
	public $NO_CLINICID;
	public $NO_GENDER;
	public $NO_FIRSTNAME;
	public $NO_SECONDNAME;
	public $NO_THIRDNAME;
	public $NO_BIRTHDAY;
	public $INCORRECT_DATE;
	public $NO_PHOTO;
	public $NO_DESCRIPTION;
	public $NO_PHONE;
	
	public function __construct() {
	
		parent::__construct();
	
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_DOCTORID = new Response("NO_DOCTORID", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_GENDER = new Response("NO_GENDER", null);
		$this->NO_FIRSTNAME = new Response("NO_FIRSTNAME", null);
		$this->NO_SECONDNAME = new Response("NO_SECONDNAME", null);
		$this->NO_THIRDNAME = new Response("NO_THIRDNAME", null);
		$this->NO_BIRTHDAY = new Response("NO_BIRTHDAY", null);
		$this->INCORRECT_DATE = new Response("INCORRECT_DATE", null);
		$this->NO_PHOTO = new Response("NO_PHOTO", null);
		$this->NO_DESCRIPTION = new Response("NO_DESCRIPTION", null);
		$this->NO_PHONE = new Response("NO_PHONE", null);

		$this->doctorService = new DoctorService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createDoctor($clinicID) {
		
		$this->logService->logMessage("DoctorController CreateDoctor");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		$dto = new DoctorDTO;
		$dto->clinicID = $clinicID;
		
		return $this->logResponse($this->doctorService->createDoctor($dto));
		
	}
	
	public function getDoctor($doctorID) {
		
		$this->logService->logMessage("DoctorController GetDoctor");
		
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		return $this->logResponse($this->doctorService->getDoctor($doctorID));
		
	}
	
	public function getSymptomsByClinicID($clinicID) {
		
		$this->logService->logMessage("SymptomController GetSymptomByClinicID");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->symptomService->getSymptomsByClinicID($clinicID));
		
	}
	
	public function getLastSymptom() {
		
		$this->logService->logMessage("SymptomController GetLastSymptom");
		
		$symptomID = $this->symptomService->getLastID();
		if ($symptomID->status != $this->symptomService->SUCCESS->status)
			return $this->logResponse($symptomID);
		
		return $this->logResponse($this->symptomService->getSymptom($symptomID->content));
		
	}
	
	public function getLastSymptomByClinicID($clinicID) {
		
		$this->logService->logMessage("SymptomController GetLastSymptomByClinicID");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->symptomService->getLastSymptomByClinicID($clinicID));
		
	}
	
	public function editDoctor($doctorID, $gender, $firstName, $secondName, $thirdName, $birthday, $photo, $description, $phone) {
	
		$this->logService->logMessage("DoctorController EditDoctor");
	
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		if (!isset($gender))
			return $this->logResponse($this->NO_GENDER);
		
		if (!isset($firstName))
			return $this->logResponse($this->NO_FIRSTNAME);
		
		if (!isset($secondName))
			return $this->logResponse($this->NO_SECONDNAME);
		
		if (!isset($thirdName))
			return $this->logResponse($this->NO_THIRDNAME);
		
		if (!isset($birthday))
			return $this->logResponse($this->NO_BIRTHDAY);
		
		if (!((bool)(strtotime($birthday))))
			return $this->logResponse($this->INCORRECT_DATE);
		
		if (!isset($photo))
			return $this->logResponse($this->NO_PHOTO);
		
		if (!isset($description))
			return $this->logResponse($this->NO_DESCRIPTION);
		
		if (!isset($phone))
			return $this->logResponse($this->NO_PHONE);
		
		$dto = new DoctorDTO;
		$dto->id = $doctorID;
		$dto->gender = $gender;
		$dto->firstName = $firstName;
		$dto->secondName = $secondName;
		$dto->thirdName = $thirdName;
		$dto->birthday = $birthday;
		$dto->photo = $photo;
		$dto->description = $description;
		$dto->phone = $phone;
		
		return $this->logResponse($this->doctorService->updateDoctor($dto));
	
	}
	
	public function deleteDoctor($doctorID) {
	
		$this->logService->logMessage("DoctorController DeleteDoctor");
	
		if (!isset($doctorID))
			return $this->logResponse($this->NO_DOCTORID);
		
		return $this->logResponse($this->doctorService->deleteDoctor($doctorID));
	
	}
	
}

?>