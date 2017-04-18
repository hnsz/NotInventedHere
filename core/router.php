<?php
class Router implements IRouter 
{
    const filename = __DIR__.'/../conf/routingtable.json';

    public function getRoute(/*string*/ $uri) {
		$json = file_get_contents(self::filename);
		$routingTable = json_decode($json,true);

		$r = $routingTable["/"];
		return new Route($uri, $r["controller"], $r["model"], $r["view"]);
	}
}
