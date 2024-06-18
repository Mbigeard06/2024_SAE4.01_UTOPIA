<?php

use Model\Exceptions\PwdSpecialCharsException;
use Model\Exceptions\PwdTooShortException;
use Model\Exceptions\PwdUppercaseLetterException;
use Model\Exceptions\PwdWthNumberException;

require_once("Model/Data/IUserDAO.php");
require_once("Model/Data/UserDAO.php");
require_once("Model/Exceptions/PwdTooShortException.php");
require_once("Model/Exceptions/PwdUppercaseLetterException.php");
require_once("Model/Exceptions/PwdSpecialCharsException.php");
require_once("Model/Exceptions/PwdWthNumberException.php");


/**
 * Manager des utilisateurs
 */
class UserManager
{
    private IUserDAO $userDao;


    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->userDao = new UserDAO();
    }


    /**
     * Vérifie si les informations de connexion entrées par l'utilisateur sont correctes
     * @param string $username login entré par l'utilisateur
     * @param string $password mot de passe entré par l'utilisateur 
     * @return bool True si les inforùations de connexion sont justes et False sinon
     */
    public function verifyUserCredentials(string $username, string $password): bool
    {
        return $this->userDao->verifyUserCredentials($username, $password);
    }


    /**
     * Récupère un utilisateur en bdd en fonction de sont login
     * @param string $usernam login de l'utilisateur à récupérer
     * @return array la liste des données de l'utilisateur récupéré
     */
    public function getUserByUsername(string $username): array
    {
        return $this->userDao->getUserByUsername($username);
    }


    /**
     * Inscription d'un utilisateur sur l'application
     * @param array $data données de l'utilisateur à inscrire
     */
    public function signup(array $data): void
    {
        //Le mot de passe est valide
        if ($this->checkPassword($data[2])) {
            //Hashing du password
            $data[2] = password_hash($data[2], PASSWORD_DEFAULT);
            $this->userDao->createUser($data);
        }
    }

    /**
     * Vérifie que le mot de passe correspond aux critères de sécurité
     * @param string $pwd mot de passe entré
     * @return bool True si le mot de passe est conforme et False sinon
     */
    public function checkPassword(string $pwd): bool
    {
        //nombre de caractères inférieur à 12
        if (strlen($pwd) < 12) {
            throw new PwdTooShortException();
        }
        //ne contient pas de majuscule
        if (!preg_match('/[A-Z]/', $pwd)) {
            throw new PwdUppercaseLetterException();
        }
        //ne contient pas de caractères spéciaux
        if (!preg_match('/[\W_]/', $pwd)) {
            throw new PwdSpecialCharsException();
        }
        if (!preg_match('/\d/', $pwd)) {
            throw new PwdWthNumberException();
        }
        return true;
    }


    /**
     * Récupère un utilisateur en fonction de son id
     * @param int $id identifiant de l'utilisateur à récupérer
     * @return array la liste des données de l'utilisateur récupéré 
     */
    public function getUsernameById(int $id): array
    {
        return $this->userDao->getUsernameById($id);
    }
}
