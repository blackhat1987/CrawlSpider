<?php

/**
* 
*/
class Router {

	public function run()	
	{	
		$uri = parse_url($_SERVER['QUERY_STRING'], PHP_URL_PATH);
		$uri = trim($uri, ' /');
		$uri = ($amp = strpos($uri, '&')) !== false ? substr($uri, 0, $amp) : $uri;
		
		$parts = explode('/', $uri);
		
		$controller = array_shift($parts);
		$controller = ($controller ? $controller : DEFAULT_CONTROLLER) . "Controller";
		$method = array_shift($parts);
		$method = "Action" . ($method ? $method : DEFAULT_METHOD);
		
		$args = !empty($parts) ? $parts : array(); 
		if (!file_exists(APP_PATH . "/controller/$controller.php")) {
			return false;
		}

		$c = new $controller;
		if (method_exists($c, $method)) {
			$c->$method($args);
			return true;
		}
		return false;
	}
}