<?php


require_once("Router/Route.php");
require_once("Controllers/UserController.php");


class RouteDisconnection extends Route
{

    private UserController $userController;

    public function __construct($userController)
    {
        $this->userController = $userController;
    }

    protected function get(array $params = []):void
    {
        $this->userController->disconnect();
    }

    protected function post(array $params = []):void
    {
    }
}
