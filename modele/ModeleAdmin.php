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

    /**
     * @param News $news news à ajouter
     * @return bool confirmation d'ajout
     */
    public function insertNews(News $news) : bool
    {
       return $this->newsGw->insertNews($news);
    }

    /**
     * @param News $news news à supprimer
     * @return bool confirmation de suppression
     */
    public function deleteNews(News $news) : bool
    {
        return $this->newsGw->deleteNews($news);
    }
}