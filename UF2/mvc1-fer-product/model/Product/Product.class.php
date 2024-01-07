<?php


class Product {

    private $id;

    private $name;

    private $productList=array(); // si el necessitessim en una posterior ampliació!

    /**
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getProductList(): array
    {
        return $this->productList;
    }

    /**
     * @param array $productList
     */
    public function setProductList(array $productList): void
    {
        $this->productList[] = $productList;
    }


    public function writingNewLine() {
        return "\n$this->id;$this->name;"; // podríem volem algun mètode extrar de la classe que ens fos interessant i general
    }

}