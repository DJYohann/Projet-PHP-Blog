<?php

class NewsGateway{
    private $con;

    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    public function insertNews(string $date, string $title, string $author, string $content) : bool
    {
        $query = 'INSERT INTO TNews(date_creation,title,author,content) VALUES(STR_TO_DATE(:date,"%Y-%m-%d"),:title,:author,:content)';
        return $this->con->executeQuery($query,array(
            ':date' => array($date,PDO::PARAM_STR),
            ':title' => array($title,PDO::PARAM_STR),
            ':author' => array($author,PDO::PARAM_STR),
            ':content' => array($content,PDO::PARAM_STR)
        ));
    }

    public function findByPage($page,$nbNews) : array
    {
        $page = $page - 1;
        $debut = $page * $nbNews;
        $query = 'SELECT * FROM tnews LIMIT :debut,:nbNews';
        $this->con->executeQuery($query,array(
            ':debut' => array($debut,PDO::PARAM_INT),
            ':nbNews' => array($nbNews,PDO::PARAM_INT)
        ));
        foreach($this->con->getResult() as $news){
            $tabNews[] = new News($news['id'],$news['date_creation'],$news['title'],$news['author'],$news['content']);
        }
        return $tabNews;
    }

    public function findByDate(string $date) : array
    {
        $query = 'SELECT * FROM tnews WHERE date_creation = STR_TO_DATE(:date,"%Y-%m-%d")';
        $this->con->executeQuery($query,array(
            ':date' => array($date,PDO::PARAM_STR)
        ));
        $tabNews = array();
        foreach($this->con->getResult() as $news){
            $tabNews[] = new News($news['id'],$news['date_creation'],$news['title'],$news['author'],$news['content']);
        }
        return $tabNews;
    }

    public function deleteNewsById(string $id): bool
    {
        $query = 'DELETE FROM tnews WHERE id = :id';
        return $this->con->executeQuery($query,array(
            ':id' => array($id,PDO::PARAM_STR)
        ));
    }

    public function findNewsById(string $id) : News
    {
        $query = 'SELECT * FROM tnews WHERE id = :id';
        $this->con->executeQuery($query,array(
            ':id' => array($id,PDO::PARAM_STR)
        ));

        foreach ($this->con->getResult() as $news){
            $maNews = new News($news['id'],$news['date_creation'],$news['title'],$news['author'],$news['content']);
        }
        return $maNews;
    }

    public function getNbNews() : int
    {
        $query = 'SELECT count(*) FROM TNews';
        $this->con->executeQuery($query);
        return (int) $this->con->getResult()[0][0];
    }
}
