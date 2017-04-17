<?php

class RouterTest extends PHPUnit_Framework_TestCase
{
	public function testGetRoute() {
		$r = new Router();
		$route = $r->getRoute("test");
		if($route == null)
			echo "RouterRest:getRoute OK";	
	}
}
