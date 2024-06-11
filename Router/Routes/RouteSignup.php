<?php


require_once("Router/Route.php");
require_once("Controllers/UserController.php");


class RouteSignup extends Route
{

    private UserController $userController;

    public function __construct($userController)
    {
        $this->userController = $userController;
    }

    protected function get(array $params = [])
    {
        $this->userController->displaySignup();
    }

    protected function post(array $params = [])
    {
        $data = [
            $params["uid"],
            $params["mail"],
            password_hash($params["pwd"], PASSWORD_DEFAULT),
            $params["f-name"],
            $params["l-name"],
            $params["gender"],
            "",
            "",
            "default.png"
        ];
        $this->userController->signup($data);
        header("location: index.php");
    }
}
