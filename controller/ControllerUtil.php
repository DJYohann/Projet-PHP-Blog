<?php

/**
 *
 */
class ControllerUtil
{

    public function __construct()
    {
        global $rep,$vues;
        session_start();

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

                case 'add-comment':
                    $this->ajoutCommentaire();
                    break;

                case 'contentNews':
                    $this->afficherUneNews();
                    break;

                case NULL:
                    $this->afficherNews();
                    break;

                default:
                    $dVueEreur [] = "Erreur d'appel php";
                    require($rep.$vues['erreur']);
                    break;
            }
        }catch (PDOException $e){
            $dVueEreur [] = "Erreur exception";
            require($rep.$vues['erreur']);
        }
    }

    public function rechercherNews()
    {
        global $rep,$vues, $nbComments;
        $mdl = new Modele();
        $mdlAdmin = new ModeleAdmin();

        if(isset($_POST['search_date'])){
            $date = Nettoyage::nettoyerChaine($_POST['search_date']);
        }
        $TNews = $mdl->findByDate($date);
        require ($rep.$vues['search']);
    }

    public function ajoutCommentaire()
    {
        global $rep,$vues;
        $mdl = new Modele();

        $id = $_GET['id'];

        if (isset($_POST['user_pseudo']) && isset($_POST['user_comment']))
        {
            $pseudo = Nettoyage::nettoyerChaine($_POST['user_pseudo']);
            $message = Nettoyage::nettoyerChaine($_POST['user_comment']);

            $mdl->insertComment($id, new Comment($pseudo,$message));
            $this->afficherUneNews();
        }
        else
        {
            $dVueEreur [] = "veuillez renseigner le pseudo ou le message"; //utilisateur malveillant qui ne passe pas par le formulaire
            require($rep.$vues['erreur']);
        }

    }

    public function afficherNews()
    {
        global $rep,$vues, $nbMaxNews, $nbComments;
        $mdl = new Modele();
        $mdlAdmin = new ModeleAdmin();

        if(isset($_GET['page']))
        {
            $page = Nettoyage::nettoyerChaine($_GET['page']);
        }
        else
        {
            $page = 1;
        }

        $nbNews = $mdl->getNbNews();
        $nbComments = $mdl->getNbComments();
        $TNews = $mdl->findByPage($page,$nbMaxNews);
        $admin = $mdlAdmin->isAdmin();

        require($rep.$vues['blog']);
    }

    public function afficherUneNews()
    {
        global $rep,$vues;

        if (isset($_GET['id']))
        {
            $id = Nettoyage::nettoyerChaine($_GET['id']);
            $mdl = new Modele();
            $mdlAdmin= new ModeleAdmin();

            $news = $mdl->findNewsById($id);
            $admin = $mdlAdmin->isAdmin();
            $nbComments = $mdl->getNbCommentsByNews($id);
            if ($nbComments != 0)
            {
                $comments = $mdl->findComments($id);
            }

            require($rep.$vues['content-news']);
        }
        else
        {
            $dVueEreur [] = "Aucune news sélectionée"; //utilisateur malveillant qui ne passe pas par le formulaire
            require($rep.$vues['erreur']);
        }

    }

}