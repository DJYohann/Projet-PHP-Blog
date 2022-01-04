<?php

/**
 * Controlleur permettant de sélectionner le bon controlleur selon l'action
 */
class FrontController
{

    public function __construct()
    {
        global $rep, $vues;

        if(!isset($_SESSION))
        {
            session_start();
        }

        $mdl = new ModeleAdmin();
        $liste_admin = array('connect', 'deconnect', 'add-news', 'del-news');

        try
        {
            $admin = $mdl->isAdmin();

            if (!isset($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];

            if (in_array($action, $liste_admin))
            {
                new ControllerAdmin();
            }
            else
                new ControllerUtil();
        }
        catch (Exception $e)
        {
            $dVueEreur [] = "Erreur exception";
            require($rep.$vues['erreur']);
        }
    }
}