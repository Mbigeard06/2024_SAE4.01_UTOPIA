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
        try{
            $data = [
                $params["uid"],
                $params["mail"],
                $params["pwd"],
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
        catch (Exception $e) {
            $this->userController->displaySignup($e);
        }
    }
}
