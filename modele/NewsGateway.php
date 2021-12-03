<?php

class NewsGateway{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insertNews(News $news) : bool
    {
        $query = 'INSERT INTO TNews(date,title,content) VALUES(:date,:title,:author,:content)';
        return $this->con->executeQuery($query,array(
            ':date' => array($news->getDate(),PDO::PARAM_STR),
            ':title' => array($news->getTitle(),PDO::PARAM_STR),
            ':author' => array($news->getAuthor(),PDO::PARAM_STR),
            ':content' => array($news->getContent(),PDO::PARAM_STR)
        ));
    }

    public function findByDate(date $date) : array
    {
        $query = 'SELECT * FROM TNews WHERE date = :date';
        $this->con->executeQuery($query,array(
            ':date' => array($date,PDO::PARAM_INT)
        ));
        foreach($this->con->getResult() as $news){
            $tabNews[] = new News($news['id'],$news['date_creation'],$news['title'],$news['author'],$news['content']);
        }
        return $tabNews;
    }

    public function deleteNews(News $news)
    {
        $query = 'DELETE FROM TNews WHERE id = :id';
        $this->con->executeQuery($query,array(
            ':id' => array($news->getId(),PDO::PARAM_INT)
        ));
    }

    public function tmpAfficheNews()
    {
        $query = 'SELECT * FROM TNews';
        $this->con->executeQuery($query);
        return $this->con->getResult();
    }

    public function getNbNews() : int
    {
        $query = 'SELECT count(*) FROM TNews';
        $this->con->executeQuery($query);
        return $this->con->getResult();
    }
}
