<?php
class Route
{
	public $uri;
	public $controller;
	public $model;
	public $view;
	
	function __construct($uri, $controller, $model, $view) {
		$this->uri = $uri;
		$this->controller = $controller;
		$this->model = $model;
		$this->view = $view;
	}
}