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

    protected function get(array $params = []):void
    {
        $this->userController->displaySignup();
    }

    protected function post(array $params = []):void
    {
        try{
            $data = [
                preg_replace('/[^a-zA-Z0-9_-]/', '', $params['uid']),
                strip_tags($params['mail']),
                strip_tags($params["pwd"]),
                preg_replace('/[^a-zA-ZÀ-ÖØ-öø-ÿ\s-]/u', '', $params['f-name']),
                preg_replace('/[^a-zA-ZÀ-ÖØ-öø-ÿ\s-]/u', '', $params['l-name']),
                strip_tags($params['gender']),
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
