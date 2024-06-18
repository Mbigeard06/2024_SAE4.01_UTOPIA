<?php

foreach (glob("Controllers/*.php") as $file) {
    require_once($file);
}

foreach (glob("Router/Routes/*.php") as $file) {
    require_once($file);
}

/**
 * Classe qui gère l'exécution des différentes routes
 */
class Router
{
    private array $routesList;
    private array $controllersList;

    /**
     * Constructeur de la classe, appel des méthodes qui répertoprient les différentes routes ainsi que leur controller associé
     */
    public function __construct()
    {
        $this->createControllersList();
        $this->createRoutesList();
    }

    private function createControllersList(): void
    {
        $this->controllersList["main"] = new MainController();
        $this->controllersList["user"] = new UserController();
        $this->controllersList["blog"] = new BlogController();
        $this->controllersList["forum"] = new ForumController();
        $this->controllersList["chat"] = new ChatController();
    }

    private function createRoutesList(): void
    {
        $this->routesList["index"] = new RouteIndex($this->controllersList["main"]);
        $this->routesList["connexion"] = new RouteConnexion($this->controllersList["user"]);
        $this->routesList["disconnection"] = new RouteDisconnection($this->controllersList["user"]);
        $this->routesList["signup"] = new RouteSignup($this->controllersList["user"]);
        $this->routesList["create-blog"] = new RouteCreateBlog($this->controllersList["blog"]);
        $this->routesList["create-forum"] = new RouteCreateForum($this->controllersList["forum"]);
        $this->routesList["chat"] = new RouteChat($this->controllersList["chat"]);
    }


    /**
     * Lance l'écoute des routes et réagit lorsqu'une route est exécutée
     * @param array $get correspond à la variable superglobale $_GET
     * @param array $post correspond à la variable superglobale $_POST
     */
    public function routing(array $get, array $post): void
    {
        session_start();
        if (empty($post)) {
            if (isset($get["action"])) {
                $this->routesList[$get["action"]]->action();
            } else {
                if (isset($_SESSION["connectedUser"])) {
                    $this->routesList["index"]->action();
                } else {
                    $this->routesList["connexion"]->action();
                }
            }
        } else {
            $this->routesList[$get["action"]]->action($post, 'POST');
        }
    }
}
