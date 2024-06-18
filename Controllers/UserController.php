<?php

use Model\Exceptions\BadCaptchaResponse;
use Model\Exceptions\BadLoginOrPasswordException;

require_once("Model/Managers/UserManager.php");
require_once("Views/View.php");
require_once("Model/Logic/User.php");
require_once("Model/Logic/Captcha.php");
require_once("Model/exceptions/BadLoginOrPasswordException.php");
require_once("Model/exceptions/BadCaptchaResponse.php");

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
        $params = ["title" => "Authentification", "captcha" => new Captcha()];
        if (isset($e)) {
            $params["exception"] = $e->getMessage();
        }
        $view->generate($params);
    }

    /**
     * Affiche la page d'inscription
     */
    public function displaySignup(Exception $e = null)
    {
        $view = new View("Signup");
        $params = ["title" => "Sign Up"];
        if (isset($e)) {
            $params["exception"] = $e->getMessage();
        }
        $view->generate($params);
    }

    ///Verification de la connexion
    public function verifyConnexionAttempt(string $username, string $password, string $captchaRep): bool
    {
        //test des credentials
        $response = $this->userManager->verifyUserCredentials($username, $password);
        if (!$response) {
            throw new BadLoginOrPasswordException();
        }
        //Récupération du captcha
        $captcha = new Captcha();
        if ($captcha->validate($captchaRep)) {
        } else {
            throw new BadCaptchaResponse();
        }
        return $response;
    }

    public function getUserByUsername(string $username): User
    {
        $data = $this->userManager->getUserByUsername($username);
        $data = $data[0];
        $user = new User($data);
        return $user;
    }

    public function getUserById(int $id):User{

        $username = $this->userManager->getUsernameById($id);
        return $this->getUserByUsername($username[0]["username"]);
    }

    public function disconnect():void{
        session_unset();
        session_destroy();
        header("location: index.php");
    }

    public function signup(array $data):void{
        $this->userManager->signup($data);
    }
}
?>
