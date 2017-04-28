<?php
class DefaultPageController implements IController
{
        function __construct(\IModel $model, \IView $view) {
                $model->subscribe($view);
                
                $this->model = $model;
                $this->view = $view;
        }
        public function run($outputStream) {
                $this->model->doSomething();
                
                $webpage = $this->view->getUpdate();
                
                fprintf($outputStream, $webpage);
        }
}
