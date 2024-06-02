<?php

require_once("Views/View.php");

class MainController{
    public function displayIndex(){
        $view = new View("Index");
        $view->generate([]);
    }
}