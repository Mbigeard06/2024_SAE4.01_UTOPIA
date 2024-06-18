<?php

/**
 * interface qui représente l'accès aux donnes des blogs
 */
interface IBlogDAO
{

    /**
     * Récupère tous les blogs en bdd
     * @return array la liste de tous les blogs en bdd
     */
    public function getAllBlogs(): array;
}
