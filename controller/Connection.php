<?php

/**
 * Connexion entre PHP et la base de données
 */
class Connection extends PDO
{
    private $stmt;

    /**
     * @param string $dsn nom de la soure de la base de données
     * @param string $login utilisateur de la base de données
     * @param string $pass mot de passe de l'utilisateur de la base de données
     */
    public function __construct(string $dsn, string $login, string $pass)
    {
        parent::__construct($dsn, $login, $pass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @param string $query requête à exécuter
     * @param array $parameters paramètres de la requête
     * @return bool confirmation de l'exécution de la requete
     */
    public function executeQuery(string $query, array $parameters = []) : bool
    {
        $this->stmt = parent::prepare($query);

        foreach ($parameters as $name=>$value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    /**
     * @return array résultat(s) d'une requête
     */
    public function getResult() : array
    {
        return $this->stmt->fetchall();
    }
}