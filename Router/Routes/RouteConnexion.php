<?php

require_once("Router/Route.php");
require_once("Controllers/UserController.php");

class RouteConnexion extends Route{

    private UserController $controller;

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    protected function get(array $params = []){
        $this->controller->displayConnexion();
    }

    protected function post(array $params = []){
        
    }
}