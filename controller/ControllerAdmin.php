<?php

/**
 * Contrôleur de l'administrateur
 */
class ControllerAdmin
{
    /**
     *
     */
    public function __construct()
    {
        try
        {
            if (!isset($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];
            switch ($action)
            {
                case 'connect' :
                    $this->connect();
                    break;
                default:
                    global $rep,$vues;
                    $dVueEreur [] = "Erreur d'appel php";
                    require($rep.$vues['erreur']);
                    break;
            }
        }
        catch (PDOException $e)
        {
            global $rep,$vues;
            $dVueEreur [] = "Erreur exception";
            require($rep.$vues['erreur']);
        }
    }

    public function connect()
    {
        global $rep,$vues;
        if (isset($_POST['user_login']) && isset($_POST['user_mdp']))
        {
            var_dump($_POST['user_login']);
            var_dump($_POST['user_mdp']);
            $mdl = new ModeleAdmin();
            $mdl->connection($_POST['user_login'], $_POST['user_mdp']);
            require($rep.$vues['blog']);
        }
    }

    public function ajouterNews()
    {
        $mdl = new Modele();
    }

    public function supprimerNews()
    {

    }
}