<?php

/**
 * FrontController
 */
class FrontController
{

    public function __construct()
    {
        $liste_admin = array('connect', 'deconnect', 'insNews', 'delNews');
        $mdl = new ModeleAdmin();
        try {
            $admin = $mdl->isAdmin();

            if (!isset($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];

            if (in_array($action, $liste_admin))
            {
                if ($admin === null)
                {
                    $_REQUEST['ation'] = 'conn';
                    new ControllerUtil();
                }
                else
                    new ControllerAdmin();
            }
            else
                new ControllerUtil();
        }
        catch (Exception $e)
        {
            global $rep,$vues;
            $dVueEreur [] = "Erreur exception";
            require($rep.$vues['erreur']);
        }
    }
}