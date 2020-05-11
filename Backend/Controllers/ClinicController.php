<?php

namespace DealMedSystem\Backend\Controllers;

use DealMedSystem\Backend\Controllers\Controller;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\Data\DataRepository;
use DealMedSystem\Backend\Services\MailService;
use DealMedSystem\Backend\DTOs\ClinicDTO;
use DealMedSystem\Backend\Services\ClinicService;
use DealMedSystem\Backend\Communication\Response;

use DealMedSystem\Backend\DTOs\DoctorDTO;
use DealMedSystem\Backend\Controllers\DoctorController;

use DealMedSystem\Backend\DTOs\RoomDTO;
use DealMedSystem\Backend\Controllers\RoomController;

use DealMedSystem\Backend\DTOs\SymptomDTO;
use DealMedSystem\Backend\Controllers\SymptomController;

use DealMedSystem\Backend\DTOs\DiseaseDTO;
use DealMedSystem\Backend\Controllers\DiseaseController;

use DealMedSystem\Backend\DTOs\SpecializationDTO;
use DealMedSystem\Backend\Controllers\SpecializationController;

use DealMedSystem\Backend\DTOs\CabinetDTO;
use DealMedSystem\Backend\Controllers\CabinetController;

use DealMedSystem\Backend\DTOs\ConnectionDTO;
use DealMedSystem\Backend\Controllers\ConnectionController;

class ClinicController extends Controller
{
	
	private $mailService;
	private $clinicService;
	
	private $doctorController;
	private $roomController;
	private $symptomController;
	private $diseaseController;
	private $specializationController;
	private $cabinetController;
	private $ConnectionController;
	
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
	public $NO_ROOMS;
	public $NO_DOCTORS;
	public $NOT_ENOUGH_ROOMS;
	public $NO_CONNECTIONS;
	public $NO_SPECIALIZATIONS;
	
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
		$this->NO_ROOMS = new Response("NO_ROOMS", null);
		$this->NO_DOCTORS = new Response("NO_DOCTORS", null);
		$this->NOT_ENOUGH_ROOMS = new Response("NOT_ENOUGH_ROOMS", null);
		$this->NO_CONNECTIONS = new Response("NO_CONNECTIONS", null);
		$this->NO_SPECIALIZATIONS = new Response("NO_SPECIALIZATIONS", null);

		$this->mailService = new MailService($_SERVER['HTTP_HOST']);

		$this->clinicService = new ClinicService(

			$this->dataRep->getHost(),
			$this->dataRep->getUser(),
			$this->dataRep->getPassword(),
			$this->dataRep->getDatabase(),
			$this->mailService,
			$this->logService

		);
		
		$this->doctorController = new DoctorController;
		$this->roomController = new RoomController;
		$this->symptomController = new SymptomController;
		$this->diseaseController = new DiseaseController;
		$this->specializationController = new SpecializationController;
		$this->cabinetController = new CabinetController;
		$this->connectionController = new ConnectionController;
	
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
	public function register($email, $password, $repeat_password) {
		
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
		
		return $this->logResponse($this->clinicService->register($email, $password));
		
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
	
	public function getDistance($x1, $y1, $x2, $y2) {
		
		return sqrt(pow($x2-$x1, 2) + pow($y2-$y1, 2));
		
	}
	
	public function rearrangeDoctors($clinicID) {
		
		$this->specializationController = new SpecializationController;
		$this->cabinetController = new CabinetController;
		
		$doctors = $this->doctorController->getDoctorsByClinicID($clinicID);
		if ($doctors->status != $this->doctorController->SUCCESS->status)
			return $this->logResponse($this->NO_DOCTORS);
		$doctors = $doctors->content;
		
		$rooms = $this->roomController->getRoomsByClinicID($clinicID);
		if ($rooms->status != $this->roomController->SUCCESS->status)
			return $this->logResponse($this->NO_ROOMS);
		$rooms = $rooms->content;
		
		if (count($doctors) > count($rooms))
			return $this->logResponse($this->NOT_ENOUGH_ROOMS);
		
		$cabs = 0;
		foreach ($rooms as &$room) {
			if (intval($room->isCabinet))
				$cabs += 1;
		}
		
		if (count($doctors) > $cabs)
			return $this->logResponse($this->NOT_ENOUGH_ROOMS);
		
		foreach($rooms as &$room) {
			
			$room->connections = $this->connectionController->getConnectionsByRoomToID($room->id);
			if ($room->status != $this->connectionController->SUCCESS)
				return $this->logResponse($this->NO_CONNECTIONS);
			$room->connections = $room->connections->content;
			
			foreach($room->connections as &$connection) {
				foreach($rooms as &$bufRoom) {
					if ($bufRoom->id == $connection->room_to_id) {
						$connection->distance = getDistance($room->x, $room->y, $bufRoom->x, $bufRoom->y);
						break;
					}
				}
			}
			
		}
		
		$diseases = array();
		
		foreach ($doctors as &$doctor) {
			$doctor->specializations = $this->specializationController->getSpecializationsByDoctorID($doctorID);
			if ($doctor->specializations->status != $this->specializationController->SUCCESS)
				return $this->logResponse($this->NO_SPECIALIZATIONS);
			$doctor->specializations = $doctor->specializations->content;
			
			foreach($doctor->specializations as &$specialization) {
				if (!isset($diseases[$specialization->diseaseID]))
					$diseases[$specialization->diseaseID] = $this->diseaseController->getDisease($specialization->diseaseID);
			}
		}
		
		// sort by diseases
		$doctors_no_spread = array();
		$doctors_spread = array();
		
		foreach ($doctors as &$doctor) {
			$spreadness = false;
			foreach($doctor->specializations as &$specialization) {
				if ($specialization->airSpread == true || $specialization->airSpread > 0) {
					array_push($doctors_spread, $doctor);
					$spreadness = true;
					break;
				}
			}
			if (!$spreadness) {
				array_push($doctors_no_spread, $doctor);
			}
		}
		
		// sort rooms by distance
		$rooms_sorted = array();
		foreach ($rooms as &$room) {
			array_push($rooms_sorted, $room);
		}
		$doc_pos = 0;
		$i = 0;
		$k = 0;
		for ($i = 0; $i < count($rooms_sorted) / 2 && $doc_pos < count($doctors_spread); $i++) {
			$maxdist = $i;
			$lowest = $i;
			for ($k = $i + 1; $k < count($rooms_sorted) - $i; $k++) {
				if ($rooms_sorted[$k]->distance > $rooms_sorted[$i])
					$maxdist = $k;
				else if ($rooms_sorted[$k]->distance < $rooms_sorted[$i])
					$lowest = $k;
			}
			
			$buf = $rooms_sorted[$i];
			$rooms_sorted[$i] = $rooms_sorted[$maxdist];
			$rooms_sorted[$maxdist] = $buf;
			
			$buf = $rooms_sorted[$k];
			$rooms_sorted[$k] = $rooms_sorted[$lowest];
			$rooms_sorted[$lowest] = $buf;
			
			$cabinetController->createCabinet($rooms_sorted[$i]->id, $doctors_spread[$doc_pos]->id);
			$doc_pos++;
			if ($doc_pos < count($doctors_spread))
				$cabinetController->createCabinet($rooms_sorted[$k]->id, $doctors_spread[$doc_pos]->id);
			$doc_pos++;
			
		}
		
		$doc_pos = 0;
		for (;$i < count($rooms_sorted) / 2 && $doc_pos < count($doctors_no_spread); $i++) {
			$maxdist = $i;
			$lowest = $i;
			for ($k = $i + 1; $k < count($rooms_sorted) - $i; $k++) {
				if ($rooms_sorted[$k]->distance > $rooms_sorted[$i])
					$maxdist = $k;
				else if ($rooms_sorted[$k]->distance < $rooms_sorted[$i])
					$lowest = $k;
			}
			
			$buf = $rooms_sorted[$i];
			$rooms_sorted[$i] = $rooms_sorted[$maxdist];
			$rooms_sorted[$maxdist] = $buf;
			
			$buf = $rooms_sorted[$k];
			$rooms_sorted[$k] = $rooms_sorted[$lowest];
			$rooms_sorted[$lowest] = $buf;
			
			$cabinetController->createCabinet($rooms_sorted[$i]->id, $doctors_no_spread[$doc_pos]->id);
			$doc_pos++;
			if ($doc_pos < count($doctors_no_spread))
				$cabinetController->createCabinet($rooms_sorted[$k]->id, $doctors_no_spread[$doc_pos]->id);
			$doc_pos++;
			
		}
		
		return $this->logResponse($this->SUCCESS); 
		
	}
	
}

?>