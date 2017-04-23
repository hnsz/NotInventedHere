<?php
/**
 * Description of DispatcherTest
 *
 * @author hans-rudolf
 */
class DispatcherTest extends PHPUnit_Framework_TestCase
{
        public function testRun() 
        {
                $sessionStub = $this->getMockBuilder('Session')->disableOriginalConstructor()->getMock();
                $acs =  new AccessControlServerAllOpen();
                $user = new Admin($sessionStub);
                $route =  new Route("/", "DefaultPageController", "DefaultPageModel", "DefaultPageView");
                        
                $dsp = new Dispatcher($route, $user, $acs);
                $dsp->run();
        }
}
