<?php

require_once("Model/Managers/BlogManager.php");
require_once("Model/Logic/Blog.php");

class BlogController
{
    private BlogManager $blogManager;
    private UserController $userController;

    public function __construct()
    {
        $this->blogManager = new BlogManager();
        $this->userController = new UserController();
    }

    public function displayCreateBlog()
    {
        $view = new View("createBlog");
        $view->generate(["title" => "Create a blog"]);
    }

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
