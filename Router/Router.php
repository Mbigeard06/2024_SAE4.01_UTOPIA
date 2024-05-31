<?php
require_once("../Controllers/UserController.php");
foreach(glob("Routes/*.php") as $file){
    require_once($file);
}

class Router{
    private array $routesList;
    private array $controllersList; 

    public function __construct()
    {
        $this->createControllersList();
        $this->createRoutesList();
    }

    private function createControllersList():void{
        $this->controllersList["user"] = new UserController();
    }

    private function createRoutesList():void{
        $this->routesList["connexion"] = new RouteConnexion($this->controllersList["user"]);
    }

    public function routing($get, $post){
        if(empty($post)){
            if(isset($get["action"])){
                $this->routesList[$get["action"]]->action();
            }
            else{
                $this->routesList["connexion"]->action();
            }
        }
        else{
            $this->routesList[$get["action"]]->action($post, 'POST');
        }
    }
}