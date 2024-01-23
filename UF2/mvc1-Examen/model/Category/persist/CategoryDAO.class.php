<?php

//este es el fichero DAO de Category aqui se crean todas las funcionalidades y el controllador las coge desde aqui - SHAH ZAIB ASGHAR MUNIR - 23/01/2024


namespace persist;

use identificador;
use User;
use UserMessage;
use vector;

require_once "model/Category/Category.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a user
class CategoryDAO
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Category/resources/categories.csv");
    }


    public function home()
    {


        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $category = new \Category($pieces[0], $pieces[1]);
                    $response[] = $category;

                }

            }
        }
        return $response;
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
                    $category = new Category($pieces[0], $pieces[1]);
                    $response[] = $category;
                }

            }
        }

        return $response;

    }


}

?>
