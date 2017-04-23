<?php
class Dispatcher
{
    
    function __construct(Route $route, IUser $iUser, IAccessControlServer $iAcs) {
        $this->route = $route;
        $this->iUser = $iUser;
        $this->iAccessControlServer = $iAcs;
    }
    public function run() {
       
        $pageFactory = new PageFactory();
        $hasAccess = $this->iAccessControlServer->hasAccess($this->iUser, $this->route);
                
        if ($hasAccess) {
            $pageController = $pageFactory->standardPage($this->iUser, $this->route);
        }
        else if ($this->iUser->isAuthenticated()) {
            $pageController = $pageFactory->errorPage($this->iUser, "You are not authorised to access this page.");
        } else {
            $pageController = $pageFactory->errorPage($this->iUser, "You must logon to access this page.");
        }
        
        $pageController->run(STDOUT);
    }
}