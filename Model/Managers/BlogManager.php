<?php
require_once("Model/Data/IBlogDAO.php");
require_once("Model/Data/BlogDAO.php");

class BlogManager{
    private IBlogDAO $blogDAO;

    public function __construct()
    {
        $this->blogDAO = new BlogDAO();
    }

    public function getAllBlogs():array{
        return $this->blogDAO->getAllBlogs();
    }
}