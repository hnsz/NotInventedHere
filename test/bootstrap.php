<?php
require_once '/home/hans-rudolf/workspace/govoorbeeld/include.php';


spl_autoload_register( function($classname)  {
	$filename = "{$GLOBALS['TEST_BASEDIR']}/testclass_include/".strtolower($classname).'.php';
	if(file_exists($filename))
		include $filename;
}
);
