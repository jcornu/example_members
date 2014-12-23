<?php

namespace App\Model;

use App\Core\Config;

class Member{

	private $id;

	private $firstName;

	private $lastName;

	private $email;

	private $status = true;

	public function getId(){ return $this->id; }
	public function getFirstName(){ return $this->firstName; }
	public function setFirstName($firstName){ $this->firstName = $firstName; }
	public function getLastName(){ return $this->lastName; }
	public function setLastName($lastName){ $this->lastName = $lastName; }
	public function getEmail(){ return $this->email; }
	public function setEmail($email){ $this->email = $email; }
	public function getStatus(){ return $this->status; }
	public function setStatus($status){ $this->status = $status; }

	public function updateProperties($properties){
		$this->id 			= $properties['id'];
		$this->firstName 	= $properties['first_name'];
		$this->lastName 	= $properties['last_name'];
		$this->email 		= $properties['email'];
		$this->status 		= $properties['status'];
	}

	public static function find($memberId){

		try {
			$dbh = new \PDO(Config::DB_DNS, Config::DB_USERNAME, Config::DB_PASSWORD);

			$sql = 'SELECT * FROM member WHERE id = :mermber_id ';

			$stmt = $dbh->prepare($sql);
			$stmt->bindParam(':member_id', $memberId);
			$stmt->execute();
			$result = $stmt->fetchAll();

			echo "resultats: </br>";
			var_dump($result());
			if(count($result)==0){
				return null;
			}else{
				return 1;
			}

			$dbh = null;
		} catch (\PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
    		die();
		}
	}

	public static function findAll(){
		echo "find all...";
		try {
			$dbh = new \PDO(Config::DB_DNS, Config::DB_USERNAME, Config::DB_PASSWORD);

			$sql = 'SELECT * FROM member WHERE status = true ';

			$stmt = $dbh->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();
			$dbh = null;

			if(count($result)==0){
				return null;
			}else{
				foreach ($result as $res) {
					$m = new Member();
					$m->updateProperties($res);
					$members[] = $m;
				}
			}
			
			return $members;

		} catch (\PDOException $e) {
			print "Erreur !: " . $e->getMessage() . "<br/>";
    		die();
		}
	}
}