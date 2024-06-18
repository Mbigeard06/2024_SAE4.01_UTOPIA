<?php

/**
 * Route qui gère la création de forum
 */
class RouteCreateForum extends Route
{
    private ForumController $forumController;


    /**
     * Constructeur de la classe 
     */
    public function __construct()
    {
        $this->forumController = new ForumController();
    }

    protected function get(array $params = []): void
    {
        $this->forumController->displayCreateForum();
    }


    protected function post(array $params = []): void
    {
        $this->forumController->createForum($params);
        header("Location: index.php");
        exit;
    }
}
