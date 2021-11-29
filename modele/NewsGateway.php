<?php

class NewsGateway{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insertNews(News $news)
    {
        $query = 'INSERT INTO tNews(date,title,content) VALUES(:date,:title,:content)';
        $this->con->executeQuery($query,array(
            ':date' => array($news->getDate(),PDO::PARAM_INT),
            ':title' => array($news->getTitle(),PDO::PARAM_STR),
            ':content' => array($news->getContent(),PDO::PARAM_STR)
        ));
    }

    public function findByDate(date $date) : array
    {
        $query = 'SELECT * FROM tNews WHERE date = :date';
        $this->con->executeQuery($query,array(
            ':date' => array($date,PDO::PARAM_INT)
        ));
        foreach($this->con->getResult() as $news){
            $tabNews[] = new News($news['id'],$news['date'],$news['titre'],$news['contenu']);
        }
        return $tabNews;
    }

    public function deleteNews(News $news)
    {
        $query = 'DELETE FROM tNews WHERE id = :id';
        $this->con->executeQuery($query,array(
            ':id' => array($news->getId(),PDO::PARAM_INT)
        ));
    }

    public function getNbNews() : int
    {
        $query = 'SELECT count(*) FROM tNews';
        $this->con->executeQuery($query);
        return $this->con->getResult();
    }
}
