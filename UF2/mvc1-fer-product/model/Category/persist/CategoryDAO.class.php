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

        // to do

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
     * Selecionar una categoria per id
     * @param $id identificador de la categoria a buscar
     * @return Category objecte or NULL
     */
    public function searchById($id)
    {

        //to do

    }


}

?>
