<?php
include ('modele/Modele.php');

class ControllerUtil
{

    public function __construct()
    {
        try {
            if (!isset($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];

            switch ($action)
            {
                case rechercher:
                    $this->rechercherNews();
                    break;

                case commentaire:
                    $this->ajoutCommentaire();
                    break;

                case NULL:
                    $this->afficherNews();
                    break;

                default:
                    $dVueEreur [] = "Erreur d'appel php";
                    require ("../views/erreur.php");
                    break;
            }
        }catch (PDOException $e){
            $dVueEreur [] = "Erreur exception";
            require("../views/erreur.php");
        }
    }

    public function ajoutCommentaire(){
        if(isset($_POST['pseudo']) && isset($_POST['message'])){

        }
        else $dVueEreur [] = "";
    }

    public function rechercherNews(){
        $mdl = new Modele();
        $TNews = $mdl->findByDate();
        require ("../views/blog.php");
    }

    public function afficherNews()
    {
        $mdl = new Modele();
        $TNews = $mdl->tmpAfficheNews();
        require ("../views/blog.php");
    }

}