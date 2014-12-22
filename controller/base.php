<?php

class Base extends Controller{
	

	public function index($data = null){
		echo "vous etes dans la class ".get_class($this).".php \r\n";

		$this->render(get_class($this).'.php', array(
			'name' => "Bryant",
			));
	}
}