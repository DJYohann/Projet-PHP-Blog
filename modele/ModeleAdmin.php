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
        $this->adminGw = new AdminGateway();
        $this->newsGw = new NewsGateway();
    }

    /**
     *
     */
    public function connection()
    {

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