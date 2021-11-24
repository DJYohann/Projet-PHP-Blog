<?php

/**
 * Commentaire d'une news
 */
class Comment
{
    private string $pseudo;
    private string $content;

    /**
     * @param string $pseudo pseudo de l'auteur du commentaire
     * @param string $content contenu du commentaire
     */
    public function __construct(string $pseudo, string $content)
    {
        $this->pseudo = $pseudo;
        $this->content = $content;
    }

    /**
     * @return string pseudo de l'auteur du commentaire
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @return string contenu du commentaire
     */
    public function getContent(): string
    {
        return $this->content;
    }
}