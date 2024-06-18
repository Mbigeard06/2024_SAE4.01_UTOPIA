<?php

/**
 * Classe abstraite qui représente le système de route
 */
abstract class Route
{

    /**
     * Effectue l'action associée à la route en fonction de la méthode utilisée
     * @param array $params paramètres nécessaires à la réalisation de l'action
     * @param string $method méthode utilisée
     */
    public function action(array $params = [], string $method = "GET"): void
    {
        if ($method == "GET") {
            $this->get($params);
        } else if ($method == "POST") {
            $this->post($params);
        }
    }


    /**
     * Effectue l'action de la route associée à la méthode GET
     * @param array $params paramètres nécessaires à la réalisation de l'action
     */
    protected abstract function get(array $params = []): void;

    /**
     * Effectue l'action de la route associée à la méthode POST
     * @param array $params paramètres nécessaires à la réalisation de l'action
     */
    protected abstract function post(array $params = []): void;
}
