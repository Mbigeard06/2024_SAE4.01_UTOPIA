<?php

use Model\Exceptions\BadCaptchaResponse;
use Model\Exceptions\BadLoginOrPasswordException;


require_once("Model/Managers/UserManager.php");
require_once("Views/View.php");
require_once("Model/Logic/User.php");
require_once("Model/Logic/Captcha.php");
require_once("Model/exceptions/BadLoginOrPasswordException.php");
require_once("Model/exceptions/BadCaptchaResponse.php");


/**
 * Controller des utilisateurs
 */
class UserController
{
    private UserManager $userManager;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    /**
     * Affiche la page de connexion 
     * @param Exception $e Erreur à afficher (exemple :  Login ou mot de passe incorrect)
     */
    public function displayConnexion(Exception $e = null): void
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
     * @param Exception $e Erreur à afficher (exemple :  Mot de passe trop court)
     */
    public function displaySignup(Exception $e = null): void
    {
        $view = new View("Signup");
        $params = ["title" => "Sign Up"];
        if (isset($e)) {
            $params["exception"] = $e->getMessage();
        }
        $view->generate($params);
    }

    /**
     * Vérification de la tentative de connexion
     * @param string $username login entré par l'utilisateur 
     * @param string $password mot de passe entré par l'utilisateur
     * @param string $captchaRep réponse de l'utilisateur au captcha
     * @return bool True si toutes informations sont corretes False sinon
     */
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

    /**
     * Récupère un utilisateur en bdd en fonction de son login
     * @param string $username login de l'utilisateur à récupérer
     * @return User utilisateur récupéré 
     */
    public function getUserByUsername(string $username): User
    {
        $data = $this->userManager->getUserByUsername($username);
        $data = $data[0];
        $user = new User($data);
        return $user;
    }

    /**
     * Récupère un utilisateur en bdd en fonction de son id
     * @param int $id identifiant de l'utilisateur à récupérer
     * @return User utilisateur récupéré
     */
    public function getUserById(int $id): User
    {

        $username = $this->userManager->getUsernameById($id);
        return $this->getUserByUsername($username[0]["username"]);
    }

    /**
     * Déconnecte l'utilisateur 
     */
    public function disconnect(): void
    {
        session_unset();
        session_destroy();
        header("location: index.php");
    }

    /**
     * Inscrit un utilisateur sur l'application
     * @param array $data données de l'inscription
     */
    public function signup(array $data): void
    {
        $this->userManager->signup($data);
    }
}
