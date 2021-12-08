<?php

/**
 * Modele de l'administrateur
 */
class ModeleAdmin
{
    private $adminGw;
    private $newsGw;

    /**
     *
     */
    public function __construct()
    {
        $this->adminGw = new AdminGateway();
        $this->newsGw = new NewsGateway();
    }

    public function connection()
    {

    }
}