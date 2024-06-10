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
        $sql = "select * from categories where cat_id=?;";
        return $this->db->executeQuery($sql, array($id));
    }
}
