<?php

/**
 * Représente l'accès aux données des catégories
 */
interface ICategoryDAO
{
    /**
     * Récupère une catégorie en fonction de son id
     * @param int $id identifiant de la catégorie à récupérer
     * @return array la liste des données de la catégorie récupéré
     */
    public function getCategoryById(int $id): array;

    /**
     * Récupère toutes les catégories en bdd
     * @return array la liste de toutes les catégories en bdd
     */
    public function getAllCategories():array;
}
