<?php

require_once("Model/Data/IForumDAO.php");
require_once("Model/Data/ForumDAO.php");

class ForumManager{
    private IForumDAO $forumDAO;

    public function __construct(){
        $this->forumDAO = new ForumDAO();
    }

    public function getAllForums():array{
        return $this->forumDAO->getAllForums();
    }
}