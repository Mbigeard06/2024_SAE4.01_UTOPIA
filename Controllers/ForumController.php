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
            $category = $this->categoryController->getCategoryById($forum["topic_cat"]);
            $user = $this->userController->getUserById($forum["topic_by"]);
            $dataFormatted = [
                "id" => $forum["topic_id"],
                "subject" => $forum["topic_subject"],
                "date" => new DateTime($forum["topic_date"]),
                "category" => $category,
                "creator" => $user
            ];
            $forums[] = new Forum($dataFormatted);
        }
        return $forums;
    }
}
