<?php

define ("CORE", __DIR__ . "/core");
define ("INTF", __DIR__ . "/interface");
define ("MODEL", __DIR__ . "/model");
define ("VIEW", __DIR__ . "/view");
define ("CONTROLLER", __DIR__ . "/controller");
define ("TMPLT", __DIR__ . "/template");


spl_autoload_register (function ($className) {
	$classFilename = strtolower ($className) . ".php";


	$path = [CORE, INTF, MODEL, VIEW, CONTROLLER];
	foreach ($path as $basedir) {
		$filename = $basedir . "/" . $classFilename;
		if (file_exists ($filename)) {
			require $filename;
		}
	}
});


