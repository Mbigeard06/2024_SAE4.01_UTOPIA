<?php
require_once("./Router/Router.php");

$router = new Router();
$router->routing($_GET,$_POST);
