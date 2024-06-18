<?php

require_once("Router/Route.php");
require_once("Controllers/MainController.php");


/**
 * Route qui gère les intéractions avec la page index de l'application
 */
class RouteIndex extends Route{


    private MainController $mainController;


    /**
     * Constructeur de la classe
     */
    public function __construct(MainController $mainController)
    {
        $this->mainController = $mainController;
    }


    protected function get(array $params=[]):void{
        $this->mainController->displayIndex();
    }

    protected function post(array $params = []):void{
    }
}