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
        $con = new Connection($dns,$login,$pass);
        $this->gateNews = new NewsGateway($con);
        $this->gateComment = new CommentGateway($con);
    }
    //News
    public function findByDate(date $date) : array
    {
       return $this->gateNews->findByDate($date);
    }

    public function getNbNews() : int
    {
        return $this->gateNews->getNbNews();
    }

    public function tmpAfficheNews()
    {
        return $this->gateNews->tmpAfficheNews();
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

    public function nbComments() : int
    {
        return $this->gateComment->nbComments();
    }
}