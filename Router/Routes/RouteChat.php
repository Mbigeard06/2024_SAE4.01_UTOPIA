<?php

require_once("Router/Route.php");
require_once("Controllers/ChatController.php");

/**
 * Route qui gère les intéractions avec le chat
 */
class RouteChat extends Route{

    private ChatController $chatController;

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        $this->chatController = new ChatController();
    }


    protected function get(array $params=[]):void{
        $this->chatController->displayChat();
    }

    protected function post(array $params=[]):void{
        
    }
}