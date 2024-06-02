<?php

require_once("Model/Managers/UserManager.php");
require_once("Views/View.php");


class UserController
{

    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function displayConnexion()
    {
        $view = new View("Login");
        $view->generate([]);
    }

    public function verifyConnexionAttempt(string $username, string $password):bool{
        return $this->userManager->verifyUserCredentials($username, $password);
    }
}
