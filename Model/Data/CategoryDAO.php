<?php

require_once("Model/Data/ICategoryDAO.php");

class CategoryDAO implements ICategoryDAO
{

    private IDatabase $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function getCategoryById(int $id): array
    {
        $sql = "select * from categories where idCategory=?;";
        return $this->db->executeQuery($sql, array($id));
    }

    public function getAllCategories():array{
        $sql = "select * from categories;";
        return $this->db->executeQuery($sql);
    }
}
