<?php

/**
 * Modele de l'administrateur
 */
class ModeleAdmin
{
    private $adminGw;
    private $newsGw;

    /**
     *
     */
    public function __construct()
    {
        global $con;
        $this->adminGw = new AdminGateway($con);
        $this->newsGw = new NewsGateway($con);
    }

    /**
     *
     */
    public function connection(string $login, string $mdp)
    {
        $login = Nettoyage::nettoyerChaine($login);
        $mdp = Nettoyage::nettoyerChaine($mdp);

        $_SESSION['role'] = 'admin';
    }

    /**
     *
     */
    public function deconnection()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    /**
     *
     */
    public function isAdmin()
    {
        if (isset($_SESSION['login']))
        {
            $login = Nettoyage::nettoyerChaine($_SESSION['login']);
            return new Admin($login);
        }
        else return null;
    }
}