<?php

require_once("Views/View.php");

/**
 * Controller principal de l'application
 */
class MainController
{
    private ForumController $forumController;
    private BlogController $blogController;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->forumController = new ForumController();
        $this->blogController = new BlogController();
    }

    /**
     * Récupère les données nécessaires et affiche la page d'index 
     */
    public function displayIndex(): void
    {
        $forums = $this->forumController->getAllForums();
        $blogs = $this->blogController->getAllBlogs();
        $view = new View("Index");
        $connectedUser = $_SESSION["connectedUser"];
        $badge = "";
        if ($connectedUser->getLevel() == 1) {
            $badge = '<img id="card-admin-badge" src="img/admin-badge.png" alt=" ">';
        }
        $view->generate([
            "title" => "Dashboard | KLiK",
            "profilePicture" => $connectedUser->getProfilePicture(),
            "badge" => $badge,
            "username" => ucwords($connectedUser->getUsername()),
            "name" => ucwords($connectedUser->getFirstName() . " " . $connectedUser->getLastName()),
            "headline" => $connectedUser->getHeadline(),
            "forums" => $forums,
            "blogs" => $blogs
        ]);
    }
}
