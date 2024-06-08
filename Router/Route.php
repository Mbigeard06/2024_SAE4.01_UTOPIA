<?php

abstract class Route{

    public function action(array $params = [], string $method = "GET"){
        if($method == "GET"){
            $this->get($params);
        }else if($method == "POST"){
            $this->post($params);
        }
    }

    protected abstract function get(array $params = []);
    protected abstract function post(array $params = []);
}