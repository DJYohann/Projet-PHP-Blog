<?php

/**
 * Represente une connexion entre PHP et la base de données
 */
class Connection extends PDO {
    private $stmt;

    /**
     * @param string $dsn
     * @param string $login
     * @param string $pass mot de passe
     */
    public function __construct(string $dsn, string $login, string $pass) {
        parent::__construct($dsn, $login, $pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $query
     * @param array $parameters
     * @return bool
     */
    public function executeQuery(string $query, array $parameters = []) : bool {
        $this->stmt = parent::prepare($query);

        foreach ($parameters as $name=>$value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    /**
     * @return array
     */
    public function getResult() : array {
        return $this->stmt->fetchall();
    }
}