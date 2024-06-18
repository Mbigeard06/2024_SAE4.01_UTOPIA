<?php

require_once("Views/View.php");

/**
 * Controller des chats
 */
class ChatController
{

    /**
     * Affiche la page de chat 
     */
    public function displayChat(): void
    {
        $view = new View("Chat");
        $view->generate(["title" => "Chat"]);
    }
}
