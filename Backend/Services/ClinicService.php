<?php

namespace DealMedSystem\Backend\Services;

use DealMedSystem\Backend\Services\Service;
use DealMedSystem\Backend\Services\LogService;
use DealMedSystem\Backend\DTOs\ClinicDTO;
use DealMedSystem\Backend\Services\MailService;
use DealMedSystem\Backend\Communication\Response;

class ClinicService extends Service
{

	private $mailService;
	
	private $DB_TABLE;
	
	public $UNVERIFIED;
	public $EMAIL_REGISTERED;
	public $WRONG_PASSWORD;
	public $EMAIL_UNSENT;
	public $SAME_PASSWORDS;
	
	public function __construct($host, $user, $pswd, $db, $mailService, $logService) {
		
		parent::__construct($host, $user, $pswd, $db, $logService);
		
		$this->DB_TABLE = "Clinic";
		
		$this->UNVERIFIED = new Response("UNVERIFIED", null);
		$this->EMAIL_REGISTERED = new Response("EMAIL_REGISTERED", null);
		$this->WRONG_PASSWORD = new Response("WRONG_PASSWORD", null);
		$this->EMAIL_UNSENT = new Response("EMAIL_UNSENT", null);
		$this->SAME_PASSWORDS = new Response("SAME_PASSWORDS", null);
		
		$this->mailService = $mailService;

	}
	
	// logging in (getting private data, such as email)
	public function login($email, $password) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`email`='".$email."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				if ($res['verification'])
					return $this->UNVERIFIED;
				if (password_verify($password, $res['password'])) {

					$dto = new ClinicDTO;
					
					$dto->id = $res['clinic_id'];
					$dto->email = $res['email'];
					$dto->password = $res['password'];
					$dto->phone = $res['phone'];
					$dto->address = $res['address'];
					$dto->verification = $res['verification'];
					$dto->registerDate = $res['register_date'];
					return new Response($this->SUCCESS->status, $dto);
					
				}
				
				return $this->WRONG_PASSWORD;
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	// registering clinic
	public function register($email, $password) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`email`='".$email."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				return $this->EMAIL_REGISTERED;
			}
		}
		
		// generating verification hash
		$verification = md5(rand(0, 10000));
		
		$this->database->query("START TRANSACTION;");
		$this->database->query("SAVEPOINT reg_".$verification.";");
		
		if ($this->database->query("INSERT INTO `".$this->DB_TABLE."`(`password`, `email`, `verification`, `register_date`)".
						   "VALUES (".
						   "'".password_hash($password, PASSWORD_BCRYPT)."',".
						   "'".$email."', ".
						   "'".$verification."',".
						   "STR_TO_DATE('".date('d/m/Y')."', '%d/%m/%Y'));")) {
			
			if ($this->mailService->sendVerificationEmail($email, $verification) == $this->mailService->SUCCESS->status) {
				
				$this->database->query("COMMIT;");
				return $this->SUCCESS;
				
			} else {
				$this->database->query("ROLLBACK TO reg_".$verification.";");
				$this->database->query("COMMIT;");
				
				return $this->EMAIL_UNSENT;
			}
			
		}
		
		return $this->DB_ERROR;
		
	}
	
	// verifying user
	public function verify($clinicID, $verification) {
	
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* FROM `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."' AND `verification`='".$verification."';")) {
			
			if ($this->database->query("UPDATE `".$this->DB_TABLE."` SET `verification`=NULL WHERE `clinic_id`='".$clinicID."';"))
				return $this->SUCCESS;
			
			return $this->DB_ERROR;
			
		}
		
		return $this->NOT_FOUND;
	
	}
	
	// getting public data of user by id from database
	public function getClinic($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($result = $this->database->query("SELECT `".$this->DB_TABLE."`.* From `".$this->DB_TABLE."` WHERE `".$this->DB_TABLE."`.`clinic_id`='".$clinicID."';")) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ClinicDTO;
					
				$dto->id = $res['clinic_id'];
				$dto->email = $res['email'];
				$dto->password = $res['password'];
				$dto->phone = $res['phone'];
				$dto->address = $res['address'];
				$dto->verification = $res['verification'];
				$dto->registerDate = $res['register_date'];
				
				return new Response($this->SUCCESS->status, $dto);
				
			}
		}
		
		return $this->NOT_FOUND;
		
	}
	
	// getting clinics from database
	// limit - how many
	// offset - from which entry
	// search must be associative array where key is parameter to apply search pattern and value is pattern string
	public function getClinics($offset, $limit, $search = null) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		$selectQuery = "SELECT `".$this->DB_TABLE."`.*";
		$whereQuery = " FROM `".$this->DB_TABLE."`";
		$likeQuery = "";
		
		if ($search && !empty($search)) {
		
			$likeQuery = " WHERE 1=1";
		
			foreach ($search as $key => &$value) {
			
				$likeQuery .= " AND `".$this->DB_TABLE."`.`".$key."`";
				$likeQuery .= " LIKE ";
				$likeQuery .= "'".$value."'";
			
			}
		
		}
		
		$limitQuery = " LIMIT ".$limit;
		$offsetQuery = " OFFSET ".$offset;
		
		$query = $selectQuery.$whereQuery.$likeQuery.$limitQuery.$offsetQuery.";";
		
		if ($result = $this->database->query($query)) {
			
			$clinics = array();
			
			while ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$dto = new ClinicDTO;
					
				$dto->id = $res['clinic_id'];
				$dto->email = $res['email'];
				$dto->password = $res['password'];
				$dto->phone = $res['phone'];
				$dto->address = $res['address'];
				$dto->verification = $res['verification'];
				$dto->registerDate = $res['register_date'];
				
				array_push($clinics, $dto);
				
			}
			
			if (!empty($clinics))
				return new Response($this->SUCCESS->status, $clinics);
			
		}
		
		return $this->NOT_FOUND;
		
	}
	
	// search must be associative array where key is parametre to apply search pattern and value is pattern string
	public function getCount($search = null) {
		
		if (!$this->database || $this->database->connect_errno)
			return new Response($this->DB_ERROR->status, 0);
		
		$selectQuery = "SELECT COUNT(`".$this->DB_TABLE."`.`clinic_id`) AS `count`";
		$whereQuery = " FROM `".$this->DB_TABLE."`";
		$likeQuery = "";
		
		if ($search && !empty($search)) {
		
			$likeQuery = " WHERE 1=1";
		
			foreach ($search as $key => &$value) {
			
				$likeQuery .= " AND `".$this->DB_TABLE."`.`".$key."`";
				$likeQuery .= " LIKE ";
				$likeQuery .= "'".$value."'";
			
			}
		
		}
		
		$query = $selectQuery.$whereQuery.$likeQuery.";";
		
		if ($result = $this->database->query($query)) {
			if ($res = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				return new Response($this->SUCCESS->status, $res['count']);
				
			}
		}
		
		return new Response($this->NOT_FOUND->status, 0);
		
	}
	
	public function updateClinic($dto) {
		
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("UPDATE `".$this->DB_TABLE."` SET `title`='".$dto->title."', `address`='".$dto->address."', `phone`='".$dto->phone."' WHERE `clinic_id`='".$dto->id."';"))
			return $this->SUCCESS;
			
		return $this->DB_ERROR;
		
	}
	
	// update password
	public function updatePassword($clinicID, $oldPassword, $newPassword) {
	
		if ($oldPassword == $newPassword)
			return $this->SAME_PASSWORDS;
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		$clinicResponse = $this->getClinic($clinicID);
		if ($clinicResponse->status != $this->SUCCESS->status)
			return $clinicResponse;
		
		$result = $this->login($clinicResponse->content->email, $oldPassword);
		
		if ($result->status ==$this->SUCCESS->status) {
			
			$temp = password_hash($newPassword, PASSWORD_BCRYPT);
			if ($mysqli->query("UPDATE `".$this->DB_TABLE."` SET `password`='".$temp."' WHERE `clinic_id`='".$clinicID."';"))
				return $this->SUCCESS;
			
			return $this->NOT_FOUND;
			
		}
		
		return $result;
	
	}
	
	public function deleteClinic($clinicID) {
		
		if (!$this->database || $this->database->connect_errno)
			return $this->DB_ERROR;
		
		if ($this->database->query("DELETE FROM `".$this->DB_TABLE."` WHERE `clinic_id`='".$clinicID."';"))
			return $this->SUCCESS;
			
		return $this->NOT_FOUND;
		
	}
	
}

?>