<?php

//este es el fichero DAO de Book aqui se crean todas las funcionalidades y el controllador las coge desde aqui - SHAH ZAIB ASGHAR MUNIR - 23/01/2024

namespace persist;

use identificador;
use User;
use UserMessage;
use vector;

require_once "model/Book/Book.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a user
class BookDAO
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Book/resources/books.csv");
    }



    public function listAll()
    {
        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $category = new \Book($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4]);
                    $response[] = $category;
                }

            }
        }

        return $response;

    }




//    /**
//     * Afegeix una book
//     * @param Book objecte
//     * @return TRUE O FALSE
//     */
//    public function add($book)
//    {
//
//        $result = $this->dbConnect->addNewLine($book->writingNewLine());
//
//        if ($result == FALSE) {
//            $_SESSION['error'] = \BookMessage::ERR_DAO['insert'];
//        }
//
//        return $result;
//    }



    /**
     * Selecionar una book per isbn
     * @param $isbn identificador de la categoria a buscar
     * @return Juagdor objecte encontrado or NULL(no existe el id)
     */
    public function searchById($isbn)
    {
        $linesToFile = $this->dbConnect->realAllLines();
        foreach ($linesToFile as $line) {
            if (!empty($line)) {
                $pieces = explode(";", $line);
                //creo una categoria con el id y el nombre que lo he cogido en pieces.
                $book = new \Book($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4]);
                if ($pieces[0] == $isbn) { //si el valor de la categoria de la posicion
                    return $book;
                }
            }
        }
        return NULL;
    }


}

?>
