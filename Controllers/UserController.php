<?php

require_once("Model/Managers/UserManager.php");
require_once("Views/View.php");
require_once("Model/Logic/User.php");


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
        $view->generate(["title" => "Authentification"]);
    }

    public function verifyConnexionAttempt(string $username, string $password): bool
    {
        return $this->userManager->verifyUserCredentials($username, $password);
    }

    public function getUserByUsername(string $username): User
    {
        $data = $this->userManager->getUserByUsername($username);
        $data = $data[0];
        $formattedData = [
            "id" => $data["idUsers"],
            "username" => $data["uidUsers"],
            "email" => $data["emailUsers"],
            "password" => $data["pwdUsers"],
            "firstName" => $data["f_name"],
            "lastName" => $data["l_name"],
            "level" => $data["userLevel"],
            "headline" => $data["headline"],
            "profilePicture"=>$data["userImg"]
        ];
        $user  = new User($formattedData);
        return $user;
    }
}
