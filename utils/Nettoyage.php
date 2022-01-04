<?php

/**
 * Nettoyage des données
 */
class Nettoyage
{
    /**
     * @param string $chaine chaîne à filtrer
     * @return string chaîne filtré
     */
    static function nettoyerChaine(string $chaine) : string
    {
        return filter_var($chaine, FILTER_SANITIZE_STRING);
    }

    /**
     * @param int $entier entier à filtrer
     * @return int entier filtré
     */
    static function nettoyerInt(int $entier) : int
    {
        return filter_var($entier,FILTER_SANITIZE_NUMBER_INT);
    }
}