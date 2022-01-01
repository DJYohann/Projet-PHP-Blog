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
                case 'deconnect' :
                    $this->deconnect();
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
        if (isset($_POST['user_login']) && isset($_POST['user_mdp']))
        {
            $mdl = new ModeleAdmin();
            $mdl->connection($_POST['user_login'], $_POST['user_mdp']);
            $_REQUEST['action'] = NULL;
            new ControllerUtil();
        }
    }

    public function deconneect()
    {
        $mdl = new ModeleAdmin();
        $mdl->deconnection();
        $_REQUEST['action'] = NULL;
        new ControllerUtil();
    }

    public function ajouterNews()
    {
        $mdl = new Modele();
    }

    public function supprimerNews()
    {

    }
}