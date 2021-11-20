<?php

/**
 * Admin du blog
 */
class Admin {
    private string $login;
    private string $mdp;

    /**
     * @param string $login
     * @param string $mdp
     */
    public function __construct(string $login, string $mdp)
    {
        $this->login = $login;
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }
}