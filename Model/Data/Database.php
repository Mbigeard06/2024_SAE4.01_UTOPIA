<?php

/**
 * Class Database
 *
 * Gère la connexion à la base de données et l'exécution de requêtes SQL.
 */
class Database
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
            "mysql:host=localhost;dbname=klik_database",
            "root",
            "",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
    }

    /**
     * Exécute une requête SQL sans retour de résultat (INSERT, UPDATE, DELETE).
     *
     * @param string $request La requête SQL à exécuter.
     * @param array $params Les paramètres pour la requête SQL.
     */
    public function executeNonQuery(string $request, array $params = [])
    {
        $stmt = $this->db->prepare($request);
        $stmt->execute($params);
    }

    /**
     * Exécute une requête SQL et retourne le résultat sous forme de tableau associatif.
     *
     * @param string $request La requête SQL à exécuter.
     * @param array $params Les paramètres pour la requête SQL.
     * @return array Le résultat de la requête sous forme de tableau associatif.
     */
    public function executeQuery(string $request, array $params = []): array
    {
        $stmt = $this->db->prepare($request);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
