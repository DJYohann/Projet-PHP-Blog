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
    public function insert(Comment $comm)
    {
        $query = 'INSERT INTO tComments VALUES(:pseudo,:content)';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($comm->getPseudo(), PDO::PARAM_STR),
            ':content' => array($comm->getContent(), PDO::PARAM_STR)
        ));
    }

    /**
     * @return array tableau de Comment
     */
    public function findAll()
    {
        $query = 'SELECT * FROM tComments';
        $this->con->executeQuery($query);

        $results = $this->con->getResult();

        foreach ($results as $row) {
            $tabComments[] = new Comment($row['pseudo'], $row['content']);
        }
        return $tabComments;
    }
}