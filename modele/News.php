<?php

/**
 * News du blog
 */
class News {
    private int $id;
    private string $date;
    private string $title;
    private string $author;
    private string $content;

    /**
     * @param int $id id de la news
     * @param string $date date de la news
     * @param string $title titre de la news
     * @param string $author auteur de la news
     * @param string $content contenu de la news
     */
    public function __construct(int $id, string $date, string $title, string $author, string $content)
    {
        $this->id = $id;
        $this->date = $date;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
    }

    /**
     * @return int id de la news
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string date de la news
     */
    public function getDate(): string {
        return $this->date;
    }

    /**
     * @return string titre de la news
     */
    public function getTitle(): string {
        return mb_convert_encoding($this->title, "UTF-8");
    }

    /**
     * @return string auteur de la news
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string contenu de la news
     */
    public function getContent(): string {
        return mb_convert_encoding($this->content, "UTF-8");
    }
}