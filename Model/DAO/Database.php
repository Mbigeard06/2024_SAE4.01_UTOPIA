<?php

class Database
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=localhost;dbname=klik_database",
            "root",
            "",
            array(
                PDO::ATTR_ERRMODE =>
                PDO::ERRMODE_EXCEPTION
            )
        );
    }

    public function executeNonQuery(string $request, array $params = []){
        $stmt = $this->db->prepare($request); 
        $stmt->execute($params);
    }

    public function executeQuery(string $request, array $params = []):array{
        $stmt = $this->db->prepare($request); 
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
