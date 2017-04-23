<?php
define("PROJBASE", __DIR__);

$routesFile = file_get_contents(PROJBASE.'/conf/routingtable.json');
$router = new Router($routesFile);


if (filter_has_var(INPUT_SERVER, 'REQUEST_URI')) {
    $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
} else {
    $uri = "/";
}

$route = $router->getRoute($uri);

$session =  new Session($_SESSION);

$userFactory = new UserFactory();
$user = $userFactory->makeUser($session);

$acs =  new AccessControlServerAllOpen();

$dispatcher = new Dispatcher($route, $user, $acs);

$dispatcher->run();