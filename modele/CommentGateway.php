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

    public function findByNews(int $id)
    {

    }
}