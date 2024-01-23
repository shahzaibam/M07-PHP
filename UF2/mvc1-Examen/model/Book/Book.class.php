<?php

//Classe User que me servirá para validar el Login - Shah Zaib Asghar Munir - 23/01/2024
class Book
{

    private $isbn;
    private $title;
    private $description;
    private $author;
    private $pubData;

    /**
     * @param $isbn
     * @param $title
     * @param $description
     * @param $author
     * @param $pubData
     */
    public function __construct($isbn, $title, $description, $author, $pubData)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->pubData = $pubData;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn): void
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPubData()
    {
        return $this->pubData;
    }

    /**
     * @param mixed $pubData
     */
    public function setPubData($pubData): void
    {
        $this->pubData = $pubData;
    }





}
