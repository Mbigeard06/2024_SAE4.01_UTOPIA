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
        $username = $params["mailuid"];
        $password = $params["pwd"];
        try{
            $this->userController->verifyConnexionAttempt($username, $password);
            $user = $this->userController->getUserByUsername($username);
            $_SESSION["connectedUser"] = $user;
            header("Location: index.php");exit;
        }
        catch(Exception $e){
            $this->userController->displayConnexion($e);
        }       
    }
}
