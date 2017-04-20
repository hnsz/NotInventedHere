<?php
define("CORE", __DIR__."/core");
define("INTF", __DIR__."/interface");
define("VIEW", __DIR__."/view");
define("TMPLT", __DIR__."/template");

require_once INTF.'/iuser.php';
require_once INTF.'/irouter.php';
require_once INTF.'/ipagecontroller.php';
require_once INTF.'/iaccesscontrolserver.php';

require_once CORE.'/dispatcher.php';
require_once CORE.'/user.php';
require_once CORE.'/router.php';
require_once CORE.'/route.php';
require_once CORE.'/accesscontrolserver.php';
require_once CORE.'/accesscontrolserverallopen.php';
require_once CORE.'/pagefactory.php';

require_once VIEW.'/viewdefault.php';