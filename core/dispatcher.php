<?php
class Dispatcher
{
	function __construct() {
		
	}
	public function run() {
		$uri = "/";
		$router = new Router();
		$route = $router->getRoute($uri);
	}
}