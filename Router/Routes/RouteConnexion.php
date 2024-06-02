<?php

require_once("Router/Route.php");
require_once("Controllers/UserController.php");


class RouteConnexion extends Route
{

    private UserController $userController;

    public function __construct($userController)
    {
        $this->userController = $userController;
    }

    protected function get(array $params = [])
    {
        $this->userController->displayConnexion();
    }

    protected function post(array $params = [])
    {
        $authorized = $this->userController->verifyConnexionAttempt($params["mailuid"], $params["pwd"]);
        if ($authorized) {
            header("Location: index.php?action=index");
            exit;
        } else {
            header("Location: index.php?action=connexion");
            exit;
        }
    }
}
