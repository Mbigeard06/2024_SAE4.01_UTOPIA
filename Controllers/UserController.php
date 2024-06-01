<?php

require_once("Model/Managers/UserManager.php");
require_once("Views/View.php");


class UserController{
    public function displayConnexion(){
        $view = new View("Login");
        $view->generate([]);
    }
}