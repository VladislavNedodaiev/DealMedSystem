<?php

namespace DealMedSystem\Backend\Data;

class DataRepository
{
	
	private $host;
	private $user;
	private $pswd;
	private $db;
	
	public function __construct() {
	
		$this->host = "remotemysql.com";
		$this->user = "4ILqy0Z8HT";
		$this->pswd = "DBptnzMGDt";
		$this->db = "4ILqy0Z8HT";
	
	}
	
	// GET
	
	public function getHost() {
		
		return $this->host;
		
	}
	
	public function getUser() {
	
		return $this->user;
	
	}
	
	public function getPassword() {
		
		return $this->pswd;
		
	}
	
	public function getDatabase() {
		
		return $this->db;
		
	}
	
}

?>