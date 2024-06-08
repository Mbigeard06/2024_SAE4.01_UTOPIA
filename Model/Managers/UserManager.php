<?php
require_once("Model/Data/IUserDAO.php");
require_once("Model/Data/UserDAO.php");

class UserManager{
    private IUserDAO $userDao;

    public function __construct(){
        $this->userDao = new UserDAO();
    }

    public function verifyUserCredentials(string $username, string $password):bool{
        return $this->userDao->verifyUserCredentials($username, $password);
    }

    public function getUserByUsername(string $username):array{
        return $this->userDao->getUserByUsername($username);
    }
}