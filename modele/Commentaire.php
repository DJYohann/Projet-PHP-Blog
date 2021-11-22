<?php

/**
 *
 */
class Commentaire {
    private string $pseudo;
    private string $content;

    /**
     * @param string $pseudo
     * @param string $content
     */
    public function __construct(string $pseudo, string $content) {
        $this->pseudo = $pseudo;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getPseudo(): string {
        return $this->pseudo;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }
}