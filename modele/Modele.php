<?php

/**
 * Modele
 */
class Modele
{
    private $gateNews;
    private $gateComment;

    public function __construct()
    {
        global $con;
        $this->gateNews = new NewsGateway($con);
        $this->gateComment = new CommentGateway($con);
    }

    /**
     * @param string $date date de la recherche
     * @return array tableau de news
     */
    public function findByDate(string $date) : array
    {
       return $this->gateNews->findByDate($date);
    }

    /**
     * @param string $date date de la news
     * @param string $title titre de la news
     * @param string $author auteur de la news
     * @param string $content contenu de la news
     * @return bool validation d'insertion
     */
    public function insertNews(string $date, string $title, string $author, string $content) : bool
    {
        return $this->gateNews->insertNews($date, $title, $author, $content);
    }

    /**
     * @param string $id id de la news à supprimer
     * @return bool validation de suppression
     */
    public function deleteNews(string $id) : bool
    {
        return $this->gateNews->deleteNewsById($id);
    }

    /**
     * @return int nombre de news
     */
    public function getNbNews() : int
    {
        return $this->gateNews->getNbNews();
    }

    /**
     * @param $page page des news à afficher
     * @param $nbNews nombre des news
     * @return array tableau des news à afficher
     */
    public function findByPage($page,$nbNews)
    {
        return $this->gateNews->findByPage($page,$nbNews);
    }

    /**
     * @param $id id de la news à rechercher
     * @return News news trouvé
     */
    public function findNewsById($id)
    {
        return $this->gateNews->findNewsById($id);
    }

    /**
     * @param $id id de la news à rechercher
     * @return array tableau de commentaires
     */
    public function findComments($id)
    {
        return $this->gateComment->findByNews($id);
    }

    /**
     * @param $id id de la news à rechercher
     * @return int nombre de commentaires
     */
    public function getNbCommentsByNews($id)
    {
        return $this->gateComment->nbCommentsByNews($id);
    }

    /**
     * @param int $idNews id de la news où insérer le commentaire
     * @param Comment $comm commentaire à ajouter
     * @return bool validation d'insertion
     */
    public function insertComment(int $idNews, Comment $comm) : bool
    {
        if (isset($_COOKIE['cpt']))
        {
            $cpt = Nettoyage::nettoyerInt($_COOKIE['cpt']);
        }
        else
        {
            $cpt = 0;
        }
        $cpt = $cpt + 1;
        setcookie('cpt',$cpt,time()+3600*24*365);

        if (!isset($_SESSION['login']) && isset($_POST['user_pseudo']))
        {
            $pseudo = Nettoyage::nettoyerChaine($_POST['user_pseudo']);
            $_SESSION['login'] = $pseudo;
        }
        return $this->gateComment->insert($idNews,$comm);
    }

    /**
     * @return string nombre de commentaires
     */
    public function getNbComments() : string
    {
        return $this->gateComment->nbComments();
    }
}