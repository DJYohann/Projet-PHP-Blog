<?php

/**
 * Valide les saisies
 */
class Validation {

    static function val_action($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_Connection(string $login, string $mdp, $dVueErreur) {

        if(!isset($login) || $login=""){
            $dVueEreur[] = "Aucun login n'a été renseigné";
            $login = "";
        }

        if(!isset($mdp) || $mdp=""){
            $dVueEreur[] = "Aucun mot de passe n'a été renseigné";
            $mdp = "";
        }

        if (($login != filter_var($login, FILTER_SANITIZE_STRING)) || ($mdp != filter_var($mdp, FILTER_SANITIZE_STRING)))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $login = "";
            $mdp = "";

        }
    }
}