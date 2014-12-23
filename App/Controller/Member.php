<?php

namespace App\Controller;

use App\Core\Controller as Controller;
use App\Model\Member as MemberModel;

class Member extends Controller{

	public function index(){
		
		$m = new MemberModel();
		$members = $m::findAll();

		echo "la ds le controller";
		var_dump($members);
	}

	public function show($id){
		return null;
	}
}