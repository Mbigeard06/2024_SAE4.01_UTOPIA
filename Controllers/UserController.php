<?php

use Model\Exceptions\BadLoginOrPasswordException;

require_once("Model/Managers/UserManager.php");
require_once("Views/View.php");
require_once("Model/Logic/User.php");
require_once("Model/Exceptions/BadLoginOrPasswordException.php");


class UserController
{

    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function displayConnexion(Exception $e = null)
    {
        $view = new View("Login");
        if(isset($e)){
            $view->generate(["title" => "Authentification", "exception" => $e->getMessage()]);
        }
        else{
            $view->generate(["title" => "Authentification"]);
        }
        
    }

    public function verifyConnexionAttempt(string $username, string $password): bool
    {
        $response = $this->userManager->verifyUserCredentials($username, $password);
        if(!$response){
            throw new BadLoginOrPasswordException();
        }
        return $response;
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
            "profilePicture" => $data["userImg"]
        ];
        $user  = new User($formattedData);
        return $user;
    }

    public function disconnect():void{
        session_unset();
        session_destroy();
        header("location: index.php");
    }
}
