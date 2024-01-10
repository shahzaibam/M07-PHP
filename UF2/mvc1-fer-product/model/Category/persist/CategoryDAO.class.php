<?php


namespace persist;
use Category;
use CategoryMessage;
use identificador;
use vector;

require_once "model/Category/Category.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a category
class CategoryDAO implements \ModelInterface
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Category/resources/categories.txt");
    }

    /**
     * Recull totes les categories
     * @param void
     * @return vector amb tots els objectes de categories
     */
    public function listAll()
    {

        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $category = new Category($pieces[0], $pieces[1]);
                    $response[] = $category;
                }

            }
        }

        return $response;
    }

    /**
     * Afegeix una categoria
     * @param Category objecte
     * @return TRUE O FALSE
     */
    public function add($category)
    {

        $result = $this->dbConnect->addNewLine($category->writingNewLine());

        if ($result == FALSE) {
            $_SESSION['error'] = CategoryMessage::ERR_DAO['insert'];
        }

        return $result;

    }


    /**
     * Modificar una categoria
     * @param Category objecte donat
     * @return TRUE o FALSE
     */
    public function modify($category)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $newPieces = [];
        if($category[0] != -1) {
            foreach ($actual_lines as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);

                    if($pieces[0] == $category[0]) {

                        $pieces[0] = $category[0];
                        $pieces[1] = $category[1];

                    }

                    print_r($pieces);

                    $newPieces[] = $pieces;

                }

            }
        }

        //paso de un array bidimensional a un array unidimensional para poder pasarlo a la function writeToFile del dbConnect
        $arrayUnidimensional = array_map(function ($subarray) {
            return $subarray[1];
        }, $newPieces);


        $this->dbConnect->writeToFile($arrayUnidimensional);

    }


    /**
     * Esborra una categoria donat l' id
     * @param $id identificador de la categoria a buscar
     * @return TRUE O FALSE
     */
    public function delete($id)
    {

        //to do

    }



    /**
     * Selecionar un product per id
     * @param $id identificador de la product a buscar
     * @return identificador objecte or NULL
     */
    public function searchByIdModify($id)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $VALOR_NO_ENCONTRADO = -1;

        foreach ($actual_lines as $line) {
            if (!empty($line)) {
                $pieces = explode(";", $line);
                if($pieces[0] == $id) {
                    return $id;
                }
            }

        }
        return $VALOR_NO_ENCONTRADO;

    }

    /**
     * Selecionar una categoria per id
     * @param $id identificador de la categoria a buscar
     * @return Category objecte or NULL
     */
    public function searchById($id)
    {

        $actual_lines = $this->dbConnect->realAllLines();

        foreach ($actual_lines as $line) {
            if (!empty($line)) {
                $pieces = explode(";", $line);
                if($pieces[0] == $id) {
                    $pieces = explode(";", $line);
                    $category = new Category($pieces[0], $pieces[1]);
                    $response[] = $category;
                    return $response;
                }
            }

        }
        return false;

    }


}

?>
