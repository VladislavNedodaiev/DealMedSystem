<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\DTOs\ClientDTO;
use DealMedSystem\Backend\Services\ClientService;
use DealMedSystem\Backend\Communication\Response;

class ClientController extends Controller
{
	
	private $clientService;
	
	public $SUCCESS;
	public $NO_CLIENTID;
	public $NO_CLINICID;
	public $NO_GENDER;
	public $NO_FIRSTNAME;
	public $NO_SECONDNAME;
	public $NO_THIRDNAME;
	public $NO_BIRTHDAY;
	public $INCORRECT_DATE;
	public $NO_PHOTO;
	public $NO_PHONE;
	
	public function __construct() {
	
		parent::__construct();
	
		$this->SUCCESS = new Response("SUCCESS", null);
		$this->NO_CLIENTID = new Response("NO_CLIENTID", null);
		$this->NO_CLINICID = new Response("NO_CLINICID", null);
		$this->NO_GENDER = new Response("NO_GENDER", null);
		$this->NO_FIRSTNAME = new Response("NO_FIRSTNAME", null);
		$this->NO_SECONDNAME = new Response("NO_SECONDNAME", null);
		$this->NO_THIRDNAME = new Response("NO_THIRDNAME", null);
		$this->NO_BIRTHDAY = new Response("NO_BIRTHDAY", null);
		$this->INCORRECT_DATE = new Response("INCORRECT_DATE", null);
		$this->NO_PHOTO = new Response("NO_PHOTO", null);
		$this->NO_PHONE = new Response("NO_PHONE", null);

		$this->clientService = new ClientService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->logService

		);
	
	}
	
	public function createClient($clinicID, $gender, $firstName, $secondName, $thirdName) {
		
		$this->logService->logMessage("ClientController CreateClient");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		if (!isset($gender))
			return $this->logResponse($this->NO_GENDER);
		
		if (!isset($firstName))
			return $this->logResponse($this->NO_FIRSTNAME);
		
		if (!isset($secondName))
			return $this->logResponse($this->NO_SECONDNAME);
		
		if (!isset($thirdName))
			return $this->logResponse($this->NO_THIRDNAME);
		
		$dto = new ClientDTO;
		$dto->clinicID = $clinicID;
		$dto->gender = $gender;
		$dto->firstName = $firstName;
		$dto->secondName = $secondName;
		$dto->thirdName = $thirdName;
		
		return $this->logResponse($this->clientService->createClient($dto));
		
	}
	
	public function getClient($clientID) {
		
		$this->logService->logMessage("ClientController GetClient");
		
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		return $this->logResponse($this->clientService->getClient($clientID));
		
	}
	
	public function getClientsByClinicID($clinicID) {
		
		$this->logService->logMessage("ClientController GetClientByClinicID");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->clientService->getClientsByClinicID($clinicID));
		
	}
	
	public function getLastClient() {
		
		$this->logService->logMessage("ClientController GetLastClient");
		
		$clientID = $this->clientService->getLastID();
		if ($clientID->status != $this->clientService->SUCCESS->status)
			return $this->logResponse($clientID);
		
		return $this->logResponse($this->clientService->getClient($clientID->content));
		
	}
	
	public function getLastClientByClinicID($clinicID) {
		
		$this->logService->logMessage("ClientController GetLastClientByClinicID");
		
		if (!isset($clinicID))
			return $this->logResponse($this->NO_CLINICID);
		
		return $this->logResponse($this->clientService->getLastClientByClinicID($clinicID));
		
	}
	
	public function editClient($clientID, $gender, $firstName, $secondName, $thirdName, $birthday, $photo, $phone) {
	
		$this->logService->logMessage("ClientController EditClient");
	
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
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
		
		if (!isset($phone))
			return $this->logResponse($this->NO_PHONE);
		
		$dto = new ClientDTO;
		$dto->id = $clientID;
		$dto->gender = $gender;
		$dto->firstName = $firstName;
		$dto->secondName = $secondName;
		$dto->thirdName = $thirdName;
		$dto->birthday = $birthday;
		$dto->photo = $photo;
		$dto->phone = $phone;
		
		return $this->logResponse($this->clientService->updateClient($dto));
	
	}
	
	public function deleteClient($clientID) {
	
		$this->logService->logMessage("ClientController DeleteClient");
	
		if (!isset($clientID))
			return $this->logResponse($this->NO_CLIENTID);
		
		return $this->logResponse($this->clientService->deleteClient($clientID));
	
	}
	
}

?>