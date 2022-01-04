<?php

require_once 'Comment.php';

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
     * @param int $idNews news où ajouter le commentaire
     * @param Comment $comm commentaire à ajouter à la news
     * @return bool confirmation de l'insertion
     */
    public function insert(string $idNews, Comment $comm) : bool
    {
        $query = 'INSERT INTO tComments (id_news, pseudo, content) VALUES(:id_news,:pseudo,:content)';
        return $this->con->executeQuery($query, array(
            ':id_news' => array($idNews, PDO::PARAM_STR),
            ':pseudo' => array($comm->getPseudo(), PDO::PARAM_STR),
            ':content' => array($comm->getContent(), PDO::PARAM_STR)
        ));
    }

    /**
     * @param int $idNews
     * @return array tableau de commentaires de la news
     */
    public function findByNews(int $idNews) : array
    {
        $query = 'SELECT * FROM tComments WHERE id_news = :id_news';
        $this->con->executeQuery($query, array(
            ':id_news' => array($idNews, PDO::PARAM_STR)
        ));

        $results = $this->con->getResult();

        foreach ($results as $row) {
            $tabComments[] = new Comment($row['pseudo'], $row['content']);
        }
        return $tabComments;
    }

    /**
     * @return int nombre de commentaires
     */
    public function nbComments() : string
    {
        $query = 'SELECT COUNT(*) FROM tComments';
        $this->con->executeQuery($query);
        return $this->con->getResult()[0][0];
    }

    public function nbCommentsByNews(int $idNews) : int
    {
        $query = 'SELECT COUNT(*) FROM tComments WHERE id_news = :id_news';
        $this->con->executeQuery($query, array(
            ':id_news' => array($idNews, PDO::PARAM_INT)
        ));
        return $this->con->getResult()[0][0];
    }
}