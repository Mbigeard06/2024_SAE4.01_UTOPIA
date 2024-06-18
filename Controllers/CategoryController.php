<?php

require_once("Model/Managers/CategoryManager.php");
require_once("Model/Logic/Category.php");

/**
 * Controller des catégories
 */
class CategoryController
{
    private CategoryManager $categoryManager;


    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->categoryManager = new CategoryManager();
    }

    /**
     * Récupère une catégorie en bdd en fonction de son id
     * @param int $id identifiant de la catégorie à récupérer
     * @return Category la catégorie récupérée
     */
    public function getCategoryById(int $id): Category
    {
        $category = new Category($this->categoryManager->getCategoryById($id));
        return $category;
    }


    /**
     * Récupère toutes les catégories en bdd
     * @return array la liste de toutes les catégories en bdd
     */
    public function getAllCategories(): array
    {
        $data = $this->categoryManager->getAllCategories();
        $categories = [];
        foreach ($data as $category) {
            $categories[] = new Category($category);
        }
        return $categories;
    }
}
