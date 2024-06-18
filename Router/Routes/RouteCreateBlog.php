<?php

/**
 * Route qui gère la création de blog
 */
class RouteCreateBlog extends Route
{
    private BlogController $blogController;


    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->blogController = new BlogController();
    }

    protected function get(array $params = []): void
    {
        $this->blogController->displayCreateBlog();
    }

    protected function post(array $params = []): void
    {
    }
}
