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
            $dataFormatted = [
                "id" => $blog["blog_id"],
                "title" => $blog["blog_title"],
                "image" => $blog["blog_img"],
                "creator" => $this->userController->getUserById($blog["blog_by"]),
                "date" => new DateTime($blog["blog_date"]),
                "votes" => $blog["blog_votes"],
                "content" => $blog["blog_content"]
            ];
            $blogs[] = new Blog($dataFormatted);
        }
        return $blogs;
    }
}
