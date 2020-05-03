<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\Services\MailService;
use DealMedSystem\Backend\DTOs\ClinicDTO;
use DealMedSystem\Backend\Services\ClinicService;
use DealMedSystem\Backend\Communication\Response;

use DealMedSystem\Backend\DTOs\ClientDTO;
use DealMedSystem\Backend\Controllers\ClientController;

use DealMedSystem\Backend\DTOs\DoctorDTO;
use DealMedSystem\Backend\Controllers\DoctorController;

use DealMedSystem\Backend\DTOs\RoomDTO;
use DealMedSystem\Backend\Controllers\RoomController;

use DealMedSystem\Backend\DTOs\SymptomDTO;
use DealMedSystem\Backend\Controllers\SymptomController;

use DealMedSystem\Backend\DTOs\DiseaseDTO;
use DealMedSystem\Backend\Controllers\DiseaseController;

class ClinicController extends Controller
{
	
	private $mailService;
	private $clinicService;
	
	private $clientController;
	private $doctorController;
	private $roomController;
	private $symptomController;
	private $diseaseController;
	
	public $NO_EMAIL;
	public $WRONG_EMAIL;
	public $NO_PASSWORD;
	public $NO_REPEAT_PASSWORD;
	public $DIFFERENT_PASSWORDS;
	public $NO_TITLE;
	public $NO_ADDRESS;
	public $NO_PHONE;
	public $NO_CLINICID;
	public $NO_VERIFICATION;
	public $NO_LOGIN;
	public $SUCCESS;
	public $NO_OLD_PASSWORD;
	public $NO_NEW_PASSWORD;
	
	public function __construct() {
		
		parent::__construct();
		
		$this->NO_EMAIL = new Response("NO_EMAIL", null);
		$this->WRONG_EMAIL = new Response("WRONG_EMAIL", null);
		$this->NO_PASSWORD = new Response("NO_PASSWORD", null);
		$this->NO_REPEAT_PASSWORD = new Response("NO_REPEAT_PASSWORD", null);
		$this->DIFFERENT_PASSWORDS = new Response("DIFFERENT_PASSWORDS", null);
		$this->NO_TITLE = new Response("NO_TITLE", null);
		$this->NO_ADDRESS = new Response("NO_ADDRESS", null);
		$this->NO_PHONE = new Response("NO_PHONE", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_VERIFICATION = new Response("NO_VERIFICATION", null);
		$this->NO_LOGIN = new Response("NO_LOGIN", null);
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_OLD_PASSWORD = new Response("NO_OLD_PASSWORD", null);
		$this->NO_NEW_PASSWORD = new Response("NO_NEW_PASSWORD", null);

		$this->mailService = new MailService($_SERVER['HTTP_HOST']);

		$this->clinicService = new ClinicService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->mailService,
			$this->logService

		);
		
		$this->clientController = new ClientController;
		$this->doctorController = new DoctorController;
		$this->roomController = new RoomController;
		$this->symptomController = new SymptomController;
		$this->diseaseController = new DiseaseController;
	
	}
	
	public function login($email, $password) {
		
		$this->logService->logMessage("ClinicController Login");
		
		if (!isset($email))
			return $this->logResponse($this->NO_EMAIL);
		
		if (!isset($password))
			return $this->logResponse($this->NO_PASSWORD);
		
		return $this->logResponse($this->clinicService->login($email, $password));
		
	}
	
	// registering user
	public function register($email, $password, $repeat_password, $title) {
		
		$this->logService->logMessage("ClinicController Register");
		
		if (!isset($email))
			return $this->logResponse($this->NO_EMAIL);
		
		if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
			return $this->logResponse($this->WRONG_EMAIL);
		
		if (!isset($password))
			return $this->logResponse($this->NO_PASSWORD);
		
		if (!isset($repeat_password))
			return $this->logResponse($this->NO_REPEAT_PASSWORD);
		
		if ($password != $repeat_password)
			return $this->logResponse($this->DIFFERENT_PASSWORDS);
		
		if (!isset($title))
			return $this->logResponse($this->NO_TITLE);
		
		return $this->logResponse($this->clinicService->register($email, $password, $title));
		
	}
	
	// verifying user
	public function verify($clinicID, $verification) {
	
		$this->logService->logMessage("ClinicController Verify");
	
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		if (!isset($verification))
			return $this->logResponse($this->NO_VERIFICATION);
		
		return $this->logResponse($this->clinicService->verify($clinicID, $verification));
	
	}
	
	// getting public data of user by id from database
	public function getClinic($clinicID) {
		
		$this->logService->logMessage("ClinicController GetClinic");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->clinicService->getClinic($clinicID));
		
	}
	
	public function getCount($search = null) {
		
		$this->logService->logMessage("ClinicController GetCount");
		
		return $this->logResponse($this->clinicService->getCount($search));
		
	}
	
	public function editClinic($clinicID, $title, $address, $phone) {
	
		$this->logService->logMessage("ClinicController EditClinic");
	
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		if (!isset($title))
			return $this->logResponse($this->NO_TITLE);
		
		if (!isset($address))
			return $this->logResponse($this->NO_ADDRESS);
		
		if (!isset($phone))
			return $this->logResponse($this->NO_PHONE);
		
		$dto = new ClinicDTO;
		$dto->id = $clinicID;
		$dto->title = $title;
		$dto->address = $address;
		$dto->phone = $phone;
		
		return $this->logResponse($this->clinicService->updateClinic($dto));
	
	}
	
	public function editPassword($clinicID, $oldPassword, $newPassword) {
	
		$this->logService->logMessage("ClinicController EditPassword");
	
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		if (!isset($oldPassword))
			return $this->logResponse($this->NO_OLD_PASSWORD);
		
		if (!isset($newPassword))
			return $this->logResponse($this->NO_NEW_PASSWORD);
		
		return $this->logResponse($this->clinicService->updatePassword($clinicID, $oldPassword, $newPassword));
	
	}
	
}

?>