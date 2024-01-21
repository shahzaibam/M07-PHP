<?php


namespace persist;

use identificador;
use Jugador;
use JugadorMessage;
use vector;

require_once "model/Jugador/Jugador.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a jugador
class JugadorDAO
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Jugador/resources/jugadores.txt");
    }



    /**
     * Retrieves information about the team of players from the data source.
     * @return array An array of Jugador objects representing each player in the team.
     */
    public function home()
    {
        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $jugador = new Jugador($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4], $pieces[5], $pieces[6], $pieces[7]);
                    $response[] = $jugador;
                }

            }
        }
        return $response;
    }





    /**
     * Retrieves an array of player names from the data source.
     * @return array An array of player names.
     */
    public function ejer1_arrayNombres()
    {
        $jugadorName = [];
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $jugadorName[] = $pieces[1];
                }

            }
        }


        return $jugadorName;

    }


    public function login($username, $password, $csvFile)
    {

        $lines = file($csvFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            list($storedUsername, $storedPassword) = explode(';', $line);

            if ($username === $storedUsername && $password === $storedPassword) {
                return true; // Credentials match
            }
        }

        return false; // No matching credentials found
    }



}

?>
