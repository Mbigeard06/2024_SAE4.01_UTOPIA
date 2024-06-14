<?php

require_once("Model/Data/CategoryDAO.php");

class CategoryManager{
    private ICategoryDAO $categoryDAO;

    public function __construct()
    {
        $this->categoryDAO = new CategoryDAO();
    }

    public function getCategoryById(int $id):array{
        return $this->categoryDAO->getCategoryById($id);
    }

    public function getAllCategories():array{
        return $this->categoryDAO->getAllCategories();
    }
}