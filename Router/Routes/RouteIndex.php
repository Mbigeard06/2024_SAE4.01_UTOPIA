<?php

require_once("Router/Route.php");
require_once("Controllers/MainController.php");

class RouteIndex extends Route{


    private MainController $mainController;

    public function __construct(MainController $mainController)
    {
        $this->mainController = $mainController;
    }


    protected function get(array $params=[]):void{
        $this->mainController->displayIndex();
    }

    protected function post(array $params = []):void{
    }
}