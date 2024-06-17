<?php

class RouteCreateBlog extends Route
{
    private BlogController $blogController;

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
