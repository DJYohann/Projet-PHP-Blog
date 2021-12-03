<?php
include ('modele/Modele.php');

class ControllerUtil
{

    public function __construct()
    {
        try {
            $action = $_REQUEST['action'];

            switch ($action)
            {
                case NULL:
                    $this->action();
                    break;
            }
        }catch (PDOException $e){
            $dVueEreur [] = "Erreur exception";
            require("../views/erreur.php");
        }
    }

    public function action()
    {
        $mdl = new Modele();
        $TNews = $mdl->tmpAfficheNews();
        require ("../views/blog.php");
    }

}