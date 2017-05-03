<?php

class PageFactory
{


	public function standardPage (IUser $iUser, Route $route) {
		$modelClass = $route->model;
		$viewClass = $route->view;
		$controllerClass = $route->controller;

		$model = new $modelClass();
		$view = new $viewClass();
		$controller = new $controllerClass ($model, $view);

		return $controller;
	}	


	public function errorPage (IUser $iUser, $message) {
		//$view = new ErrorPageView();
		$controller = new ErrorPageController ($iUser, $message);

		return $controller;
	}


}
