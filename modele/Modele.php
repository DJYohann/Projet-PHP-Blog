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
    //News
    public function findByDate(string $date) : array
    {
       return $this->gateNews->findByDate($date);
    }

    /**
     * @param News $news news à ajouter
     * @return bool confirmation d'ajout
     */
    public function insertNews(string $date, string $title, string $author, string $content) : bool
    {
        return $this->gateNews->insertNews($date, $title, $author, $content);
    }

    public function deleteNews(string $id) : bool
    {
        return $this->gateNews->deleteNewsById($id);
    }

    public function getNbNews() : int
    {
        return $this->gateNews->getNbNews();
    }

    public function findByPage($page,$nbNews)
    {
        return $this->gateNews->findByPage($page,$nbNews);
    }

    public function findNewsById($id)
    {
        return $this->gateNews->findNewsById($id);
    }

    public function findComments($id)
    {
        return $this->gateComment->findByNews($id);
    }

    public function getNbCommentsByNews($id)
    {
        return $this->gateComment->nbCommentsByNews($id);
    }

    //Comments
    public function insertComment(int $idNews, Comment $comm) : bool
    {
        if(isset($_COOKIE['cpt'])){
            $cpt = Nettoyage::nettoyerInt($_COOKIE['cpt']);
        }
        else
            $cpt = 0;
        $cpt = $cpt + 1;
        setcookie('cpt',$cpt,time()+3600*24*365);

        if(!isset($_SESSION['login']) && isset($_POST['user_pseudo'])){
            $pseudo = Nettoyage::nettoyerChaine($_POST['user_pseudo']);
            $_SESSION['login'] = $pseudo;
        }
        return $this->gateComment->insert($idNews,$comm);
    }

    public function findByNews(int $idNews) : array
    {
        return $this->gateComment->findByNews($idNews);
    }

    public function getNbComments() : string
    {
        return $this->gateComment->nbComments();
    }
}