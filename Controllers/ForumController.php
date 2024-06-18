<?php

require_once("Model/Managers/ForumManager.php");
require_once("Model/Logic/Forum.php");

/**
 * Controller des forums
 */
class ForumController
{
    private ForumManager $forumManager;
    private CategoryController $categoryController;
    private UserController $userController;

    /**
     * Constructur de la classe
     */
    public function __construct()
    {
        $this->forumManager = new ForumManager();
        $this->categoryController = new CategoryController();
        $this->userController = new UserController();
    }

    /**
     * Affiche la page de création de forum
     */
    public function displayCreateForum(): void
    {
        $view = new View("CreateForum");
        $categories = $this->categoryController->getAllCategories();
        $view->generate(["title" => "Create a forum", "categories" => $categories]);
    }

    /**
     * Récupère tous les forums en bdd
     * @return array la liste de tous les forums en bdd
     */
    public function getAllForums(): array
    {
        $data = $this->forumManager->getAllForums();
        $forums = [];
        foreach ($data as $forum) {
            $category = $this->categoryController->getCategoryById($forum["category"]);
            $creator = $this->userController->getUserById($forum["creator"]);
            $forum["category"] = $category;
            $forum["date"] = new DateTime($forum["date"]);
            $forum["creator"] = $creator;
            $forums[] = new Forum($forum);
        }
        return $forums;
    }

    /**
     * Ajoute un forum en bdd
     * @param array $data liste des données nécessaires à la création du forum
     */
    public function createForum(array $data): void
    {
        $dataFormatted = [
            $data["topic-subject"],
            (new DateTime("now"))->format('Y-m-d H:i:s'),
            $data["topic-cat"],
            $_SESSION["connectedUser"]->getIdUser()
        ];
        $this->forumManager->createForum($dataFormatted);
    }
}
