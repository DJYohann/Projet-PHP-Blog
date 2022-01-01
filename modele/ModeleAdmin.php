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
     * @param string $login
     * @param string $mdp
     * @return mixed|null
     */
    public function connection(string $login, string $mdp)
    {
        global $con;
        $admin_gw = new AdminGateway($con);
        $users = $admin_gw->findByLogin($login);
        foreach ($users as $user)
        {
            if (password_verify($mdp, $user->getMdp()))
            {
                $_SESSION['login'] = $user->getLogin();
                $_SESSION['role'] =  'admin';
                return $user;
            }
        }
        return null;
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
        if (isset($_SESSION['login']) && isset($_SESSION['role']))
            return true;
        return false;
    }
}