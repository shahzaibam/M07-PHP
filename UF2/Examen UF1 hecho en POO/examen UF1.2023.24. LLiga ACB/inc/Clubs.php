<?php

class Clubs {
    private $nomClub;

    private $image;


    /**
     * @param $nomClub
     * @param $image
     */
    public function __construct($nomClub)
    {
        $this->nomClub = $nomClub;
        $this->image = $this->nomClub . ".png";
    }


    /**
     * @return mixed
     */
    public function getNomClub()
    {
        return $this->nomClub;
    }



    /**
     * @param mixed $nomClub
     */
    public function setNomClub($nomClub): void
    {
        $this->nomClub = $nomClub;
    }



    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }



    public function __toString()
    {
        $message = "";

        $message .= "<div>";
        $message .= "Nombre del Club --> " . $this->nomClub . "<br>";
        $message .= " Ruta de la Imagen --> " . $this->image;
        $message .= "<br>";
        $message .= "</div>";


        return $message;
    }


}

?>