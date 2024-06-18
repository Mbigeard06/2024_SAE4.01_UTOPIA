<?php

require_once("Model/Managers/BlogManager.php");
require_once("Model/Logic/Blog.php");

/**
 * Controller des blogs
 */
class BlogController
{
    private BlogManager $blogManager;
    private UserController $userController;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->blogManager = new BlogManager();
        $this->userController = new UserController();
    }

    /**
     * affiche la page de créatio de blog
     */
    public function displayCreateBlog(): void
    {
        $view = new View("createBlog");
        $view->generate(["title" => "Create a blog"]);
    }

    /**
     * Appelle le manager afin de récupérer tous les blogs en bdd
     * @return array la liste de tous les blogs en bdd
     */
    public function getAllBlogs(): array
    {
        $data = $this->blogManager->getAllBlogs();
        $blogs = [];
        foreach ($data as $blog) {
            $blog["date"] = new DateTime($blog["date"]);
            $blog["creator"] = $this->userController->getUserById($blog["creator"]);
            $blogs[] = new Blog($blog);
        }
        return $blogs;
    }
}
