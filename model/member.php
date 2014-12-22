<?php

class Member(){

	const 	TABLE_NAME = 'member';
	private $firstName;

	private $lastName;

	private $email;

	private $status = true;

	public function getFirstName(){ return $this->firstName; }
	public function setFirstName($firstName){ $this->firstName = $firstName; }
	public function getLastName(){ return $this->lastName; }
	public function setLastName($lastName){ $this->lastName = $lastName; }
	public function getEmail(){ return $this->email; }
	public function setEmail($email){ $this->email = $email; }
	public function getStatus(){ return $this->status; }
	public function setStatus($status){ $this->status = $status; }
}