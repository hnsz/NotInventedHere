<?php
ini_set("display_errors", "on");
error_reporting(-1);

define("PROJBASE", __DIR__);
define("CORE", PROJBASE."/core");

require_once PROJBASE.'/include.php';
require_once PROJBASE.'/main.php';
