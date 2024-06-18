<?php

/**
 * Représente l'accès aux données des forums
 */
interface IForumDAO
{
    /**
     * Récupère tous les forums en bdd
     * @return array liste avec les données de tous les forums
     */
    public function getAllForums(): array;

    /**
     * Récupère un forum en fonction de son id
     * @param int $id identifiant du forum à récupérer 
     * @return array liste des données du forum récupéré
     */
    public function getForumById(int $id): array;


    /**
     * Ajoute un forum en bdd
     * @param array $data données du forum à créer
     */
    public function createForum(array $data): void;
}
