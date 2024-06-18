<?php
require_once 'Database.php';
require_once "IUserDAO.php";


/**
 * Représente un objet d'accès aux données (DAO) pour les utilisateurs.
 */
class UserDAO implements IUserDAO
{
    private IDatabase $db;

    /** 
     * Constructeur de la classe 
     */
    public function __construct()
    {
        $this->db = new Database();
    }


    public function getUserByUsername(string $username): array
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        return $this->db->executeQuery($sql, array($username));
    }

    public function getUsernameById(int $id): array
    {
        $sql = "select username from users where idUser=?;";
        return $this->db->executeQuery($sql, array($id));
    }



    public function createUser(array $userData): void
    {
        $sql = "INSERT INTO users (username, email, password, firstName, lastName, gender, headline, bio, profilePicture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->executeNonQuery($sql, $userData);
    }


    public function verifyUserCredentials(string $username, string $password): bool
    {
        $result = false;
        $user = $this->getUserByUsername($username);
        if (!empty($user)) {
            $user = $user[0];
            $result = password_verify($password, $user['password']);
        }
        return $result;
    }
}
