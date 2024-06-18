<?php


require_once("Router/Route.php");
require_once("Controllers/UserController.php");

/**
 * Route qui gère les intéractions avec le processus de déconnexion
 */
class RouteDisconnection extends Route
{

    private UserController $userController;


    /**
     * Constructeur de la classe
     */
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
