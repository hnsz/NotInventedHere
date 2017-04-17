<?php
class Router implements IRouter 
{
	public function getRoute(/*string*/ $uri) {
		$json = file_get_contents(__DIR__.'/../conf/routingtable.json');
		$routingTable = json_decode($json,true);

		$r = $routingTable["/"];
		return new Route($uri, $r["controller"], $r["model"], $r["view"]);
	}
}
