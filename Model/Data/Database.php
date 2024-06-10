<?php

require_once "IDatabase.php";

/**
 * Class Database
 *
 * Gère la connexion à la base de données et l'exécution de requêtes SQL.
 */
class Database implements IDatabase
{
    /**
     * @var PDO $db Instance de PDO pour la connexion à la base de données.
     */
    private PDO $db;

    /**
     * Constructeur de la classe Database.
     *
     * Initialise la connexion à la base de données en utilisant PDO.
     */
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=localhost;dbname=grp-502_s4_sae",
            "grp-502",
            "akKaxrUv",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
    }


    public function executeNonQuery(string $request, array $params = [])
    {
        $stmt = $this->db->prepare($request);
        $stmt->execute($params);
    }


    public function executeQuery(string $request, array $params = []): array
    {
        $stmt = $this->db->prepare($request);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
