<?php

/**
 * Représente une entité qui gère l'accès à la base de données ainsi que l'envoi de requête
 */
interface IDatabase
{
    /**
     * Exécute une requête SQL sans retour de résultat (INSERT, UPDATE, DELETE).
     *
     * @param string $request La requête SQL à exécuter.
     * @param array $params Les paramètres pour la requête SQL.
     */
    public function executeNonQuery(string $request, array $params = []):void;


    /**
     * Exécute une requête SQL et retourne le résultat sous forme de tableau associatif.
     *
     * @param string $request La requête SQL à exécuter.
     * @param array $params Les paramètres pour la requête SQL.
     * @return array Le résultat de la requête sous forme de tableau associatif.
     */
    public function executeQuery(string $request, array $params = []): array;
}
