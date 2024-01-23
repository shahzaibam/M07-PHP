<?php
//este es el fichero DAO de User aqui se crean todas las funcionalidades y el controllador las coge desde aqui - SHAH ZAIB ASGHAR MUNIR - 23/01/2024


namespace persist;

use identificador;
use User;
use UserMessage;
use vector;

require_once "model/User/User.class.php";
require_once "model/DBConnect.class.php";
require_once "model/ModelInterface.php";


//class to handle a user
class UserDAO
{

    //propietat que tenen tots els DAO per connectar-se a l'arxiu i poder fer les accions bàsiques generals
    private $dbConnect;

    public function __construct()
    {
        $this->dbConnect = new \DBConnect("model/User/resources/users.csv");
    }






    public function login($username, $password, $csvFile)
    {


        $lines = file($csvFile);

        foreach ($lines as $line) {

            list($storedUsername, $storedPassword, $storedRol) = explode(';', $line);


            if ($username === $storedUsername && $password === $storedPassword) {
                return $storedRol;
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
