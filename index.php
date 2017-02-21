<?php

namespace BlogPHP;

use BlogPHP\App;

//More information on the global variable $_SERVER here -> 
	//http://php.net/manual/en/reserved.variables.server.php , or here -> 
	//http://www.w3resource.com/php/super-variables/$_SERVER.php
// If the script was queried through a secure HTTP protocol, $_SERVER['HTTPS'] is set to a non-empty value.
if(isset($_SERVER["HTTPS"])&& strtolower($_SERVER["HTTPS"]) == "on" ) {
	$protocol = 'https://';
} else {
	$protocol = 'http://';
}

define('PROTOCOL', $protocol);
// Removing backslashes for Windows compatibility
define('ROOT_URL', PROTOCOL . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/'); 
define('ROOT_PATH', __DIR__ . '/');


try {
    require ROOT_PATH . 'App/Autoloader.php';
    App\Autoloader::init(); // Load necessary classes
	
	if(!empty($_GET['p'])) {
		$controller = $_GET['p'];
	} else {
		$controller = 'blogController';
	}
	
	if(!empty($_GET['a'])){
		$action = $_GET['a'];
	} else {
		$action = 'home';
	}
	
    $params = [
		'ctrl' => $controller, 
		'act' => $action
	];
    App\Router::run($params);
	
} catch (\Exception $e) {
    echo $e->getMessage();
}