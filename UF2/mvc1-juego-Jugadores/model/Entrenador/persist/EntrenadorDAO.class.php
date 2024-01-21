<?php


namespace persist;

use identificador;
use Entrenador;
use EntrenadorMessage;
use vector;

require_once "model/Entrenador/Entrenador.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a entrenador
class EntrenadorDAO
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/Entrenador/resources/entrenadores.csv");
    }



    /**
     * Recull totes les categories
     * @param void
     * @return vector amb tots els objectes de categories
     */
    public function ejer5()
    {
        $response = array();
        $linesToFile = array();
        $linesToFile = $this->dbConnect->realAllLines();
        if (count($linesToFile) > 0) {
            foreach ($linesToFile as $line) {
                if (!empty($line)) {
                    $pieces = explode(";", $line);
                    $entrenador = new Entrenador($pieces[0], $pieces[1], $pieces[2], $pieces[3], $pieces[4]);
                    $response[] = $entrenador;
                }

            }
        }
        return $response;
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


    public function listarJugadores($csvFile) {
        // Abrir el archivo en modo lectura
        $file = fopen($csvFile, 'r');

        // Verificar si el archivo se abrió correctamente
        if ($file !== false) {
            // Inicializar un array para almacenar los datos de los jugadores
            $jugadores = [];

            $primeraVuelta = true;

            // Iterar sobre las líneas restantes del archivo
            while (($data = fgetcsv($file)) !== false) {
                // Agregar el array de datos del jugador al array de jugadores

                if ($primeraVuelta) {
                    $primeraVuelta = false;
                    continue;
                }

                $jugadores[] = $data;
            }

            // Cerrar el archivo
            fclose($file);

            // Devolver el array de jugadores
            return $jugadores;
        } else {
            // Devolver un mensaje de error si no se pudo abrir el archivo
            return "Error al abrir el archivo CSV.";
        }
    }



}

?>
