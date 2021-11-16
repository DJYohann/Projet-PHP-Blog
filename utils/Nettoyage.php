<?php

/**
 * Nettoie les éléments saisis
 */
class Nettoyage {
    public static function nettoyer($chaine){
        return filter_var($chaine,FILTER_SANITIZE_STRING);
    }
}