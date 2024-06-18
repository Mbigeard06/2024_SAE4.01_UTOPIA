<?php


require_once("Router/Route.php");
require_once("Controllers/UserController.php");


/**
 * Route qui gère les intéractions avec le système de connexion
 */
class RouteConnexion extends Route
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
        $this->userController->displayConnexion();
    }

    protected function post(array $params = []):void
    {
        $username = $params["mailuid"];
        $password = $params["pwd"];
        $captchaRep = $params['captcha'];
        try{
            $this->userController->verifyConnexionAttempt($username, $password,$captchaRep);
            $user = $this->userController->getUserByUsername($username);
            $_SESSION["connectedUser"] = $user;
            header("Location: index.php");exit;
        }
        catch(Exception $e){
            $this->userController->displayConnexion($e);
        }       
    }
}
