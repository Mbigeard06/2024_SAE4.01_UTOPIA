<?php

require_once("Model/Data/CategoryDAO.php");

/**
 * Manager des catégories
 */
class CategoryManager
{
    private ICategoryDAO $categoryDAO;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->categoryDAO = new CategoryDAO();
    }


    /**
     * Récupère une catégorie en fonction d'un id
     * @param int $id identifiant de la catégorie à récupérer
     * @return array la liste des données de la catégorie
     */
    public function getCategoryById(int $id): array
    {
        return $this->categoryDAO->getCategoryById($id);
    }


    /**
     * Récupère toutes les catégories en bdd
     * @return array la liste de toutes les catégories en bdd
     */
    public function getAllCategories(): array
    {
        return $this->categoryDAO->getAllCategories();
    }
}
