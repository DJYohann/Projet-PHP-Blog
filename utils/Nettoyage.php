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
}