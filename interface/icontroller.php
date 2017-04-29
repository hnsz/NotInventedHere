<?php

interface IController
{


	function __construct (IModel $model, IView $view);

	public function run ($outputBuffer);
}
