<?php

require_once("Model/Managers/ForumManager.php");
require_once("Model/Logic/Forum.php");

class ForumController
{
    private ForumManager $forumManager;
    private CategoryController $categoryController;
    private UserController $userController;

    public function __construct()
    {
        $this->forumManager = new ForumManager();
        $this->categoryController = new CategoryController();
        $this->userController = new UserController();
    }

    public function displayCreateForum(){
        $view = new View("CreateForum");
        $categories = $this->categoryController->getAllCategories();
        $view->generate(["title"=>"Create a forum", "categories"=>$categories]);
        
    }

    public function getAllForums(): array
    {
        $data = $this->forumManager->getAllForums();
        $forums = [];
        foreach ($data as $forum) {
            $category = $this->categoryController->getCategoryById($forum["category"]);
            $user = $this->userController->getUserById($forum["creator"]);
            $forum["idForum"] = $forum["idTopic"];
            $forum["category"] = $category;
            $forum["date"] = new DateTime($forum["date"]);
            $forum["creator"] = $user;
            /*$dataFormatted = [
                "id" => $forum["topic_id"],
                "subject" => $forum["topic_subject"],
                "date" => new DateTime($forum["topic_date"]),
                "category" => $category,
                "creator" => $user
            ];*/
            $forums[] = new Forum($forum);
        }
        return $forums;
    }

    public function createForum(array $data){
        $dataFormatted = [
            $data["topic-subject"],
            (new DateTime("now"))->format('Y-m-d H:i:s'),
            $data["topic-cat"],
            $_SESSION["connectedUser"]->getId()
        ];
        $this->forumManager->createForum($dataFormatted);
    }
}
