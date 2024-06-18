<?php

require_once("Model/Data/IForumDAO.php");
require_once("Model/Data/ForumDAO.php");


/**
 * Manager des forums
 */
class ForumManager
{
    private IForumDAO $forumDAO;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->forumDAO = new ForumDAO();
    }


    /**
     * Récupère tous les forums en bdd
     * @return array la liste des forums
     */
    public function getAllForums(): array
    {
        return $this->forumDAO->getAllForums();
    }


    /**
     * Ajoute un forum en bdd
     * @param array $data données des fourms à ajouter
     */
    public function createForum(array $data): void
    {
        $this->forumDAO->createForum($data);
    }
}
