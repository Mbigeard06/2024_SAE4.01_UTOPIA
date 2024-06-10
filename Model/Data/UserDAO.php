<?php
require_once 'Database.php'; 
require_once "IUserDAO.php";

/**
 * Représente un objet d'accès aux données (DAO) pour les utilisateurs.
 */
class UserDAO implements IUserDAO {
    private IDatabase $db;

    public function __construct() {
        $this->db = new Database();
    }

    /**
     * Récupère un utilisateur à partir de son nom d'utilisateur.
     *
     * @param string $username Le nom d'utilisateur de l'utilisateur à récupérer.
     * @return array|null Les données de l'utilisateur ou null si l'utilisateur n'existe pas.
     */
    public function getUserByUsername(string $username):array {
        $sql = "SELECT * FROM users WHERE uidUsers = ?";
        return $this->db->executeQuery($sql, array($username));
    }

    public function getUsernameById(int $id):array{
        $sql = "select uidUsers from users where idUsers=?;";
        return $this->db->executeQuery($sql, array($id));
    }

    /**
     * Crée un nouvel utilisateur dans la base de données.
     *
     * @param array $userData Les données de l'utilisateur à créer.
     * @return void
     */
    public function createUser(string $userData) {
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, f_name, l_name, gender, headline, bio, userImg) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->executeNonQuery($sql, $userData);
    }

    /**
     * Vérifie les informations d'identification d'un utilisateur.
     *
     * @param string $username Le nom d'utilisateur de l'utilisateur à vérifier.
     * @param string $password Le mot de passe de l'utilisateur à vérifier.
     * @return bool True si les informations d'identification sont valides, sinon False.
     */
    public function verifyUserCredentials(string $username, string $password){
        $result = false;
        $user = $this->getUserByUsername($username);
        if (!empty($user)) {
            $user = $user[0];
            $result = password_verify($password, $user['pwdUsers']);
        }
        return $result;
    }
}
