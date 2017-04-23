<?php
class DefaultPageController implements IController
{
        function __construct(\IModel $model, \IView $view) {
                $this->model = $model;
                $this->view = $view;
        }
        public function run($outputBuffer) {
               fprintf($outputBuffer, "whatever"); 
        }
}