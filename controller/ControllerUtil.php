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

    public function rechercherNews(){
        $mdl = new Modele();
        $TNews = $mdl->findByDate();
        require ("../views/blog.php");
    }

    public function ajoutCommentaire(){
        if(isset($_GET['id']) && isset($_POST['pseudo']) && isset($_POST['message'])){
            $id = Nettoyage::nettoyerChaine($_GET['id']);
            $pseudo = Nettoyage::nettoyerChaine($_POST['pseudo']);
            $message = Nettoyage::nettoyerChaine($_POST['message']);
            $mdl = new Modele();
            $mdl->insertComment($id, new Comment($pseudo,$message));
            $this->afficherNews();
        }
        else{
            $dVueEreur [] = "veuillez renseigner le pseudo ou le message"; //utilisateur malveillant qui ne passe pas par le formulaire
            require("../views/erreur.php");
        }

    }

    public function afficherNews()
    {
        $mdl = new Modele();
        $nbMesBlog = $mdl->nbComments();
        $TNews = $mdl->tmpAfficheNews();
        require ("../views/blog.php");
    }

}