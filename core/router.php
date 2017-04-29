<?php

class Router implements IRouter
{


	function __construct ($routesFile) {

		$this->routes = json_decode ($routesFile);
	}


	public function getRoute ($uri) {

		$r = $this->routingTable[$uri];
		return new Route ($uri, $r["controller"], $r["model"], $r["view"]);
	}


}
