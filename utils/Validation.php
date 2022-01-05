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

        if (($login != Nettoyage::nettoyerChaine($login)) || ($mdp != Nettoyage::nettoyerChaine($mdp)))
        {
            $dVueEreur[] =	"testative d'injection de code (attaque sécurité)";
            $login = "";
            $mdp = "";
        }
    }
}