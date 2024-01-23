<?php

//Classe User que me servirá para validar el Login - Shah Zaib Asghar Munir - 23/01/2024
class Category
{

    private $id;
    private $desc;

    /**
     * @param $id
     * @param $desc
     */
    public function __construct($id = NULL, $desc = NULL)
    {
        $this->id = $id;
        $this->desc = $desc;

    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed|null $desc
     */
    public function setDesc($desc): void
    {
        $this->desc = $desc;
    }








}
