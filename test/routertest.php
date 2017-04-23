<?php

class RouterTest extends PHPUnit_Framework_TestCase
{
    public function testRoutesFile() {
       $this->assertTrue(is_readable(Router::filename));
       $json = file_get_contents(Router::filename);
       $data = json_decode($json, true);
       $this->assertTrue(is_array($data));
       $this->assertGreaterThanOrEqual(1, count($data));
       
    }
    /**
     *          @dataProvider provider
     */
    public function testGetRoute($path, $model, $view, $controller)
    {
        $routesArray = [
                "/" => ["model"=>"DefaultPageModel",  "view"=>"DefaultPageView","controller"=>"DefaultPageController"],
                "/index.php" => ["model"=>"DefaultPageModel",  "view"=>"DefaultPageView","controller"=>"DefaultPageController"],
                "/index.php/" => ["model"=>"DefaultPageModel",  "view"=>"DefaultPageView","controller"=>"DefaultPageController"],
                "/index.php/login"=>["model"=>"LoginPageModel", "view"=>"LoginPageView", "controller"=>"LoginPageController"],
                "/index.php/logout"=>["model"=>"LogoutPageModel", "view"=>"LogoutPageView", "controller"=>"LogoutPageController"],
                "/index.php/adminpanel"=>["model"=>"AdminPanelPageModel", "view"=>"AdminPanelPageView", "controller"=>"AdminPanelPageController"],
                "/index.php/subscribe"=>["model"=>"SubscribePageModel", "view"=>"SubscribePageView", "controller"=>"SubscribePageController"],
                "/index.php/unsubscribe"=>["model"=>"UnsubscribePageModel", "view"=>"UnsubscribePageView", "controller"=>"UnsubscribePageController"],
                "/index.php/member/jane-doe/profile"=>["model"=>"ProfilePageModel", "view"=>"ProfilePageView", "controller"=>"ProfilePageController"],
                "/index.php/member/jane-doe/profile/edit"=>["model"=>"ProfilePageModel", "view"=>"ProfilePageView", "controller"=>"ProfilePageController"]
        ];
        $routesJson = json_encode($routesArray);

        $router = new Router($routesJson);
        $route = $router->getRoute($path);            
            
        $this->assertInstanceOf(Route::class, $route);
        $this->assertEquals($route->model, $model);
        $this->assertEquals($route->view, $view);
        $this->assertEquals($route->controller, $controller);
    }
    public function provider() {
                return
                                [
                ["/",  "DefaultPageModel",  "DefaultPageView", "DefaultPageController"],
                ["index.php", "DefaultPageModel",  "DefaultPageView","DefaultPageController"],
                ["index.php/", "DefaultPageModel",  "DefaultPageView","DefaultPageController"],
                ["index.php/login, LoginPageModel", "LoginPageView", "LoginPageController"],
                ["index.php/logout, LogoutPageModel", "LogoutPageView", "LogoutPageController"],
                ["index.php/adminpanel, AdminPanelPageModel", "AdminPanelPageView", "AdminPanelPageController"],
                ["index.php/subscribe, SubscribePageModel", "SubscribePageView", "SubscribePageController"],
                ["index.php/unsubscribe, UnsubscribePageModel", "UnsubscribePageView", "UnsubscribePageController"],
                ["index.php/member/jane-doe/profile, ProfilePageModel", "ProfilePageView", "ProfilePageController"],
                ["index.php/member/jane-doe/profile/edit, ProfilePageModel", "ProfilePageView", "ProfilePageController"]
                        ];
    }
}
