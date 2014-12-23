<?php

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

var_dump(WEBROOT);
var_dump(ROOT);

//on charge les fichiers dans required
require (ROOT.'required.php');


if(!isset($_GET['page'])){
	$controller = 'Base';
	$action 	= 'index';
}else{
	$params = explode('/', $_GET['page']);
	var_dump($params);
	if(count($params)<1){
		echo "erreur 404, l'url n'existe pas ";
		exit;
	}

	var_dump($params[0]);

	$controller = ucfirst(strtolower($params[0]));
	$controller = $controller;
	$action 	= isset($params[1]) ? $params[1] : 'index';
	$action 	= strtolower($action);
	$id 		= isset($params[2]) ? $params[2] : null;
}


var_dump($controller);


//check que le cntroller existe

if(!file_exists(ROOT.'/Controller/'.$controller.'.php')){
	echo "erreur 404";
	exit;
}

$controllerPath = '\App\Controller\\';
$controller 	= $controllerPath.$controller;

//require(ROOT.'controller/'.$controller.'.php');
$controller = new $controller();
if(method_exists($controller, $action)){
	$controller->$action();
}else{
	echo "erreur 404";
}

echo "page d'index";