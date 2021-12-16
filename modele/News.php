<?php

class News {
    private int $id;
    private string $date;
    private string $title;
    private string $author;
    private string $content;

    /**
     * @param int $id
     * @param string $date
     * @param string $title
     * @param string $author
     * @param string $content
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
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDate(): string {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTitle(): string {
        return mb_convert_encoding($this->title, "UTF-8", "Windows-1252");
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function getContent(): string {
        return mb_convert_encoding($this->content, "UTF-8", "Windows-1252");
    }
}