<?php

/**
 * FrontController
 */
class FrontController
{

    /**
     *
     */
    public function __construct()
    {
        $mdl = new ModeleAdmin();
        $liste_admin = array('connect', 'deconnect', 'insNews', 'delNews');

        try
        {
            $admin = $mdl->isAdmin();

            if (!isset($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];

            if (in_array($action, $liste_admin))
            {
                if ($admin && $action == 'connect')
                {
                    new ControllerAdmin();
                }
                else
                    global $rep, $vues;
                    require($rep.$vues['connect']);
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