<?php

require_once "IDatabase.php";

/**
 * Class Database
 *
 * Gère la connexion à la base de données et l'exécution de requêtes SQL.
 */
class Database implements IDatabase
{

    private PDO $db;

    /**
     * Constructeur de la classe Database, initialise la connexion à la base de données en utilisant PDO
     */
    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=localhost;dbname=klik_database",
            "root",
            "",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
    }



    public function executeNonQuery(string $request, array $params = []): void
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
