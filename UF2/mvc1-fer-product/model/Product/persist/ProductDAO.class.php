<?php

namespace persist;

use Product;
use ProductMessage;
use identificador;
use vector;

require_once "model/Product/Product.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle Product
class ProductDAO implements \ModelInterface
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Product/resources/products.txt");
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
                    $product = new Product($pieces[0], $pieces[1]);
                    $response[] = $product;
                }

            }
        }

        return $response;
    }

    /**
     * Afegeix un product
     * @param Product objecte
     * @return TRUE O FALSE
     */
    public function add($product)
    {

        $result = $this->dbConnect->addNewLine($product->writingNewLine());

        if ($result == FALSE) {
            $_SESSION['error'] = ProductMessage::ERR_DAO['insert'];
        }

        return $result;

    }


    /**
     * Modificar un product
     * @param Product objecte donat
     * @return TRUE o FALSE
     */
    public function modify($product)
    {

        $actual_lines = $this->dbConnect->realAllLines();
        $newPieces = [];
        if($product[0] != -1) {
            foreach ($actual_lines as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);

                    if($pieces[0] == $product[0]) {

                        $pieces[0] = $product[0];
                        $pieces[1] = $product[1];

                    }

                    print_r($pieces);

                    $newPieces[] = $pieces;

                }

            }
        }
//        echo "2 <br>";
//        print_r($newPieces);
//
//        echo "<br>";

        $arrayUnidimensional = array_map(function ($subarray) {
            return $subarray[1];
        }, $newPieces);

//        print_r($arrayUnidimensional);



        $this->dbConnect->writeToFile($arrayUnidimensional);

    }


    /**
     * Esborra un product donat l' id
     * @param $id identificador del product a buscar
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
    public function searchById($id)
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
}
