<?php

/**
 * Admin du blog
 */
class Admin {
    private string $id;
    private string $mdp;

    /**
     * @param string $id identifiant
     * @param string $mdp mot de passe
     */
    public function __construct(string $id, string $mdp) {
        $this->id = $id;
        $this->mdp = $mdp;
    }

    /**
     * @return string identifiant
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }
}