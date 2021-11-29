<?php

/**
 * Passerelle entre la classe Comment et la base de données
 */
class CommentGateway {
    private $con;

    /**
     * @param Connection $con connexion entre PHP et la base de données
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /**
     * @param Comment $comm commentaire à ajouter
     */
    public function insert(int $idNews, Comment $comm) : array | false
    {
        $query = 'INSERT INTO tComments VALUES($idNews,:pseudo,:content)';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($comm->getPseudo(), PDO::PARAM_STR),
            ':content' => array($comm->getContent(), PDO::PARAM_STR)
        ));
        return $this->con->lastInsertId();
    }

    /**
     * @return array tableau de Comment
     */
    public function findByNews(int $idNews) : array
    {
        $query = 'SELECT * FROM tComments WHERE idNews = $idNews';
        $this->con->executeQuery($query);

        $results = $this->con->getResult();

        foreach ($results as $row) {
            $tabComments[] = new Comment($row['pseudo'], $row['content']);
        }
        return $tabComments;
    }

    public function nbComments() : int
    {
        $query = 'SELECT COUNT(*) FROM tComments';
        $this->con->executeQuery($query);
        return $this->con->getResult();
    }
}