<?php

namespace App\Core;


use App\Core\Config;

class Controller{

	
	private $vars = array();

	public function set($data){
		$this->vars = array_merge($this->vars, $data);
	}

	public function render($filename = null, $data = null){
		if($data != null)
			$this->set($data);
		
		extract($this->vars);
		require(ROOT.'view/'.$filename.'.php');
	}
}