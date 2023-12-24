<?php


class Jugador {

    private $equipo;
    private $filename;

    /**
     * @param $equipo
     */
    public function __construct($equipo, $filename)
    {
        $this->equipo = $equipo;
        $this->filename = $filename;
    }

    /**
     * @return mixed
     */
    public function getEquipo()
    {
        return $this->equipo;
    }



    private function leerJugadores($filename) {

        $data = [];

        $f = fopen($filename, 'r');

        if ($f === false) {
            die('Cannot open the file ' . $filename);
        }

        while (($row = fgetcsv($f)) !== false) {
            $data[] = $row;
        }

        // close the file
        fclose($f);

        return $data;
    }


    public function mostrarEquipo() {

        $filename = $this->filename;
        $equipo = $this->equipo;

        $jugadores = $this->leerJugadores($filename);
        $equipo_datos = [];

        foreach ($jugadores as $row) {
            if ($row[2] == $equipo) {
                $equipo_datos[] = [
                    'nom' => isset($row[0]) ? $row[0] : '',
                    'samarreta' => isset($row[1]) ? $row[1] : '',
                    'club' => isset($row[2]) ? $row[2] : '',
                    'posicion' => isset($row[3]) ? $row[3] : '',
                    'nacionalidad' => isset($row[4]) ? $row[4] : '',
                    'licencia' => isset($row[5]) ? $row[5] : '',
                    'altura' => isset($row[6]) ? $row[6] : '',
                    'edad' => isset($row[7]) ? $row[7] : '',
                    'temp' => isset($row[8]) ? $row[8] : '',
                    'foto' => isset($row[9]) ? $row[9] : '',
                ];
            }
        }

        return $equipo_datos;
    }

}

