<?php

/**
 *
 */
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
                case 'rechercher':
                    $this->rechercherNews();
                    break;

                case 'commentaire':
                    $this->ajoutCommentaire();
                    break;

                case 'contentNews':
                    $this->afficherUneNews();
                    break;

                case NULL:
                    $this->afficherNews();
                    break;

                default:
                    global $rep,$vues;
                    $dVueEreur [] = "Erreur d'appel php";
                    require($rep.$vues['erreur']);
                    break;
            }
        }catch (PDOException $e){
            global $rep,$vues;
            $dVueEreur [] = "Erreur exception";
            require($rep.$vues['erreur']);
        }
    }

    public function rechercherNews(){
        global $rep,$vues;
        $mdl = new Modele();
        $TNews = $mdl->findByDate();
        require ($rep.$vues['blog']);
    }

    public function ajoutCommentaire(){
        global $rep,$vues;
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
            require($rep.$vues['erreur']);
        }

    }

    public function afficherNews()
    {
        global $rep,$vues;
        if(isset($_GET['page'])){
            $page = Nettoyage::nettoyerChaine($_GET['page']);
        }
        else{
            $page = 1;
        }
        $mdl = new Modele();
        $nbMesBlog = $mdl->nbComments();
        $nbNews = $mdl->getNbNews();
        $TNews = $mdl->findByPage($page,$nbNews);
        require($rep.$vues['blog']);
    }

    public function afficherUneNews()
    {
        global $rep,$vues;
        if (isset($_GET['id'])){
            $id = Nettoyage::nettoyerChaine($_GET['id']);
            $mdl = new Modele();
            $news = $mdl->findByNews($id);
            echo gettype($news);
        }
        else{
            $dVueEreur [] = "Aucune news sélectionée"; //utilisateur malveillant qui ne passe pas par le formulaire
            require($rep.$vues['erreur']);
        }

    }

}