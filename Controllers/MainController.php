<?php

require_once("Views/View.php");

class MainController
{
    private ForumController $forumController;

    public function __construct()
    {
        $this->forumController = new ForumController();
    }

    public function displayIndex()
    {
        $forums = $this->forumController->getAllForums();
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
            "forums" => $forums
        ]);
    }
}
