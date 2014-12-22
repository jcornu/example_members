<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require (ROOT.'core/Controller.php');

if(!isset($_GET['page'])){
	$controller = 'Base';
	$action 	= 'index';
}else{
	$params = explode('/', $_GET['page']);
	if(count($params)<1){
		echo "erreur 404, l'url n'existe pas ";
		exit;
	}

	$controller = ucfirst(strtolower($params[0]));
	$action 	= isset($params[1]) ? $params[1] : 'index';
	$action 	= strtolower($action);
}




//check que le cntroller existe
if(!file_exists(ROOT.'controller/'.$controller.'.php')){
	echo "erreur 404";
	exit;
}

require(ROOT.'controller/'.$controller.'.php');
$controller = new $controller();
if(method_exists($controller, $action)){
	$controller->$action();
}else{
	echo "erreur 404";
}

echo "page d'index";