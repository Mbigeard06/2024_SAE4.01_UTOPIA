<?php 

require_once("Model/Managers/CategoryManager.php");
require_once("Model/Logic/Category.php");


class CategoryController{
    private CategoryManager $categoryManager;


    public function __construct(){
        $this->categoryManager = new CategoryManager();
    }

    public function getCategoryById(int $id):Category{
        $category = new Category($this->categoryManager->getCategoryById($id));
        return $category;
    }
}