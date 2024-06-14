<?php

class RouteCreateForum extends Route{
    private ForumController $forumController;

    public function __construct()
    {
        $this->forumController = new ForumController();
    }

    protected function get(array $params=[]):void{
        $this->forumController->displayCreateForum();
    }


    protected function post(array $params=[]):void{

    }
}