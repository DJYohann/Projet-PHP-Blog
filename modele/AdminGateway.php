<?php

/**
 * Passerelle entre la classe Admin et la base de données
 */
class AdminGateway
{
    private $con;

    /**
     * @param Connection $con connexion entre PHP et la base de données
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /**
     * @param string $login identifiant de l'admin
     * @return array tableau d'Admin
     */
    public function findByLogin(string $login) : array
    {
        $query = 'SELECT * FROM tAdmin WHERE login = :login';

        $this->con->executeQuery($query,array(
            ':login' => array($login,PDO::PARAM_STR)
        ));

        $results = $this->con->getResult();

        foreach ($results as $row) {
            $tabAdmin[] = new Admin($row['login'], $row['mdp']);
        }
        return $tabAdmin;
    }
}