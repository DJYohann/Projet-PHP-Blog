<?php

/**
 *
 */
class AdminGateway {
    private $con;

    /**
     * @param $con
     */
    public function __construct(Connection $con) {
        $this->con = $con;
    }

    /**
     * @param string $login
     * @return array
     */
    public function findByLogin(string $login) : array {
        $query = 'SELECT * FROM tAdmin WHERE login = :login';

        $this->con->executeQuery($query,array(
            ':login' => array($login,PDO::PARAM_STR)
        ));

        return $this->con->getResult();
    }
}