<?php

/**
 * Admin du blog
 */
class Admin
{
    private string $login;
    private string $mdp;

    /**
     * @param string $login identifiant de l'admin
     * @param string $mdp mot de passe de l'admin
     */
    public function __construct(string $login, string $mdp)
    {
        $this->login = $login;
        $this->mdp = $mdp;
    }

    /**
     * @return string identifiant de l'admin
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string mot de passe de l'admin
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }
}