<?php

/**
 *
 */
class Nettoyage
{
    static function nettoyerChaine(string $chaine) : string
    {
        return filter_var($chaine, FILTER_SANITIZE_STRING);
    }

    static function nettoyerInt(int $entier) : int
    {
        return filter_var($entier,FILTER_SANITIZE_NUMBER_INT);
    }
}