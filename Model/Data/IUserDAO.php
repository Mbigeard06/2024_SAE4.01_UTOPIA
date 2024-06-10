<?php
/**
 * Définit les méthodes nécessaires pour interagir avec les données des utilisateurs.
 */
interface IUserDAO {
    /**
     * Récupère un utilisateur en fonction de son nom d'utilisateur.
     *
     * @param string $username Le nom d'utilisateur de l'utilisateur à récupérer.
     * @return mixed L'utilisateur correspondant au nom d'utilisateur spécifié.
     */
    public function getUserByUsername(string $username);

    public function getUsernameById(int $id):array;

    /**
     * Crée un nouvel utilisateur.
     *
     * @param array $userData Les données de l'utilisateur à créer.
     * @return bool True si l'utilisateur a été créé avec succès, sinon false.
     */
    public function createUser(string $userData);

    /**
     * Vérifie les informations d'identification d'un utilisateur.
     *
     * @param string $username Le nom d'utilisateur de l'utilisateur à vérifier.
     * @param string $password Le mot de passe de l'utilisateur à vérifier.
     * @return bool True si les informations d'identification sont valides, sinon false.
     */
    public function verifyUserCredentials(string $username, string $password);
}
