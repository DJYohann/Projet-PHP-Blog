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
    public function findByDate(date $date) : array
    {
       return $this->gateNews->findByDate($date);
    }

    /**
     * @param News $news news à ajouter
     * @return bool confirmation d'ajout
     */
    public function insertNews(News $news) : bool
    {
        return $this->newsGw->insertNews($news);
    }

    /**
     * @param News $news news à supprimer
     * @return bool confirmation de suppression
     */
    public function deleteNews(News $news) : bool
    {
        return $this->newsGw->deleteNews($news);
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

    //Comments
    public function insertComment(int $idNews, Comment $comm) : bool
    {
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