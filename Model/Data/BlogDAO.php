<?php

require_once("Model/Data/IBlogDAO.php");
require_once("Model/Data/Database.php");


/**
 * Gère l'accès aux données des blogs
 */
class BlogDAO implements IBlogDAO{

    private IDatabase $db;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBlogs():array{
        $sql = "select * from blogs order by date desc limit 6;";
        return $this->db->executeQuery($sql);
    }
}