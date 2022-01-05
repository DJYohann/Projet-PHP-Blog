<?php

/**
 * Passerelle entre la classe News et la base de données
 */
class NewsGateway{
    private $con;

    /**
     * @param Connection $con connexion entre PHP et la base de données
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
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
        $query = 'INSERT INTO TNews(date_creation,title,author,content) VALUES(STR_TO_DATE(:date,"%Y-%m-%d"),:title,:author,:content)';
        return $this->con->executeQuery($query,array(
            ':date' => array($date,PDO::PARAM_STR),
            ':title' => array($title,PDO::PARAM_STR),
            ':author' => array($author,PDO::PARAM_STR),
            ':content' => array($content,PDO::PARAM_STR)
        ));
    }

    /**
     * @param $page page des news à afficher
     * @param $nbNews nombre des news
     * @return array tableau des news à afficher
     */
    public function findByPage($page,$nbNews) : array
    {
        $page = $page - 1;
        $debut = $page * $nbNews;
        $query = 'SELECT * FROM tnews ORDER BY date_creation DESC LIMIT :debut,:nbNews ';
        $this->con->executeQuery($query,array(
            ':debut' => array($debut,PDO::PARAM_INT),
            ':nbNews' => array($nbNews,PDO::PARAM_INT)
        ));
        foreach($this->con->getResult() as $news){
            $tabNews[] = new News($news['id'],$news['date_creation'],$news['title'],$news['author'],$news['content']);
        }
        return $tabNews;
    }

    /**
     * @param string $date date de la recherche
     * @return array tableau de news
     */
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

    /**
     * @param string $id id de la news à supprimer
     * @return bool validation de suppression
     */
    public function deleteNewsById(string $id): bool
    {
        $query = 'DELETE FROM tnews WHERE id = :id';
        return $this->con->executeQuery($query,array(
            ':id' => array($id,PDO::PARAM_STR)
        ));
    }

    /**
     * @param string $id id de la news à rechercher
     * @return News news recherché
     */
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

    /**
     * @return int nombre de news
     */
    public function getNbNews() : int
    {
        $query = 'SELECT count(*) FROM TNews';
        $this->con->executeQuery($query);
        return (int) $this->con->getResult()[0][0];
    }
}
