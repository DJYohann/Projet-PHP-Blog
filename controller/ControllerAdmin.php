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
            }
        }
        catch (PDOException $e)
        {

        }
    }

    public function connect()
    {
        if (isset($_POST['login']) && isset($_POST['mdp']))
        {
            $mdl = new ModeleAdmin();
            $mdl->connection($_POST['login'], $_POST['mdp']);

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