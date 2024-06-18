<?php
require_once("Model/Data/IBlogDAO.php");
require_once("Model/Data/BlogDAO.php");

/**
 * Manager des blogs
 */
class BlogManager
{
    private IBlogDAO $blogDAO;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->blogDAO = new BlogDAO();
    }

    /**
     * Récupère tous les blogs en bdd
     * @return array la liste de tous les blogs
     */
    public function getAllBlogs(): array
    {
        return $this->blogDAO->getAllBlogs();
    }
}
